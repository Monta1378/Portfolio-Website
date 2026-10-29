<?php
require_once "../includes/auth.php";
include "../includes/db.php";
$result = $conn->query("SELECT * FROM projects ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-idth, initial-scale=1.0">
        <title>Manage Projects</title>
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
            <h1>Projects</h1>
            <p><a class="btn" href="add_projects.php">+ Add Project</a></p>
            <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Technologies</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php while($row = $result->fetch_assoc()){?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= htmlspecialchars($row['title']); ?></td>
                <td><?= htmlspecialchars($row['technologies']); ?></td>
                <td><?= $row['created_at']; ?></td>
                <td>
                    <a href="edit_project.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a href="delete_project.php?id=<?= $row['id']; ?>"
                    onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
            </table>
            </div>
        </div>
    </body>
</html>
