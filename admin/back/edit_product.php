<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../back/logout.php");
    exit();
}

// Check if user has admin privileges
if ($_SESSION['user_role'] != 1) {
    header("Location: ../../back/logout.php");
    exit();
}

// Include the database connection file
require_once '../../settings/db_class.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_details = $_POST['product_details'];
    $product_price = $_POST['product_price'];

    // Create a new instance of the database connection class
    $db = new db_connection();

    // Connect to the database
    if ($db->db_connect()) {
        // Check if a new image is uploaded
        if ($_FILES['product_image']['name']) {
            // Handle image upload logic here
            $new_image_path = "../images/uploads/" . $_FILES['product_image']['name'];
            move_uploaded_file($_FILES['product_image']['tmp_name'], $new_image_path);
            // Update product information including the image path
            $update_sql = "UPDATE `product` SET `product_name` = '$product_name', `product_details` = '$product_details', `product_price` = '$product_price', `product_img` = '$new_image_path' WHERE `product_id` = '$product_id'";
        } else {
            // If no new image is uploaded, update product information excluding the image path
            $update_sql = "UPDATE `product` SET `product_name` = '$product_name', `product_details` = '$product_details', `product_price` = '$product_price' WHERE `product_id` = '$product_id'";
        }

        // Execute the update query
        if ($db->db_query($update_sql)) {
            // Redirect back to product listing page upon successful update
            echo "<script>alert('Success: Product Updated.');</script>";
            echo "<script>window.location.href = '../pages/tables/product.php';</script>";
            exit();
        } else {
            // Handle error if update query fails
            echo "<script>alert('Error: Product Not Updated. Try Again!');</script>";
            echo "<script>window.location.href = '../pages/tables/product.php';</script>";
            exit();
        }
    } else {
        // Handle error if unable to connect to the database
        echo "<script>alert('Error: Product Not Updated - Db connection error.');</script>";
        echo "<script>window.location.href = '../pages/tables/product.php';</script>";
        exit();
    }
} else {
    // If form is not submitted, redirect back to product listing page
    header("Location: ../pages/tables/product.php");
    exit();
}
