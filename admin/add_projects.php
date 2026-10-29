<?php
require_once "../includes/auth.php";
include "../includes/db.php";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $technologies = trim($_POST["technologies"]);
    $github = trim($_POST["github"]);
    $demo = trim($_POST["demo"]);
    $image = "";
    if (!empty($_FILES["image"]["name"])){
        $image = time() .  "_" . basename($_FILES["image"]["name"]);
        $target = "../uploads/projects/" . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target);
    }

    $stmt = $conn->prepare(
        "INSERT INTO projects(title,description,technologies,github,demo,image)
        VALUES(?,?,?,?,?,?)"
    );
    $stmt->bind_param(
        "ssssss",
        $title,
        $description,
        $technologies,
        $github,
        $demo,
        $image
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Project</title>
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
                <div class="form-container">
                    <h1>Add New Project</h1>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Project Title</label>
                            <input type="text" id="title" name="title" placeholder="Project Title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" rows="6" placeholder="Project Description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="technologies">Technologies</label>
                            <input type="text" id="technologies" name="technologies" placeholder="Technologies (HTML, CSS, PHP...)">
                        </div>
                        <div class="form-group">
                            <label for="github">GitHub</label>
                            <input type="url" id="github" name="github" placeholder="https://github.com/..">
                        </div>
                        <div class="form-group">
                            <label for="demo">Live Demo</label>
                            <input type="url" name="demo" placeholder="https://..">
                        </div>
                        <div class="form-group">
                            <label for="image">Project Image</label>
                            <input type="file" id="image" name="image" accept="image/*">
                        </div>
                        <button type="submit">Save Project</button>
                    </form>
                </div>
            </div>
    </body>
</html>
