<?php
// Start session
session_start();

// Include the database connection file
require_once '../settings/db_class.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
    // Retrieve form data and sanitize inputs
    $email = trim($_POST['your_email']); // Assuming email is entered in "Email" field
    $password = $_POST['your_pass'];

    // Create a new instance of the database connection class
    $db = new db_connection();

    // Connect to the database
    if ($db->db_connect()) {
        // Prepare the SQL statement to retrieve user data based on email
        $sql = "SELECT * FROM `user` WHERE `user_email` = '$email'";

        // Execute the query
        $result = $db->db_query($sql);

        // Check if user exists
        if ($result && $db->db_count() > 0) {
            // Fetch user data
            $user = $db->db_fetch_one($sql);

            // Verify password
            if (password_verify($password, $user['user_pass'])) {
                // Password is correct
                // Create session variables to store user data
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_email'] = $user['user_email'];
                $_SESSION['user_fname'] = $user['user_fname'];
                $_SESSION['user_lname'] = $user['user_lname'];
                $_SESSION['user_role'] = $user['user_role'];

                // Redirect user based on user role
                if ($user['user_role'] == 1) {
                    // User role 1 (admin) redirect to admin directory
                    header("Location: ../admin/");
                    exit;
                } elseif ($user['user_role'] == 2) {
                    // User role 2 redirect to shop page
                    header("Location: ../shop.php");
                    exit;
                }
            } else {
                // Incorrect password, show alert and redirect to login page
                echo "<script>alert('Error: Incorrect password.');</script>";
                echo "<script>window.location.href = '../login.php';</script>";
                exit();
            }
        } else {
            // User does not exist, show alert and redirect to login page
            echo "<script>alert('Error: User with provided email does not exist.');</script>";
            echo "<script>window.location.href = '../login.php';</script>";
            exit();
        }
    } else {
        // Error handling, show alert and redirect to login page
        echo "<script>alert('Error: Unable to connect to the database.');</script>";
        echo "<script>window.location.href = '../login.php';</script>";
        exit();
    }
} else {
    // If the form is not submitted, redirect to login page
    header("Location: login.php");
    exit();
}

