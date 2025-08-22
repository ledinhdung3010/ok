<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Tải CSS từ file riêng (hoặc bạn có thể tích hợp trực tiếp trong HTML) -->
    <style>
        /* Đặt nền và kiểu font */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f6f9;
        }

        /* Container của login */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        /* Tạo box login */
        .login-box {
            width: 400px;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Logo */
        .logo img {
            margin-bottom: 20px;
        }

        /* Tiêu đề */
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Group các trường nhập */
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            font-size: 14px;
            color: #666;
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus {
            border-color: #007bff;
        }

        /* Quên mật khẩu */
        .forgot-password {
            text-align: right;
        }

        .forgot-password a {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* Nút đăng nhập */
        .login-btn {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .login-btn:active {
            background-color: #003f7d;
        }

    </style>
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <div class="logo">
            <img src="{{asset('assets/images/logo.jfif')}}" alt="Admin Logo" width="150px">
        </div>
        <h2>Admin Login</h2>
        <form action="/login" method="POST">
            @csrf
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            @if ($errors->has('login'))
                <div style="color: red; font-size: 14px; margin-bottom: 10px;">
                    {{ $errors->first('login') }}
                </div>
            @endif
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</div>
</body>
</html>
