
<?php
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Base URL for the project.
// Works locally in /Portfolio-Website and on a domain where the site is at /.
$projectBase = (strpos($_SERVER['SCRIPT_NAME'] ?? '', '/Portfolio-Website/') === 0)
    ? '/Portfolio-Website'
    : '';

$sharedCssPath = __DIR__ . '/../assets/css/style.css';
$sharedCssVersion = is_file($sharedCssPath) ? filemtime($sharedCssPath) : 1;

$logoPath = __DIR__ . '/../assets/images/logo.png';
$logoVersion = is_file($logoPath) ? filemtime($logoPath) : 1;

if (isset($page_css)) {
    $pageCssName = basename($page_css);
    $pageCssPath = __DIR__ . '/../assets/css/' . $pageCssName;
    $pageCssVersion = is_file($pageCssPath) ? filemtime($pageCssPath) : 1;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jesse Ochoi | Portfolio</title>

    <link rel="stylesheet"
          href="<?= $projectBase ?>/assets/css/style.css?v=<?= (int) $sharedCssVersion ?>">

    <?php if (isset($page_css)): ?>
        <link rel="stylesheet"
              href="<?= $projectBase ?>/assets/css/<?= htmlspecialchars($pageCssName, ENT_QUOTES, 'UTF-8') ?>?v=<?= (int) $pageCssVersion ?>">
    <?php endif; ?>
</head>
<body>

<header class="navbar">
    <a class="logo" href="<?= $projectBase ?>/" aria-label="Jesse Ochoi home">
        <img src="<?= $projectBase ?>/assets/images/logo.png?v=<?= (int) $logoVersion ?>" alt="Logo">
        <span>Jesse Ochoi</span>
    </a>

    <nav>
        <a href="<?= $projectBase ?>/">HOME</a>
        <a href="<?= $projectBase ?>/pages/about.php">About</a>
        <a href="<?= $projectBase ?>/pages/projects.php">Projects</a>
        <a href="<?= $projectBase ?>/pages/contact.php">Contact</a>
    </nav>
</header>
