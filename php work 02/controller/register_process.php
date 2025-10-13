<?php

session_start();
include_once 'db.php';

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['passworrd']);
    $confirm_password = md5($_POST['confirm_password']);
    $phone = $_POST['phone'];

    $error = array();

    if(empty($name)){
        $error['name_error'] = "Please Insert Name!";
    }

    if(empty($email)) {
        $error['email_error'] = "Please Insert Email!";
    }

    if(empty($password)) {
        $error['password_error'] = "Please Insert Password!";
    }

    if($password !== $confirm_password) {
        $error['confirm_password_error'] = "Do not match password!";
    }

    if(empty($phone)) {
        $errorr['phone_error'] = "Please Inter Phone Number!";
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

        // crerate Table if not exists
        $createTable = "
        
        ";
    }
}

?>