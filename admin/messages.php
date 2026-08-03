<?php
session_start();
if (!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
include "../includes/db.php";
$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messages</title>
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
                margin: 15px o;
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
            th,td{
                padding: 12px;
                border: 1px solid #ddd;
                text-align: left;
            }
            th{
                background: #2563eb;
                color: white;
            }
            .btn{
                background: red;
                color: white;
                padding: 6px 10px;
                text-decoration: none;
                border-radius: 5px;
            }
            .btn:hover{
                background: darkred;
            }
        </style>
    </head>
    <body>
        <div class="sidebar">
            <h2>OJO Admin</h2>
            <a href="dashboard.php">Dashboard</a>
            <a href="messages.php">Messages</a>
            <a href="../index.php">View Website</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="main">
            <h1>All Messages</h1>
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
                    <a class="btn" style="background: #2563eb;" href="view.php?id<?php echo $row['id']; ?>">View</a>
                    <a class="btn" href="delete.php?id=<?php echo $row['id']; ?>"
                    onclick="return confirm('Delete this message?');"
                    >Delete</a>
                </td>
            </tr>
        <?php } ?>
            </table>
        </div>
    </body>
</html>