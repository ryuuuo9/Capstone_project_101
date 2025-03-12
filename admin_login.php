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
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
            background: linear-gradient(135deg,rgb(58, 51, 10),rgb(233, 209, 24)); /* 🌈 Gradient Mix */
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('logo.png') no-repeat center center/cover;
            background-blend-mode: overlay;
            background-size: 43%;
            filter: blur(2px);
            opacity: 0.6;
            z-index: -1;
        }

        .container {
            background: rgb(255, 255, 255);
            padding: 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
            border-radius: 15px;
            width: 340px;
            border: none;
            text-align: center; /* Center the text */
        }

        h2 {
            font-family: 'MyCustomFont', sans-serif;
            color: #0047AB;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            display: inline-block;
            border-bottom: 3px solid #0047AB;
            padding-bottom: 5px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 12px;
            border: 2px solid #0047AB;
            border-radius: 8px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            outline: none;
            transition: border 0.3s ease;
        }

        .form-container input:focus {
            border-color: #007BFF;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }

        button {
            background: linear-gradient(135deg, #0047AB, #007BFF);
            color: white;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            width: 100%;
            box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease-in-out;
        }

        button:hover {
            background: linear-gradient(135deg, #007BFF, #0047AB);
            transform: scale(1.05);
        }

        .error-message {
            background-color: #FFCCCC;
            color: #D8000C;
            border: 1px solid #D8000C;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .error-icon {
            font-weight: bold;
            color: #D8000C;
        }
    </style>
</head>
<body>
    <div class="container">
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
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>