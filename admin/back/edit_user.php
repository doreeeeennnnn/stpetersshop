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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    require_once '../../settings/db_class.php';

    // Create a new instance of the database connection class
    $db = new db_connection();

    // Connect to the database
    if ($db->db_connect()) {
        // Get form data
        $user_id = $_POST['user_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        // $role = $_POST['role'];

        // Prepare update statement
        $sql = "UPDATE `user` SET `user_fname` = '$first_name', `user_lname` = '$last_name', `user_email` = '$email', `user_phone` = '$phone' WHERE `user_id` = '$user_id'";

        // Execute the update query
        $result = $db->db_query($sql);

        if ($result) {
            // Redirect to user database page after successful update
            echo "<script>alert('Success: User Updated.');</script>";
            echo "<script>window.location.href = '../pages/tables/user.php';</script>";
            exit();
        } else {
            // Handle update error
            echo "<script>alert('Error: User Not Updated. Try Again!');</script>";
            echo "<script>window.location.href = '../pages/tables/user.php';</script>";
            exit();
        }
    } else {
        // Redirect to logout page if unable to connect to the database
        echo "<script>alert('Error: User Not Updated - Db connection error.');</script>";
        echo "<script>window.location.href = '../pages/tables/user.php';</script>";
        exit();
    }
} else {
    // Redirect to user database page if form is not submitted via POST method
    header("Location: ../pages/tables/user.php");
    exit();
}
