<?php
require_once "../includes/auth.php";
include "../includes/db.php";
if (isset($_GET['id'])){
    $id = (int) $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
    if (!$stmt){
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $id);
    if ($stmt->execute()){
        header("Location: projects.php");
        exit();
    }else{
        die("Execute failed: " . $stmt->error);
    }
    $stmt->close();
}else{
    header("Location: projects.php");
    exit();
}
?>