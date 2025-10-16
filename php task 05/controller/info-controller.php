<?php

session_start();
include_once 'db.php';

// Add Student
if(isset($_POST['submit'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $address = trim($_POST['address']);

    $errors = [];

    // first name error
    if (empty($first_name) || !preg_match("/^[a-zA-Z]+$/", $first_name)) {
        $errors[] = "First name required and must be contain only letters!";
    }

    // last name error
    if (empty($last_name) || !preg_match("/^[a-zA-Z]+$/", $last_name)) {
        $errors[] = "Last name required and must be contain only letters!";
    }

    // email error
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required!";
    }

    // phone number error
    if (empty($phone_number) || !preg_match('/^[0-9]{10,15}$/', $phone_number)) {
        $errors[] = "Valid number is required!";
    }

    // Address error
    if (empty($address) || strlen($address) < 6 ) {
        $errors[] = "Address is required!";
    }

    if (!empty($errors)) {
        header("Location: ../add-info.php?" . http_build_query($errors));
        exit;
    }else {
        $sql = "INSERT INTO users(`first_name`, `last_name`, `email`, `phone_number`, `address`) VALUES ('$first_name','$last_name','$email','$phone_number','$address')";
        $query = $conn->query($sql);

        if ($query == TRUE) {
            header("Location: ../index.php");
            exit();
        }else {
            header("Location: ../add-info.php");
            exit();
        }
    }
}

?>