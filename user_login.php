<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        @font-face {
            font-family: 'MyCustomFont';
            src: url('font/PlayfairDisplay-VariableFont_wght.ttf') format('truetype');
        }

        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-image: url('ps (1).jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(5px);
            background-size: 100% 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background-color: rgba(125, 138, 150, 0.7);
            border-radius: 15px;
            padding: 40px 60px 40px 60px; /* Added padding for better centering */
            width: 380px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            text-align: center;
            position: relative;
        }

        .login-container img {
            width: 100px;
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            border: 4px solid #7D8A96;
            border-radius: 50%;
            background-color: #0B2A51;
        }

        .login-container h1 {
            margin-top: 70px;
            font-size: 18px;
            font-weight: bold;
            color: #FFFFFF;
            font-family: 'MyCustomFont', sans-serif;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
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
            margin-top: 10px; /* Adjusted margin for spacing */
            gap: 5px;
            color: #fff;
            font-size: 14px;
        }

        .login-container button {
            background: linear-gradient(135deg, #0C356A, #0174BE);
            color: #FFFFFF;
            border: none;
            padding: 12px;
            border-radius: 25px;
            cursor: pointer;
            width: 100%;
            box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease-in-out;
            margin-top: 20px; /* Added margin for better spacing */
            width: 80%;
        }

        .login-container button:hover {
            background: linear-gradient(135deg, #FFF0CE, #FFC436);
            transform: scale(1.05);
            color: rgb(2, 2, 2);
        }

        h2 {
            font-family: 'MyCustomFont', sans-serif;
            color: rgb(0, 0, 0);
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 4px solid rgb(246, 246, 246);
            padding-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="itso.jpg" alt="IT Logo">
        <h1>PANGASINAN STATE UNIVERSITY - BAYAMBANG CAMPUS<br>
            THESIS MANAGEMENT SYSTEM WITH TRACERS
        </h1>
        <form action="login_user.php" method="POST">
            <input type="hidden" name="role" value="user">
            <input type="text" name="email" placeholder="Enter Email" required>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <div class="show-password-container">
                <input type="checkbox" id="showPassword"> Show Password
            </div>
            <button type="submit">Log in</button>
        </form>
    </div>

    <script>
        document.getElementById('showPassword').addEventListener('change', function() {
            const passwordInput = document.getElementById('password');
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>
</html>
