<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OJO Portfolio</title>

        <link rel="stylesheet" href="/Portfolio-Website/assets/css/style.css">
        <?php if (isset($page_css)): ?>
        <link rel="stylesheet" href="/Portfolio-Website/assets/css/<?= $page_css ?>">
    <?php endif; ?>
    </head>
<body>

<header class="navbar">
    <div class="logo">
        OJO<span>Net</span>
    </div>

    <nav>
        <a href="/Portfolio-Website/">HOME</a>
        <a href="/Portfolio-Website/pages/about.php">About</a>
        <a href="/Portfolio-Website/pages/projects.php">Projects</a>
        <a href="/Portfolio-Website/pages/contact.php">Contact</a>
    </nav>
</header>