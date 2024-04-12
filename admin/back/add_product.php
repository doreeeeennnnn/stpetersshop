<?php
session_start();

// Check if user_id session variable is not set
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../back/logout.php");
    exit();
}

// Check if user role is not suitable for accessing the admin page
if ($_SESSION['user_role'] != 1) {
    header("Location: ../../back/logout.php");
    exit();
}

// Include the database connection file
require_once '../../settings/db_class.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $productName = $_POST['product_name'];
    $productDetails = $_POST['product_details'];
    $productPrice = $_POST['product_price'];

    // File upload handling
    if (isset($_FILES['product_image'])) {
        $file_name = $_FILES['product_image']['name'];
        $file_tmp = $_FILES['product_image']['tmp_name'];
        $file_type = $_FILES['product_image']['type'];
        $file_error = $_FILES['product_image']['error'];

        // Check if file is uploaded without errors
        if ($file_error === 0) {
            // Specify upload directory
            $upload_dir = '../images/uploads/';

            // Generate unique file name to avoid overwriting
            $file_destination = $upload_dir . uniqid('', true) . '_' . $file_name;

            // Move uploaded file to the specified directory
            if (move_uploaded_file($file_tmp, $file_destination)) {
                // File uploaded successfully
                $productImage = $file_destination;

                // Create a new instance of the database connection class
                $db = new db_connection();

                // Connect to the database
                if ($db->db_connect()) {
                    // Prepare the SQL statement to insert product data
                    $sql = "INSERT INTO `product` (`product_name`, `product_details`, `product_price`, `product_img`) 
                            VALUES ('$productName', '$productDetails', '$productPrice', '$productImage')";

                    // Execute the query
                    if ($db->db_query($sql)) {
                        // Product added successfully, redirect to product page
                        echo "<script>alert('Success: Product added successfully.');</script>";
                        echo "<script>window.location.href = '../pages/tables/product.php';</script>";
                        exit();
                    } else {
                        // Error handling, show alert and stay on the same page
                        echo "<script>alert('Error: Unable to add product.');</script>";
                        echo "<script>window.location.href = '../pages/forms/add_products.php';</script>";
                        exit();
                    }
                } else {
                    // Error handling, show alert and stay on the same page
                    echo "<script>alert('Error: Unable to connect to the database.');</script>";
                    echo "<script>window.location.href = '../pages/forms/add_products.php';</script>";
                    exit();
                }
            } else {
                // Error handling, show alert and stay on the same page
                echo "<script>alert('Error: Failed to move uploaded file.');</script>";
                echo "<script>window.location.href = '../pages/forms/add_products.php';</script>";
                exit();
            }
        } else {
            // Error handling, show alert and stay on the same page
            echo "<script>alert('Error: File upload error.');</script>";
            echo "<script>window.location.href = '../pages/forms/add_products.php';</script>";
        }
    } else {
        // Error handling, show alert and stay on the same page
        echo "<script>alert('Error: No file uploaded.');</script>";
        echo "<script>window.location.href = '../pages/forms/add_products.php';</script>";
        exit();
    }
}
