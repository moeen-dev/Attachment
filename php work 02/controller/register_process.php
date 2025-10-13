<?php

session_start();
include_once 'db.php';

if (isset($_POST['register'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone = trim($_POST['phone']);
    $gender = $_POST['gender'] ?? '';
    $image = $_FILES['user_image'] ?? null;

    $errors = [];

    // first name error
    if (empty($first_name) || !preg_match("/^[a-zA-Z]+$/", $first_name)) {
        $errors[] = "First Name is required and must be contain only letters!";
    }

    // last name error
    if (empty($last_name) || !preg_match("/^[a-zA-Z]+$/", $last_name)) {
        $errors[] = "First Name is required and must be contain only letters!";
    }

    // for valid email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required!";
    }

    // for password error
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters!";
    }

    if ($password !== $confirm_password) {
        $error[] = "Password do not mathched!";
    }

    // for phone error
    if (empty($phone) || !preg_match("/^[0-9]{10,15}$/", $phone)) {
        $errorr[] = "Please Inter valid phone number!";
    }

    // gender error
    if (!in_array($gender, ['Male', 'Female', 'Other'])) {
        $errors[] = "Gender is required";
    }

    // image error
    if (!$image || $image['error'] !== 0) {
        $errors[] = "Image is required!";
    } else {
        // image types validate
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        if(!in_array($image['type'], $allowed_types)) {
            $errors[] = "Image must be JPG, JPEG, PNG!";
        }

        // 2MB Max image validate
        $allowed_size = 2 * 1024 * 1024; 
        if ($image['size'] > $allowed_size) {
            $errors[] = "Image must be less than 2MB";
        }
    }



    if (empty($error)) {
        // Create Database if fnot exists
        $db_name = "registration_form";
        $create_db = "CREATE DATABASE IF NOT EXISTS `$db_name`";

        if ($conn->query($create_db) === TRUE) {
            $conn->select_db($db_name);
            echo "success";
        } else {
            die("Database connection failed: " . $conn->error);
        }

        // crerate Table if not exists on db
        $createTable = "
            CREATE TABLE IF NOT EXISTS `admins` (
            `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
            `first_name` VARCHAR(50) NOT NULL,
            `last_name` VARCHAR(50) NOT NULL,
            `email` VARCHAR(100) NOT NULL UNIQUE,
            `password` VARCHAR(255) NOT NULL,
            `phone` VARCHAR(20) NOT NULL,
            `gender` ENUM('Male', 'Female', 'Other') NOT NULL,
            `image` VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";

        if ($conn->query($createTable) !== TRUE) {
            die("Table Creation Failed:" . $conn->error);
        }

        // Uniuque Id
        $unique_id = strtoupper(uniqid('ADM'));

        // Make Hash Passwords
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $upload_dir = "/../uploads/";

        if(!is_dir($upload_dir)) {
            mkdir($upload_dir, 0075, true);
        }

        $image_name = uniqid(). '-' . basename($image['name']);
        $image_path = $upload_dir . $image_name;

        if(!move_uploaded_file($image['tmp_name'], $image_path)) {
            die("Failed to upload image!");
        }


    }
}
