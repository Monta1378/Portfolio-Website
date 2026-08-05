<?php
include "../includes/db.php";
if(!isset($_GET['id'])){
    header("Location: projects.php");
    exit();
}
$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    die("Project not found.");
}
$project = $result->fetch_assoc();
$stmt->close();
include "../includes/header.php";
?>
<link rel="stylesheet" href="../assets/css/project.css">

<main class="project-details">
    <h1><?= htmlspecialchars($project['title']); ?></h1>
    <img src="../uploads/projects/<?= htmlspecialchars($project['image']); ?>"
    alt="<?= htmlspecialchars($project['title']); ?>"
    class="project-image-large">
    <h2>Description</h2>
    <p><?= nl2br(htmlspecialchars($project['description']))?></p>
    <h2>Technologies</h2>
    <div class="tech-list">
        <?php
        $techs = explode(",", $project['technologies']);
        foreach($techs as $tech){
            ?>
            <span class="tech"><?= htmlspecialchars(trim($tech)); ?></span>
        <?php } ?>
    </div>
    <br>
    <div class="project-buttons">
        <a class="btn" href="<?= htmlspecialchars($project['github'])?>" target="_blank">GitHub</a>
        <a class="btn btn-secondary" href="<?= htmlspecialchars($project['demo'])?>" target="_blank">Live demo</a>
    </div>
    <br><br>
    <a href="projects.php">← Back to Projects</a>
</main>
<?php include "../includes/footer.php"; ?>