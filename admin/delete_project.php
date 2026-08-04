<?php
session_start();
if (!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
include "../includes/db.php";
if (!isset($_GET['id'])){
    $id = (int) $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()){
        header("Location: projects.php");
        exit();
    }else{
        echo "Failed to delete project.";
    }
    $stmt->close();
}else{
    header("Location: projects.php");
    exit;
}
?>