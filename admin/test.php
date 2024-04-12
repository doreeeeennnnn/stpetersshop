<?php
// Include the database connection file
require_once "../settings/db_class.php";

// Create a new instance of the database connection class
$db = new db_connection();

// Initialize variables to count the number of users and products
$userCount = 0;
$productCount = 0;

// Connect to the database
if ($db->db_connect()) {
    // Count the number of users
    $userResult = $db->db_fetch_one("SELECT COUNT(*) AS total_users FROM user");
    if ($userResult !== false && isset($userResult['total_users'])) {
        $userCount = $userResult['total_users'];
    }

    // Count the number of products
    $productResult = $db->db_fetch_one("SELECT COUNT(*) AS total_products FROM product");
    if ($productResult !== false && isset($productResult['total_products'])) {
        $productCount = $productResult['total_products'];
    }
}

// Display the results
echo "Total users: " . $userCount . "<br>";
echo "Total products: " . $productCount . "<br>";
