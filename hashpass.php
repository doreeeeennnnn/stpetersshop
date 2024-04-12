<?php
$password = "admin";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

echo "Hashed password: " . $hashedPassword;
