<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="center-box">
    <h2>Add a New Task</h2>
    <p style="text-align:center;color:#C7AFFF;">Create something you need to complete</p>

    <form action="save_task.php" method="POST">
        <input type="text" name="task_title" placeholder="Task Title" required>

        <textarea name="task_description" placeholder="Task Description" required></textarea>

        <button type="submit" name="save">Save Task</button>
    </form>

    <p style="text-align:center;margin-top:20px;">
        <a href="dashboard.php">← Back to dashboard</a>
    </p>
</div>

</body>
</html>
