<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Tanggapin kahit anong format ng email
    if (!str_contains($email, '@')) {
        $email_like = "%" . $email . "%";  
    } else {
        $email_like = $email; 
    }
    // Check user sa database (Student only)
    $stmt = $conn->prepare("
        SELECT user_id, full_name, password, role 
        FROM users 
        WHERE (email = ? OR email LIKE ?) 
        AND role = 'student'
    ");
    $like_email = "%" . $email . "%";
    $stmt->bind_param("ss", $email, $like_email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Check kung tama ang password
        if ($password === $user['password']) { // Gamitin ang hashed password kung encrypted
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];

            // Redirect to student dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "incorrect password!";
        }
    } else {
        $_SESSION['error'] = "invalid email";
    }

    header("Location: user_login.php");
    exit();
}
?>
