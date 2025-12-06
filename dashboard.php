<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Header with logout */
        .dashboard-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(15, 15, 15, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            z-index: 100;
        }

        .logo {
            font-size: 20px;
            font-weight: 600;
            background: linear-gradient(135deg, #7A5AF5, #FF4FD8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logout-btn {
            padding: 10px 24px;
            border-radius: 10px;
            background: rgba(211, 70, 163, 0.2);
            color: #FF4FD8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid rgba(211, 70, 163, 0.3);
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #D346A3;
            color: white;
            box-shadow: 0 0 20px rgba(211, 70, 163, 0.4);
            transform: translateY(-2px);
            text-decoration: none;
        }

        /* Dashboard content */
        .dashboard-content {
            margin-top: 100px;
            padding: 40px 20px;
        }

        .welcome-card {
            max-width: 600px;
            margin: 0 auto 40px;
            text-align: center;
        }

        .welcome-card h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .welcome-card p {
            color: #C7AFFF;
            font-size: 16px;
        }

        /* Action cards grid */
        .action-grid {
            max-width: 800px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 0 20px;
        }

        .action-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            text-decoration: none;
            color: white;
            border: 1px solid rgba(255,255,255,0.08);
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #7A5AF5, #FF4FD8);
            opacity: 0;
            transition: 0.3s;
            z-index: -1;
        }

        .action-card:hover::before {
            opacity: 0.1;
        }

        .action-card:hover {
            text-decoration: none;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(122, 90, 245, 0.3);
            border-color: rgba(122, 90, 245, 0.5);
        }

        .action-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .action-card h3 {
            font-size: 20px;
            margin: 10px 0;
            font-weight: 600;
        }

        .action-card p {
            font-size: 14px;
            color: #bbbbbb;
            margin: 0;
        }
    </style>
</head>
<body>

<!-- Header with Logout -->
<div class="dashboard-header">
    <div class="logo">TaskFlow</div>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<!-- Dashboard Content -->
<div class="dashboard-content">
    <div class="welcome-card">
        <h2>Hello, <?= $_SESSION['name']; ?> 👋</h2>
        <p>Welcome back! What would you like to do today?</p>
    </div>

    <div class="action-grid">
        <a href="add_task.php" class="action-card">
            <div class="action-icon">➕</div>
            <h3>Add New Task</h3>
            <p>Create a new task to track</p>
        </a>

        <a href="tasks.php" class="action-card">
            <div class="action-icon">📋</div>
            <h3>View My Tasks</h3>
            <p>See all your tasks at a glance</p>
        </a>
    </div>
</div>

</body>
</html>