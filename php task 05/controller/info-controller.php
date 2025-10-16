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
    if (empty($last_name) || !preg_match("/^[a-aZ-Z]+$/", $last_name)) {
        $errors[] = "Last name required and must be contain only letters!";
    }
}

?>