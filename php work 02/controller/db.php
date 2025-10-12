<?php

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbtablename = "registration_form";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbtablename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful!";
}

?>