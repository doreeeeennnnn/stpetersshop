<?php
// Include the database connection file
require_once '../settings/db_class.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Retrieve form data and sanitize inputs
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['pass'];
    $re_password = $_POST['re_pass'];

    // Perform additional validations if needed
    // For example, check if email is valid, password meets complexity requirements, etc.

    // Check if passwords match
    if ($password !== $re_password) {
        // Error handling
        echo "<script>alert('Error: Passwords do not match.');</script>";
        echo "<script>window.location.href = '../signup.php';</script>";
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Create a new instance of the database connection class
    $db = new db_connection();

    // Connect to the database
    if ($db->db_connect()) {
        // Check if the email already exists
        $check_email_sql = "SELECT * FROM `user` WHERE `user_email` = '$email'";
        if ($db->db_query($check_email_sql) && $db->db_count() > 0) {
            // Email already exists, show error message
            echo "<script>alert('Error: Email already exists.');</script>";
            echo "<script>window.location.href = '../signup.php';</script>";
            exit();
        }

        // Prepare the SQL statement to insert a new user into the database
        $sql = "INSERT INTO `user` (`user_fname`, `user_lname`, `user_email`, `user_phone`, `user_pass`, `user_role`) 
                VALUES ('$fname', '$lname', '$email', '$phone', '$hashed_password', 2)";

        // Execute the query
        if ($db->db_query($sql)) {
            // Registration successful
            echo "<script>alert('User registration was successful.');</script>";
            echo "<script>window.location.href = '../login.php';</script>";
            exit();
        } else {
            // Error handling
            echo "<script>alert('Error: Unable to register. Please try again later.');</script>";
            echo "<script>window.location.href = '../signup.php';</script>";
            exit();
        }
    } else {
        // Error handling, show alert and redirect to login page
        echo "<script>alert('Error: Unable to connect to the database.');</script>";
        echo "<script>window.location.href = '../signup.php';</script>";
        exit();
    }
}
