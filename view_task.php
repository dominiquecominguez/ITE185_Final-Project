<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$id = $_GET['id'];
$task = $conn->query("SELECT * FROM tasks WHERE id=$id AND user_id={$_SESSION['user_id']}")->fetch_assoc();

if (!$task) {
    echo "Task not found.";
    exit;
}

// Determine status color and icon
$statusColors = [
    'Pending' => '#FFA500',
    'In Progress' => '#3498db',
    'On Hold' => '#95a5a6',
    'Cancelled' => '#e74c3c',
    'Completed' => '#7A5AF5'
];

$statusIcons = [
    'Pending' => '⏳',
    'In Progress' => '🔄',
    'On Hold' => '⏸️',
    'Cancelled' => '❌',
    'Completed' => '✅'
];

$statusColor = $statusColors[$task['status']] ?? '#C7AFFF';
$statusIcon = $statusIcons[$task['status']] ?? '📝';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Task - <?= htmlspecialchars($task['task_title']) ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Task card styling */
        .task-card {
            max-width: 650px;
            margin: 80px auto;
            background: rgba(255, 255, 255, 0.05);
            padding: 45px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0px 0px 30px rgba(127, 72, 255, 0.2);
            position: relative;
        }

        /* Decorative corner accent */
        .task-card::before {
            content: '📌';
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            opacity: 0.3;
        }

        .task-header {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .task-title {
            font-size: 28px;
            font-weight: 600;
            color: white;
            margin: 0 0 15px 0;
            line-height: 1.3;
        }

        .task-meta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            font-size: 14px;
            color: #bbbbbb;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 14px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .task-body {
            margin: 30px 0;
        }

        .section-label {
            font-size: 13px;
            font-weight: 600;
            color: #C7AFFF;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .task-description {
            background: rgba(255,255,255,0.03);
            padding: 22px 26px;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.05);
            color: #e0e0e0;
            line-height: 1.85;
            font-size: 15px;
            white-space: pre-wrap;
            word-wrap: break-word;
            text-align: justify;
            text-justify: inter-word;
        }
        
        /* Force remove any inherited indents */
        .task-description * {
            text-indent: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .task-actions {
            display: flex;
            gap: 12px;
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .btn {
            flex: 1;
            padding: 14px 24px;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: 0.3s;
        }

        .btn-edit {
            background: linear-gradient(135deg, #7A5AF5, #FF4FD8);
            color: white;
        }

        .btn-edit:hover {
            box-shadow: 0 0 20px rgba(255, 79, 216, 0.6);
            transform: translateY(-2px);
        }

        .btn-back {
            background: rgba(255,255,255,0.05);
            color: white;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .btn-back:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="task-card">
    <div class="task-header">
        <h1 class="task-title"><?= htmlspecialchars($task['task_title']) ?></h1>
        
        <div class="task-meta">
            <div class="meta-item">
                <span class="status-badge" style="color: <?= $statusColor ?>; border-color: <?= $statusColor ?>33;">
                    <span><?= $statusIcon ?></span>
                    <span><?= htmlspecialchars($task['status']) ?></span>
                </span>
            </div>
            <div class="meta-item">
                📅 Created: <?= date('M j, Y', strtotime($task['created_at'])) ?>
            </div>
        </div>
    </div>

    <div class="task-body">
        <div class="section-label">Description</div>
        <div class="task-description"><?= trim(htmlspecialchars($task['task_description'])) ?></div>
    </div>

    <div class="task-actions">
        <a href="update_task.php?id=<?= $task['id'] ?>" class="btn btn-edit">
            ✏️ Edit Task
        </a>
        <a href="tasks.php" class="btn btn-back">
            ← Back to Tasks
        </a>
    </div>
</div>

</body>
</html>