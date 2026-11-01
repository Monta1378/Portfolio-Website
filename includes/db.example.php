<?php

$host = "localhost";
$user = "your_database_username";
$password = "your_database_password";
$database = "your_database_name";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>