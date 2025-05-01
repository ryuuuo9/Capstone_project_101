<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
        @font-face {
            font-family: 'MyCustomFont';
            src: url('font/PlayfairDisplay-VariableFont_wght.ttf') format('truetype');
        }
        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-image: url('admin.png');
            background-position: center;
            background-repeat: no-repeat;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            background-size: cover;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: rgba(125, 138, 150, 0.7);
            border-radius: 15px;
            padding: 50px 60px 30px 40px;
            width: 380px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .container img {
            width: 100px;
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            border: 4px solid #7D8A96;
            border-radius: 50%;
            background-color: #0B2A51;
        }
        h2 {
            font-family: 'MyCustomFont', sans-serif;
            color:rgb(255, 255, 255);
            font-size: 30px;
            border-bottom: 3px solid #FFFFFF;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }
        .form-container input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 10px;
            outline: none;
            background-color: #FFFFFF;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .show-password-container {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
            justify-content: start;
        }
        .show-password-container input[type="checkbox"] {
            width: 16px;
            height: 16px;
        }
        button {
            background: linear-gradient(135deg, #0C356A, #0174BE);
            color: #FFFFFF;
            border: none;
            padding: 12px;
            border-radius: 25px;
            cursor: pointer;
            width: 100%;
            box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease-in-out;
            width: 80%;
        }
        button:hover {
            background: linear-gradient(135deg, #FFF0CE, #FFC436);
            transform: scale(1.05);
            color: rgb(2, 2, 2);
        }
    </style>
</head>
<body>
    <div class="container">
    <img src="itso.jpg" alt="IT Logo">
        <h2>Admin Login</h2>

        <?php 
        if(isset($_SESSION['error'])) { 
            echo "<div class='error-message'>
                    <span class='error-icon'>⚠️</span>
                    ".$_SESSION['error'].
                  "</div>"; 
            unset($_SESSION['error']); 
        } 
        ?>

        <form action="login_admin.php" method="POST" class="form-container">
            <input type="hidden" name="role" value="admin">
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <div class="show-password-container">
                <input type="checkbox" id="show-password" onclick="togglePassword()">
                <label for="show-password">Show Password</label>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const checkbox = document.getElementById('show-password');
            passwordInput.type = checkbox.checked ? 'text' : 'password';
        }
    </script>
</body>
</html>