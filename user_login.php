<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
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
      
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('psu.png') no-repeat center center/cover;
            background-blend-mode: overlay; 
            opacity: 0.5;
            z-index: -1;
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            width: 380px;
            border: 3px solid #0047AB;
        }
        h2 {
            font-family: 'MyCustomFont', sans-serif;
            color: #0047AB;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            
            border-bottom: 4px solid #0047AB;
            padding-bottom: 8px;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-container label,
        .form-container input,
        .form-container button {
            width: 90%;
            margin-bottom: 12px;
        }
        .form-container input {
            padding: 12px;
            border: 2px solid #0047AB;
            border-radius: 8px;
            font-size: 18px;
            text-align: left;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: center;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 24px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            width: 100%;
            box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease-in-out;
        }

        button:hover {
            background-color: #f1f823;
            color: black;
        }

        button:active {
            box-shadow: inset 4px 4px 8px rgba(0, 0, 0, 0.5);
            transform: translateY(2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>PANGASINAN STATE UNIVERSITY - BAYAMBANG CAMPUS THESIS MANAGEMENT SYSTEM WITH TRACERS</h2>
        <?php if(isset($_SESSION['error'])) { echo "<p style='color:red'>".$_SESSION['error']."</p>"; unset($_SESSION['error']); } ?>
        <form action="login_user.php" method="POST" class="form-container">
            <input type="hidden" name="role" value="user">
            <input type="text" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
