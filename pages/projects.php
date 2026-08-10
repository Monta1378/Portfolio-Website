<?php
include "../includes/db.php";
$page_css ="projects.css";
include "../includes/header.php";
$result = $conn->query("SELECT * FROM projects ORDER BY created_at DESC");
?>

    <main>
        <div class="container">
            <h1>My Projects</h1>
            <div class="grid">
                <?php while($project = $result->fetch_assoc()){?>
            <div class="card">
                <h2><?= htmlspecialchars($project['title']) ?></h2>
                <?php if (!empty($project['image'])){ ?>
                <img src="../uploads/projects/<?= htmlspecialchars($project['image']) ?>"
                alt="<?= htmlspecialchars($project['title']) ?>"
                class="project-image">
            <?php } ?>
                <p><?= htmlspecialchars(substr($project['description'], 0, 120)) ?>
            <?php if (strlen($project['description']) > 120) echo "..."; ?></p>
                <p class="tech"><?= htmlspecialchars($project['technologies']) ?></p>
                <div class="buttons">
                    <a class="btn" href="project.php?id=<?= $project['id']; ?>">View Details</a>
                <?php if(!empty($project['github'])){ ?>
                <a class="btn" href="<?= htmlspecialchars($project['github']) ?>" target="_blank">GitHub</a>
            <?php } ?>
            <?php if(!empty($project['demo'])){ ?>
                <a class="btn" href="<?= htmlspecialchars($project['demo']) ?>" target="_blank">Live Demo</a>
            <?php } ?>
                </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>

<?php include "../includes/footer.php"; ?>