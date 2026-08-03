<?php
include '../includes/db.php';
include '../includes/header.php';

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    $stmt = $conn->prepare("INSERT INTO messages(name, email, subject, message) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$name,$email,$subject,$message);

    if($stmt->execute()){
        $success = "Message sent successfully!";
    }else{
        $error = "Something went rong.";
    }

    $stmt->close();
}
?>

<main>
    <h2>Contact Me</h2>
    <?php
    if(isset($success)){
        echo "<p style='color:green;'>$success</p>";
    }
    if(isset($error)){
        echo "<>p style='color:red;'$error</p>";
    }
    ?>
    <form method="POST">
        <label>Name</label><br>
        <input type="text" name="name" required><br><br>
        <label>Email</label><br>
        <input type+"email" name="email" required><br><br>
        <label>Message</label><br>
        <textarea name="message" rows="6" required></textarea><br><br>
        
        <button type="submit">Send Message</button>
    </form>
</main>

<?php
include '../includes/footer.php';
?>