<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 2px solid #ddd;
        }
        .search-bar {
            width: 100%;
            padding: 10px;
            margin: 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .paper {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .paper h3 {
            margin: 0;
            color: #007bff;
        }
        .paper p {
            margin: 5px 0;
            color: #555;
        }
        .logout {
            background: #dc3545;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .logout:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Welcome, <?php echo $_SESSION['full_name']; ?>!</h2>
            <a href="user_login.php" class="logout">Logout</a>
        </div>
        <input type="text" class="search-bar" placeholder="Search for papers...">
        
        <div class="paper">
            <h3>Sample Research Paper 1</h3>
            <p>Author: John Doe</p>
            <p>Published: 2023</p>
        </div>
        
        <div class="paper">
            <h3>Sample Research Paper 2</h3>
            <p>Author: Jane Smith</p>
            <p>Published: 2022</p>
        </div>
    </div>
</body>
</html>