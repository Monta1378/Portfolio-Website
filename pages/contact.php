<?php
include '../includes/db.php';
$page_css = "contact.css";
include '../includes/header.php';

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    $stmt = $conn->prepare("INSERT INTO messages(name, email, subject, message) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$name, $email, $subject, $message);

    if ($stmt->execute()) {
        $success = "Message sent successfully!";
    }else{
        $error = "Something went wrong.";
    }

    $stmt->close();
}
?>

<main class="contact-page">
    <div class="contact-container">
    <h2>Contact Me</h2>
    <?php if (isset($success)): ?>
    <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
    <form method="POST" class="contact-form">
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" required>
        </div>
        <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="6" required></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
    </div>
</main>

<?php
include '../includes/footer.php';
?>