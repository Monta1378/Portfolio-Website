<?php
session_start();
if (!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
include "../includes/db.php";
$result = $conn->query("SELECT * FROM projects ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manage Projects</title>
        <style>
            body{
                margin: 0;
                font-family: Arial, sans-serif;
                background: #f4f4f4;
            }
            .sidebar{
                position: fixed;
                width: 230px;
                height: 100vh;
                background: #1f2937;
                color: white;
                padding: 20px;
            }
            .sidebar h2{
                margin-bottom: 30px;
            }
            .sidebar a{
                display: block;
                color: white;
                text-decoration: none;
                margin: 15px 0;
            }
            .sidebar a:hover{
                color: #38bdf8;
            }
            .main{
                margin-left: 250px;
                padding: 30px;
            }
            table{
                width: 100%;
                border-collapse: collapse;
                background: white;
            }
            th{
                background: #2563eb;
                color: white;
                padding: 12px;
            }
            td{
                padding: 12px;
                border: 1px solid #ddd;
            }
            tr:nth-child(even){
                background: #f8f8f8;
            }
            .btn{
                background: #2563eb;
                color: white;
                padding: 10px 15px;
                text-decoration: none;
                border-radius: 5px;
            }
        </style>
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
    </body>
</html>