<?php
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
            $_SESSION['admin'] = $username;
            header("Location: dashboard.php");
            exit();
        }
    }
    $error = "Invalid username or password.";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>
        <h2>Admin Login</h2>

        <?php
        if(isset($error)){
            echo "<p style='color:red;'>$error</p>";
        }
        ?>

        <form method="POST">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </body>
</html>