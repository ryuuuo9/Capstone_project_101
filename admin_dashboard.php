<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f2fd;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            text-align: center;
        }
        h2 {
            margin-bottom: 25px;
            color: #007bff;
            font-weight: bold;
        }
        .nav a, .btn-toggle, .btn {
            display: block;
            padding: 12px;
            margin: 8px 0;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }
        .nav a:hover, .btn-toggle:hover, .btn:hover {
            background: #0056b3;
        }
        .logout {
            background: #dc3545;
        }
        .logout:hover {
            background: #c82333;
        }
        .btn-toggle {
            background: #007bff;
        }
        .btn-toggle:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Admin Panel - Welcome, <?php echo $_SESSION['full_name']; ?>!</h2>
        <div class="nav">
            <a href="#">Manage Users</a>
            <a href="#">View Reports</a>
            <a href="#">Settings</a>
            <a href="admin_login.php" class="logout">Logout</a>
        </div>

        <a href="pass.php" class="btn-toggle">Change Own Password</a>
    </div>  
</body>
</html>
