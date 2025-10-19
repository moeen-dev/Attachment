<?php
session_start();
include_once 'db.php';

// Register 
if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmed_password = $_POST['confirm_password'];

    $errors = [];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Validation for all empty fields
    if (empty($name) || empty($email) || empty($password) || empty($confirmed_password)) {
        $errors = 'All fields are required!';
    }

    // Check email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = 'Invalid email format!';
    }

    // Confirmed password match
    if ($password !== $confirmed_password) {
        $errors[] = 'Passwords do not match!';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: ../register.php");
        exit;
    } else {
        $sql = "INSERT INTO users(`name`, `email`, `password`) VALUES ('$name','$email','$passwordHash')";
        $query = $conn->query($sql);

        if ($query == TRUE) {
            $_SESSION['success'] = "Login successfully!";
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['errors'] = 'Database update failed!';
            header("Location: ../register.php?id=$id");
            exit();
        }
    }
}

// Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password' ";

    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: ../index.php");
    } else {
        header("Location: ../login.php");
    }
}
