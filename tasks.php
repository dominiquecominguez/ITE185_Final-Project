<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$uid = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM tasks WHERE user_id=$uid ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Tasks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div style="width: 80%; margin: 50px auto;">

    <h2 style="text-align:center;">Your Tasks</h2>
    <p style="text-align:center;color:#C7AFFF;">Manage and track your progress</p>

    <table>
        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Status</th>
            <th style="width: 260px;">Actions</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['task_title'] ?></td>
            <td><?= $row['task_description'] ?></td>
            <td>
                <span style="color:<?= $row['status']=='Completed'?'#7A5AF5':'#C7AFFF' ?>">
                    <?= $row['status'] ?>
                </span>
            </td>
            <td class="actions">
                <a href="view_task.php?id=<?= $row['id'] ?>" class="action-btn view">View</a>
                <a href="update_task.php?id=<?= $row['id'] ?>" class="action-btn edit">Edit</a>
                <a href="delete_task.php?id=<?= $row['id'] ?>" class="action-btn delete"
                   onclick="return confirm('Delete this task?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>

    </table>

    <p style="text-align:center;margin-top:30px;">
        <a href="dashboard.php" class="menu-btn">← Back to dashboard</a>
    </p>

</div>

</body>
</html>