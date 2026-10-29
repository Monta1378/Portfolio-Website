<?php
require_once "../includes/auth.php";
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Project</title>
        <link rel="stylesheet" href="../assets/css/admin.css?v=<?= is_file(__DIR__ . '/../assets/css/admin.css') ? (int) filemtime(__DIR__ . '/../assets/css/admin.css') : 1 ?>">
    </head>
    <body>
        <div class="sidebar">
            <h2>OJO Admin</h2>
            <a href="dashboard.php">Dashboard</a>
            <a href="messages">Messages</a>
            <a href="projects.php">Projects</a>
            <a href="../index.php">View Website</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="main">
            <div class="container">
                <h1>Edit Project</h1>
                    <form method="POST">
                        <div class="form-group">
                            <label for="title">Project Title</label>
                            <input type="text" id="title" name="title" value="<?= htmlspecialchars($project['title']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="decription" name="description" rows="6" required><?= htmlspecialchars($project['description']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="technologies">Technologies</label>
                            <input type="text" id="technologies" name="technologies" value="<?= htmlspecialchars($project['technologies']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="github">GitHub</label>
                            <input type="url" id="github" name="github" value="<?= htmlspecialchars($project['github']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="demo">Live Demo</label>
                            <input type="url" id="demo" name="demo" value="<?= htmlspecialchars($project['demo']) ?>">
                        </div>
                        <button type="submit">Update Project</button>
                    </form>
                <a class="back" href="projects.php">← Back to Projects</a>
            </div>
        </div>
    </body>
</html>
