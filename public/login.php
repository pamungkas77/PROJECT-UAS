<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | NgaduYuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Background */
        body {
            margin: 0;
            min-height: 100vh;
            background: url('/assets/img/bg-login.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
            overflow: hidden;
        }

        /* Overlay gelap dengan efek animasi */
        .overlay {
            min-height: 100vh;
            background: rgba(0,0,0,0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        /* Floating particles */
        .overlay::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background: radial-gradient(circle, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: rotateBG 60s linear infinite;
            z-index: 1;
        }

        @keyframes rotateBG {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Login Card */
        .login-card {
            background: rgba(255,255,255,0.97);
            padding: 45px 30px;
            width: 100%;
            max-width: 420px;
            border-radius: 18px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            position: relative;
            z-index: 2;
            animation: fadeSlide 1s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes fadeSlide {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card h4 {
            font-weight: 800;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
            letter-spacing: 1px;
            position: relative;
        }

        .login-card h4::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #007BFF, #00c6ff);
            margin: 10px auto 0;
            border-radius: 2px;
        }

        /* Floating label efek */
        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group label {
            position: absolute;
            top: 12px;
            left: 20px;
            color: #aaa;
            font-weight: 500;
            pointer-events: none;
            transition: 0.3s ease all;
        }

        .form-control {
            border-radius: 30px;
            padding: 12px 20px;
            border: 1.5px solid #ddd;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #007BFF;
            box-shadow: 0 0 10px rgba(0,123,255,0.4);
        }

        .form-control:focus + label,
        .form-control:not(:placeholder-shown) + label {
            top: -10px;
            left: 15px;
            font-size: 12px;
            color: #007BFF;
            background: white;
            padding: 0 5px;
        }

        /* Button animasi */
        .btn-login {
            border-radius: 30px;
            font-weight: 600;
            background: linear-gradient(90deg, #007BFF, #00c6ff);
            color: #fff;
            border: none;
            transition: 0.5s all;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -75%;
            width: 50%;
            height: 100%;
            background: rgba(255,255,255,0.3);
            transform: skewX(-25deg);
            transition: 0.5s all;
        }

        .btn-login:hover::before {
            left: 125%;
        }

        .btn-login:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0,123,255,0.5);
        }

    </style>
</head>
<body>

<div class="overlay">
    <div class="login-card">
        <h4>Login NgaduYuk</h4>

        <form action="/login/proses" method="post">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder=" " required>
                <label>Username</label>
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder=" " required>
                <label>Password</label>
            </div>

            <button type="submit" class="btn btn-login btn-block">
                Masuk
            </button>
        </form>
    </div>
</div>

</body>
</html>
