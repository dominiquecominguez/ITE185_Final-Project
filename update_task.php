<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$id = $_GET['id'];
$task = $conn->query("SELECT * FROM tasks WHERE id=$id")->fetch_assoc();

if (!$task) {
    echo "Task not found.";
    exit;
}

if (isset($_POST['update'])) {
    $title = $_POST['task_title'];
    $desc = $_POST['task_description'];
    $status = $_POST['status'];

    $conn->query("UPDATE tasks SET 
                  task_title='$title',
                  task_description='$desc',
                  status='$status'
                  WHERE id=$id");

    header("Location: tasks.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Simple custom select */
        select {
            width: 100%;
            padding: 14px;
            margin: 10px 0 20px 0;
            border-radius: 12px;
            border: none;
            background: rgba(255,255,255,0.08);
            color: white;
            font-size: 15px;
            cursor: pointer;
            
            /* Remove default styling */
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            
            /* Custom arrow background */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='white' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
            padding-right: 40px;
        }
        
        select:hover {
            background-color: rgba(255,255,255,0.12);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='white' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        }
        
        select option {
            background: #2a2a2a;
            color: white;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="center-box">
    <h2>Edit Task</h2>
    <p style="text-align:center;color:#C7AFFF;">Modify the details below</p>

    <form method="POST">
        <input type="text" name="task_title" 
               value="<?= $task['task_title'] ?>" required>

        <textarea name="task_description" required><?= $task['task_description'] ?></textarea>

        <select name="status" required>
            <option value="Pending" <?= $task['status']=='Pending'?'selected':'' ?>>Pending</option>
            <option value="In Progress" <?= $task['status']=='In Progress'?'selected':'' ?>>In Progress</option>
            <option value="On Hold" <?= $task['status']=='On Hold'?'selected':'' ?>>On Hold</option>
            <option value="Cancelled" <?= $task['status']=='Cancelled'?'selected':'' ?>>Cancelled</option>
            <option value="Completed" <?= $task['status']=='Completed'?'selected':'' ?>>Completed</option>
        </select>

        <button name="update">Save Changes</button>
    </form>

    <p style="text-align:center;margin-top:20px;">
        <a href="tasks.php">← Back to tasks</a>
    </p>
</div>

</body>
</html>