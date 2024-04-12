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

// Check if product_id is set in the URL parameters
if (isset($_GET['id'])) {
    // Include the database connection file
    require_once '../../settings/db_class.php';

    // Get the product ID from the URL parameters
    $product_id = $_GET['id'];

    // Create a new instance of the database connection class
    $db = new db_connection();

    // Connect to the database
    if ($db->db_connect()) {
        // Prepare the SQL statement to delete the product
        $sql = "DELETE FROM `product` WHERE `product_id` = '$product_id'";

        // Execute the query
        if ($db->db_query($sql)) {
            // Successful
            echo "<script>alert('Success: Product Deleted.');</script>";
            echo "<script>window.location.href = '../pages/tables/product.php';</script>";
            exit();
        } else {
            // Not successful
            echo "<script>alert('Error: Product Not Deleted.');</script>";
            echo "<script>window.location.href = '../pages/tables/product.php';</script>";
            exit();
        }
    } else {
        // db conn error
        echo "<script>alert('Error: Product Not Deleted - Db connection error.');</script>";
        echo "<script>window.location.href = '../pages/tables/product.php';</script>";
        exit();
    }
} else {
    // Redirect to the product table page if product_id is not set in the URL parameters
    header("Location: ../pages/tables/product.php");
    exit();
}
