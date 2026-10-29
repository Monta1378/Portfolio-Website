<?php
$page_css = "about.css";
include '../includes/header.php';
?>

<main class="about-page">
<!-- ABOUT HERO -->
 <section class="about-hero">
    <div class="about-hero-content">
        <div class="about-hero-text">
            <p class="section-label">ABOUT ME</p>
            <h1>Building my future through <span>technology.</span></h1>
            <p class="about-intro">I am Jesse Ochoi, a Mathematics and Computer Science student passionate about software development, web technologies, and solving real-world problems with technology.</p>
        </div>
        <div class="about-hero-card">
            <div class="about-avatar">OJO</div>
            <h2>OJO</h2>
            <p>Mathematics & Computer Science</p>
            <p>Future Full Stack Developer</p>
        </div>
    </div>
</section>
<!-- MY STORY -->
 <section class="home-section about-story">
    <div class="section-heading">
        <p class="section-label">MY STORY</p>
        <h2>A little about me</h2>
    </div>
    <div class="about-story-content">
        <div>
            <p>I am currently pursuing a degree in Mathematics and computer Science. My studies have given me a strong foundation in mathematics, programming, algorithms, databases, and computer systems.</p>
            <p>Alongside my university studies, i enjoy learning by building real projects. Instead of only studying programming concepts theoretically, I use projects to understand how different technologies work together.</p>
            <p>My current focus is web development, with the long-term goal of becoming a Full Stack Web Developer.</p>
        </div>
    </div>
 </section>
<!-- WHAT I DO -->
 <section class="home-section">
    <div class="section-heading">
        <p class="section-label">WHAT I DO</p>
        <h2>What I'm currently learning</h2>
    </div>
    <div class="about-skills-grid">
        <div class="about-skill-card">
            <div class="about-skill-icon">01</div>
            <h3>Web Development</h3>
            <p>Building reponsive websites using HTML, CSS, JavaScript, PHP and MySQL.</p>
        </div>
        <div class="about-skill-card">
            <div class="about-skill-icon">02</div>
            <h3>Databases</h3>
            <p>learning how to design, connect and manage databases for real-world applications.</p>
        </div>
        <div class="about-skill-card">
            <div class="about-skill-icon">03</div>
            <h3>Computer Science</h3>
            <p>Developing my understanding of algorithms, programming, operating systems and software engineering.</p>
        </div>
        <div class="about-skill-card">
            <div class="about-skill-icon">04</div>
            <h3>Mathematics</h3>
            <p>Using mathematical thinking and problem-solving skills to approach technical challenges.</p>
        </div>
    </div>
 </section>
<!-- TECHNOLOGY STACK -->
 <section class="home-section">
    <div class="section-heading">
        <p class="section-label">TECHNOLOGY</p>
        <h2>Technologies I work with</h2>
    </div>
    <div class="about-tech-stack">
        <span>HTML</span>
        <span>CSS</span>
        <span>JavaScript</span>
        <span>PHP</span>
        <span>MySQL</span>
        <span>Python</span>
        <span>Java</span>
        <span>Git</span>
        <span>GitHub</span>
    </div>
 </section>
<!-- EDUCATION -->
 <section class="home-section">
    <div class="section-heading">
        <p class="section-label">EDUCATION</p>
        <h2>My academic journey</h2>
    </div>
    <div class="about-education-card">
        <div class="education-icon">ED</div>
        <div>
            <h3>BSc Mathematics and Computer Science</h3>
            <p class="education-school">Kenyatta University</p>
            <p>Developing a combination of mathematical reasoning and computer science skills with a focus on applying knowledge to practical technology projects.</p>
        </div>
    </div>
 </section>
<!-- GOAL -->
 <section class="cta-section">
    <p class="section-label">MY GOAL</p>
    <h2>Building toward a career in technology.</h2>
    <p>I am continuously improving my technical skills by learning, experimenting and building real-world projects.</p>
    <a href="../pages/contact.php" class="btn">Let's Work Together<a>
 </section>
</main>

<?php
include '../includes/footer.php';
?>