<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$servername = $_ENV['DB_HOST'];
$username   = $_ENV['DB_USERNAME'];
$password   = $_ENV['DB_PASSWORD'];
$dbname     = $_ENV['DB_DATABASE'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

?>