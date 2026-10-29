<?php
require_once "../includes/auth.php";
include "../includes/db.php";
$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messages</title>
        <link rel="stylesheet" href="../assets/css/admin.css?v=<?= is_file(__DIR__ . '/../assets/css/admin.css') ? (int) filemtime(__DIR__ . '/../assets/css/admin.css') : 1 ?>">
    </head>
    <body>
        <div class="sidebar">
            <h2>OJO Admin</h2>
            <a href="dashboard.php">Dashboard</a>
            <a href="messages.php">Messages</a>
            <a href="projects.php">Projects</a>
            <a href="../index.php">View Website</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="main">
            <h1>All Messages</h1>
            <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['subject']); ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <a class="btn" style="background: #2563eb;" href="view.php?id=<?php echo $row['id']; ?>">View</a>
                    <a class="btn" href="delete.php?id=<?php echo $row['id']; ?>"
                    onclick="return confirm('Delete this message?');"
                    >Delete</a>
                </td>
            </tr>
        <?php } ?>
            </table>
            </div>
        </div>
    </body>
</html>
