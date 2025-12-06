<?php
session_start();
include 'db.php';

if (isset($_POST['save'])) {
    $uid = $_SESSION['user_id'];
    $title = $_POST['task_title'];
    $desc = $_POST['task_description'];

    $conn->query("INSERT INTO tasks (user_id, task_title, task_description)
                  VALUES ('$uid', '$title', '$desc')");

    header("Location: tasks.php");
}
?>