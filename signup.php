<?php 
include 'db.php';

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("INSERT INTO users (name, email, password) 
                  VALUES ('$name', '$email', '$password')");
    
    header("Location: login.php?success=1");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="center-box">
    <h2>Create Account</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="signup">Sign Up</button>
    </form>

    <p style="text-align:center;margin-top:20px;">Already have an account?
        <a href="login.php">Login here</a>
    </p>
</div>

</body>
</html>