<?php
require_once "../includes/auth.php";
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
        <link rel="stylesheet" href="../assets/css/admin.css?v=<?= is_file(__DIR__ . '/../assets/css/admin.css') ? (int) filemtime(__DIR__ . '/../assets/css/admin.css') : 1 ?>">
    </head>
    <body class="message-view-page">
        <div class="message-card">
            <h1>Message Details</h1>
            <div class="message-field">
                <strong>Name</strong>
                <p><?= htmlspecialchars($message['name']); ?></p>
            </div>
            <div class="message-field">
                <strong>Email</strong>
                <p><?= htmlspecialchars($message['email']); ?></p>
            </div>
            <div class="message-field">
                <strong>Subject</strong>
                <p><?= htmlspecialchars($message['subject']); ?></p>
            </div>
            <div class="message-field">
                <strong>Date</strong>
                <p><?= htmlspecialchars($message['created_at']); ?></p>
            </div>
            <div class="message-field message-content">
                <strong>Message</strong>
                <p><?= nl2br(htmlspecialchars($message['message'])); ?></p>
            </div>
            <a class="btn" href="messages.php">← Back to Messages</a>
        </div>
    </body>
</html>
