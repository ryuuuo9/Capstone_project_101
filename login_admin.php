<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check user sa database (Admin only)
    $stmt = $conn->prepare("SELECT user_id, full_name, password, role FROM users WHERE email = ? AND role = 'admin'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Check kung tama ang password
        if ($password === $user['password']) { // Gamitin ang hashed password kung encrypted
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];

            // Redirect to admin dashboard
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "incorrect password!";
        }
    } else {
        $_SESSION['error'] = "invalid email";
    }
    header("Location: admin_login.php");
    exit();
}
?>
