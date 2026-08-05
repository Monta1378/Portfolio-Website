<?php
include "../includes/db.php";
include "../includes/header.php";
$result = $conn->query("SELECT * FROM projects ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Projects</title>
        <style>
            body{
                font-family: Arial, sans-serif;
                background: #f4f4f4;
                margin: 0;
            }
            .container{
                width: 90%;
                max-width: 1200px;
                margin: 40px auto;
            }
            h1{
                text-align: center;
            }
            .grid{
                display: grid;
                grid-template-columns: repeat(auto-fit,minmax(320px,1fr));
                gap: 20px;
            }
            .card{
                background: white;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 2px 8px rgba(0,0,0,.1);
            }
            .card h2{
                margin-top: 0;
            }
            .tech{
                color: #2563eb;
                font-weight: bold;
            }
            .buttons{
                margin-top: 20px;
            }
            .btn{
                display: inline-block;
                padding: 10px 16px;
                margin-right: 10px;
                text-decoration: none;
                color: white;
                background: #2563eb;
                border-radius: 5px;
            }
            .btn:hover{
                background: #1d4ed8;
            }
            .project-image{
                width: 100%;
                height: 220px;
                object-fit: cover;
                border-radius: 10px;
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body>
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
                <p><?= nl2br(htmlspecialchars($project['description'])) ?></p>
                <p class="tech"><?= htmlspecialchars($project['technologies']) ?></p>
                <div class="buttons">
                    <?php if(!empty($project['github'])){ ?>
                    <a class="btn" href="project.php?id=<?= $project['id']; ?>">View Details</a>
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
    </body>
</html>
<?php include "../includes/footer.php";?>