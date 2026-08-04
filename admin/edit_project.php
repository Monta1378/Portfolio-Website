<?php
session_start();
if (!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
include "../includes/db.php";
//Get the project ID
if (!isset($_GET['id'])){
    header("Location: projects.php");
    exit();
}
$id = (int)$_GET['id'];
//Update project
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $technologies = trim($_POST["technologies"]);
    $github = trim($_POST["github"]);
    $demo = trim($_POST["demo"]);
    $stmt = $conn->prepare("
    UPDATE projects
    SET title=?, description=?, technologies=?, github=?, demo=?
    WHERE id=?
    ");
    $stmt->bind_param(
        "sssssi",
        $title,
        $description,
        $technologies,
        $github,
        $demo,
        $id
    );
    if ($stmt->execute()){
        header("Location: projects.php");
        exit();
    }else{
        echo "Error" . $stmt->error;
    }
    $stmt->close();
}
//Fetch current project
$stmt = $conn->prepare("SELECT * FROM projects WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$project = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Project</title>
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
            box-sizing: border-box;
        }
        button{
            background: #2563eb;
            color: white;
            paddding: 12px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover{
            background: #1d4ed8;
        }
        .back{
            text-decoration: none;
            color: #2563eb;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Edit Project</h2>
            <form method="POST">
                <input type="text" name="title" value="<?= htmlspecialchars($project['title']) ?>" required>
                <textarea name="description" rows="5" required><?= htmlspecialchars($project['description']) ?></textarea>
                <input type="text" name="technologies" value="<?= htmlspecialchars($project['technologies']) ?>">
                <input type="url" name="github" value="<?= htmlspecialchars($project['github']) ?>">
                <input type="url" name="demo" value="<?= htmlspecialchars($project['demo']) ?>">
                <button type="submit">Update Project</button>
            </form>
            <br>
            <a class="back" href="projects.php">← Back to Projects</a>
        </div>
    </body>
</html>