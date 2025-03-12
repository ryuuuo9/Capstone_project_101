<?php
session_start();
include 'db.php';

// Check kung naka-login ang admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    $_SESSION['error'] = "Access denied!";
    header("Location: login.php");
    exit();
}

// Handle password change logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check kung tama ang current password
    $stmt = $conn->prepare("SELECT password FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user || $current_password !== $user['password']) {
        $_SESSION['error'] = "❌ Incorrect current password!";
    } elseif ($new_password !== $confirm_password) {
        $_SESSION['error'] = "❌ New password and confirmation do not match!";
    } else {
        // Update password sa database
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
        $stmt->bind_param("si", $new_password, $_SESSION['user_id']);

        if ($stmt->execute()) {
            $_SESSION['success'] = "✅ Password changed successfully!";
        } else {
            $_SESSION['error'] = "❌ Error updating password.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Admin Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            justify-content: center;
            margin: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
        }
        h2 {
            color: #007bff;
        }
        .home-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .home-button:hover {
            background-color: #007bff;
        }
        .form-group {
            position: relative;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            outline: none;
            box-sizing: border-box;
        }
        .show-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #007bff;
            font-size: 18px;
        }
        .error { color: red; margin: 10px 0; }
        .success { color: green; margin: 10px 0; }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <a href="admin_dashboard.php" class="home-button"> Home</a>

    <div class="container">
        <h2>Change Password</h2>

        <?php if (isset($_SESSION['error'])): ?>
            <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <p class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <input type="password" id="current_password" name="current_password" placeholder="Current Password" required>
                <span class="show-password" onclick="togglePassword('current_password')">👁</span>
            </div>

            <div class="form-group">
                <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
                <span class="show-password" onclick="togglePassword('new_password')">👁</span>
            </div>

            <div class="form-group">
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm New Password" required>
                <span class="show-password" onclick="togglePassword('confirm_password')">👁</span>
            </div>

            <button type="submit">Change Password</button>
        </form>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            field.type = field.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>