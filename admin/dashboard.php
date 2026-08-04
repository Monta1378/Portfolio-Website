<?php
session_start();
if (!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "../includes/db.php";
$totalMessages = $conn->query("SELECT COUNT(*) AS total FROM messages");
$total = $totalMessages->fetch_assoc()['total'];
$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OJO Admin Dashboard</title>
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
            .card{
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,.1);
                width: 250px;
                margin-bottom: 30px;
            }
            table{
                width: 100%;
                border-collapse: collapse;
                background: white;
            }
            table th{
                background: #2563eb;
                color: white;
            }
            table th,
            table td{
                padding: 12px;
                border: 1px solid #ddd;
                text-align: left;
            }
            tr:nth-child(even){
                background: #f8f8f8;
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
            <h1>Dashboard</h1>
            <div class="card">
                <h3>Total Messages</h3>
                <h1><?php echo $total; ?></h1>
            </div>
            <h2>Recent Messages</h2>
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
    </body>
</html>