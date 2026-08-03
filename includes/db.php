<?php

$host = "localhost";
$user = "root";
$password = "JesseOchoi0378B+_74";
$database = "portfolio_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>