<?php
include "../includes/db.php";
$page_css ="projects.css";
include "../includes/header.php";
$result = $conn->query("SELECT * FROM projects ORDER BY created_at DESC");
?>

<main class="projects-page">
    <div class="projects-container">
        <h1>My Projects</h1>
        <p>A selection of projects I have built while developing my skills in web development, software engineering, and databse technologies.</p>
    </div>
<!-- Projects Grid -->
 <div class="grid">
    <?php while($project = $result->fetch_assoc()){?>
    <article class="card">
        <?php if (!empty($project['image'])) { ?>
        <img src="../uploads/projects/<?= htmlspecialchars($project['image']) ?>"
        alt="<?= htmlspecialchars($project['title']) ?>"
        class="project-image">
        <?php } ?>
        <h2><?= htmlspecialchars($project['title']) ?></h2>
        <p><?= htmlspecialchars(substr($project['description'], 0, 120)) ?>
        <?php if (strlen($project['description']) > 120) echo "..."; ?></p>
<!-- Technologies -->
 <?php if (!empty($project['technologies'])) { ?>
 <p class="tech"><?= htmlspecialchars($project['technologies']) ?></p>
 <?php } ?>
<!-- Buttons -->
 <div class="buttons">
    <a class="btn" href="project.php?id=<?= $project['id']; ?>">View Details</a>
    <?php if(!empty($project['github'])){ ?>
    <a class="btn" href="<?= htmlspecialchars($project['github']) ?>" target="_blank" rel="noopener noreferrer">GitHub</a>
    <?php } ?>
    <?php if(!empty($project['demo'])){ ?>
    <a class="btn" href="<?= htmlspecialchars($project['demo']) ?>" target="_blank" rel="noopener noreferrer">Live Demo</a>
    <?php } ?>
</div>
</article>
<?php } ?>
</div>
</div>
</main>

<?php include "../includes/footer.php"; ?>