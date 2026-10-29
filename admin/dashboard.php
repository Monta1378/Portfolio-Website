<?php
require_once "../includes/auth.php";
include "../includes/db.php";
$totalMessages = $conn->query("SELECT COUNT(*) AS total FROM messages");
$total = $totalMessages->fetch_assoc()['total'];
$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OJO Admin Dashboard</title>
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
            <h1>Dashboard</h1>
            <div class="card">
                <h3>Total Messages</h3>
                <h1><?php echo $total; ?></h1>
            </div>
            <h2>Recent Messages</h2>
            <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
                    <?php while($row=$result->fetch_assoc()){ ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['name']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['subject']); ?></td>
                        <td><?= htmlspecialchars($row['message']); ?></td>
                        <td><?= $row['created_at']; ?></td>
                    </tr>
                    <?php } ?>
            </table>
            </div>
        </div>
    </body>
</html>
