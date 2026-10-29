<?php
include "includes/db.php";
$projectCountResult = $conn->query("SELECT COUNT(*) AS total FROM projects");
$projectCount = (int) $projectCountResult->fetch_assoc()['total'];
$portraitPath = __DIR__ . '/assets/images/jesse-ochoi.jpg';
$portraitVersion = is_file($portraitPath) ? filemtime($portraitPath) : 1;
$technologyResult = $conn->query("SELECT technologies FROM projects WHERE technologies IS NOT NULL AND TRIM(technologies) <> ''");
$technologies = [];
while ($technologyRow = $technologyResult->fetch_assoc()) {
    foreach (explode(',', $technologyRow['technologies']) as $technology) {
        $technology = trim($technology);
        if ($technology !== '') {
            $technologies[strtolower($technology)] = $technology;
        }
    }
}
$technologies = array_values($technologies);
include "includes/header.php";
$result = $conn->query("SELECT * FROM projects ORDER BY created_at DESC LIMIT 3");
?>
<main>
<!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <p class="welcome">👋 Welcome to my portfolio</p>
                <h1>Hi, I'm <span>Jesse Ochoi</span></h1>
                <h2>Mathematics & Computer Science Student</h2>
                <p class="hero-description">I build responsive websites and web applications using HTML, CSS, JavaScript, PHP, and MySQL. I enjoy turning ideas into practical software projects.</p>
                <div class="buttons">
                    <a href="pages/projects.php" class="btn">View Projects</a>
                    <a href="pages/contact.php" class="btn btn-secondary">Contact Me</a>
                </div>
                <div class="tech-stack">
                    <?php foreach ($technologies as $technology): ?>
                    <span><?= htmlspecialchars($technology) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="hero-image">
                <div class="profile-card">
                    <img class="profile-photo" src="<?= $projectBase ?>/assets/images/jesse-ochoi.jpg?v=<?= (int) $portraitVersion ?>" alt="Portrait of Jesse Ochoi">
                    <h3>Full Stack Developer</h3>
                    <p>Building projects and learning every day.</p>
                </div>
            </div>
        </div>
    </section>
<!-- Statistics -->
    <section class="stats">
        <div class="stat-card">
            <h3><?= $projectCount ?></h3>
            <p>Projects</p>
        </div>
        <div class="stat-card">
            <h3><?= count($technologies) ?></h3>
            <p>Technologies</p>
        </div>
        <div class="stat-card">
            <h3>4th</h3>
            <p>Year Student</p>
        </div>
    </section>
<!-- ABOUT -->
    <section class="home-section about-home">
        <div class="section-heading">
            <p class="section-label">ABOUT ME</p>
            <h2>Building solutions with code</h2>
        </div>
        <div class="about-content">
            <div>
                <p>I'm a Mathematics and Computers Science student with an interest in software development and problem solving.</p>
                <p>I enjoy building practical applications that combine clean interfaces with reliable backend systems.</p>
            </div>
            <a href="pages/about.php" class="btn">More About Me</a>
        </div>
    </section>
<!-- WHAT I DO -->
    <section class="home-section">
        <div class="section-heading">
            <p class="section-label">WHAT I DO</p>
            <h2>Things I build</h2>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">💻</div>
                <h3>Web Development</h3>
                <p>Responsive and mordern websites built with HTML, CSS and JavaScript</p>
            </div>
            <div class="service-card">
                <div class="service-icon">⚙️</div>
                <h3>Backend Development</h3>
                <p>Dynamic web applications using PHP and database-driven functionality</p>
            </div>
            <div class="service-card">
                <div class="service-icon">🗄️</div>
                <h3>Database Systems</h3>
                <p>Designing and working with MySQL databases, CRUD operations and prepared statements.</p>
            </div>
        </div>
    </section>
<!-- FEATURED PROJECTS -->
    <section class="home-section projects-home">
        <div class="section-heading">
            <p class="section-label">MY WORK</p>
            <h2>Featured Projects</h2>
        </div>
        <div class="featured-grid">
            <?php while($project = $result->fetch_assoc()) { ?>
            <div class="featured-card">
                <?php if(!empty($project['image'])){?>
                <img src="uploads/projects/<?= htmlspecialchars($project['image']); ?>"
                alt="<?= htmlspecialchars($project['title']); ?>">
                <?php } ?>
                <div class="featured-content">
                    <h3><?= htmlspecialchars($project['title']); ?></h3>
                    <p><?= htmlspecialchars(substr($project['description'], 0, 120)); ?>
                    <?php if(strlen($project['description']) > 120){echo "..."; } ?>
                    </p>
                    <a href="pages/project.php?id=<?= $project['id']; ?>" class="project-link">View Project →</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="view-all">
            <a href="pages/projects.php" class="btn">View All Projects</a>
        </div>
    </section>
<!-- EDUCATION -->
    <section class="home-section education-home">
        <div class="section-heading">
            <p class="section-label">EDUCATION</p>
            <h2>My Academic Background</h2>
        </div>
        <div class="education-card">
            <div class="education-icon">🎓</div>
            <div>
                <h3>BSc Mathematics & Computer Science</h3>
                <p>Currently pursuing a degree combining mathematical problem solving with computer science and softwae development</p>
            </div>
        </div>
    </section>
<!-- CALL TO ACTION-->
    <section class="cta-section">
        <p class="section-label">LET'S WORK TOGETHER</p>
        <h2>Have a project in mind?</h2>
        <p>I'm always interested in building useful and interesting software projects.</p>
        <a href="pages/contact.php" class="btn">Get In Touch</a>
    </section>
</main>
<?php include "includes/footer.php";?>
