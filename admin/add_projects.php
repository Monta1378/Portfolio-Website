<?php
session_start();
if (!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
include "../includes/db.php";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $technologies = trim($_POST["technologies"]);
    $github = trim($_POST["github"]);
    $demo = trim($_POST["demo"]);

    $stmt = $conn->prepare(
        "INSERT INTO projects(title,description,technologies,github,demo)
        VALUES(?,?,?,?,?)"
    );
    $stmt->bind_param(
        "sssss",
        $title,
        $description,
        $technologies,
        $github,
        $demo
    );
    if ($stmt->execute()){
        header("Location: projects.php");
        exit();
    }else{
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Project</title>
        <style>
            body{
                font-family: Arial, sans-serif;
                background: #f4f4f4;
                padding: 40px;
            }
            .container{
                width: 700px;
                margin: auto;
                background: white;
                padding: 30px;
                border-radius: 10px;
            }
            input,
            textarea{
                width: 100%;
                padding: 12px;
                margin: 10px 0;
            }
            button{
                padding: 12px 20px;
                background: #2563eb;
                color: white;
                border: none;
                cursor: pointer;
            }
            button:hover{
                background: #1d4ed8;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Add New Project</h2>
            <form method="POST">
                <input type="text" name="title" placeholder="Project Title" required>
                <textarea name="description" rows="5" placeholder="Project Description" required></textarea>
                    <input type="text" name="technologies" placeholder="Technologies (HTML, CSS, PHP...)">
                    <input type="url" name="github" placeholder="GitHub URL">
                    <input type="url" name="demo" placeholder="Live Demo URL">
                    <button type="submit">Save Project</button>
            </form>
        </div>
    </body>
</html>