<?php
include 'db.php';
$result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Student To-Do List</h2>

<form action="add_task.php" method="POST" class="form-box">
    <input type="text" name="student_name" placeholder="Student Name" required>
    <input type="text" name="task_title" placeholder="Task Title" required>
    <textarea name="task_description" placeholder="Task Description" required></textarea>
    <button type="submit">Add Task</button>
</form>

<h3>Tasks</h3>

<table>
    <tr>
        <th>ID</th>
        <th>Student</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['student_name']; ?></td>
        <td><?= $row['task_title']; ?></td>
        <td><?= $row['task_description']; ?></td>
        <td><?= $row['status']; ?></td>
        <td>
            <a href="update_task.php?id=<?= $row['id']; ?>">Update</a>
            <a href="delete_task.php?id=<?= $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>