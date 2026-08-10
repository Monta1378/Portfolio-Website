<?php
session_start();
if (!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
include "../includes/db.php";
if (!isset($_GET['id'])){
    header("Location: messages.php");
    exit();
}
$id = (int) $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM messages WHERE id=?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0){
    die("Message not found.");
}
$message = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Message</title>
        <style>
            body{
                font-family: Arial, sans-serif;
                background: #f4f4f4;
                padding: 40px;
            }
            .card{
                max-width: 700px;
                margin: auto;
                background: white;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 5px 10px rgba(0,0,0,.1);
            }
            h2{
                color: #2563eb;
            }
            p{
                margin: 15px 0;
            }
            strong{
                color: #333;
            }
            a{
                display: inline-block;
                margin-top: 20px;
                text-decoration: none;
                background: #2563eb;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
            }
            a:hover{
                background: #1d4ed8;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h2>Message Details</h2>
            <p><strong>Name:</strong> <?= htmlspecialchars($message['name']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($message['email']); ?></p>
            <p><strong>Subject:</strong> <?= htmlspecialchars($message['subject']); ?></p>
            <p><strong>Date:</strong> <?= htmlspecialchars($message['created_at']); ?></p>
            <p><strong>Message:</strong></p>
            <p><?= nl2br(htmlspecialchars($message['message'])); ?></p>
            <a href="messages.php">← Back to Messages</a>
        </div>
    </body>
</html>