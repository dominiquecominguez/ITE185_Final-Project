<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            header("Location: dashboard.php");
        } else $error = "Incorrect password";
    } else $error = "No account found.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>  
</head>
<body>

<div class="center-box">
    <h2>Welcome Back</h2>
    <p style="text-align:center;color:#C7AFFF;">Login to continue</p>

    <?php if(isset($error)) echo "<p style='color:#FF4FD8;text-align:center;'>$error</p>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>

    <p style="text-align:center;margin-top:20px;">New here?
        <a href="signup.php">Create an account</a>
    </p>
</div>

</body>
</html>