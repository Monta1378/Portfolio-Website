<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
include "../includes/db.php";
if (isset($_GET['id'])){
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM messages WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
header("Location: messages.php");
exit();
} ?>