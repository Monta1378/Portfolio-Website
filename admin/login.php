<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');

session_start();
include "../includes/db.php";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows==1){
        $admin = $result->fetch_assoc();
        if(password_verify($password, $admin['password'])){
            session_regenerate_id(true);
            $_SESSION['admin'] = $username;
            header("Location: dashboard.php");
            exit();
        }
    }
    $error = "Invalid username or password.";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="../assets/css/admin.css?v=<?= is_file(__DIR__ . '/../assets/css/admin.css') ? (int) filemtime(__DIR__ . '/../assets/css/admin.css') : 1 ?>">
    </head>
    <body class="login-page">
        <div class="login-card">
            <div class="login-header">
                <h1>OJO Admin</h1>
                <p>Sign in to your dashboard</p>
            </div>
            <?php if (isset($error)): ?>
                <div class="login-error">
                    <?= htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            <form method="POST">
                <div class="login-field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required autocomplete="username">
                </div>
                <div class="login-field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="password" required autocomplete="current-password">
                </div>
                <button type="submit" name="login" class="login-button">Login</button>
            </form>
            <a href="../index.php" class="back-website">← Back to Website</a>
        </div>
    </body>
</html>

