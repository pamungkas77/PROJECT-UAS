<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login NgaduYuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        /* ===== BODY & BACKGROUND ===== */
        body.login-page {
            min-height: 100vh;
            background:
                linear-gradient(135deg, rgba(0,0,0,.5), rgba(0,0,0,.5)),
                url("/images/login.jpg") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            padding-bottom: 80px; /* ruang untuk marquee di bawah */
        }

        /* ===== FLOATING PARTICLES ===== */
        body.login-page::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background: radial-gradient(circle, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: rotateBG 80s linear infinite;
            z-index: 0;
        }

        @keyframes rotateBG {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* ===== LOGIN BOX ===== */
        .login-box {
            width: 380px;
            position: relative;
            z-index: 2;
            animation: cardSlide 1s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes cardSlide {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== LOGO ===== */
        .login-logo {
            color: #fff;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.5);
            display: inline-block;
            animation: floatLogo 3s ease-in-out infinite;
        }

        @keyframes floatLogo {
            0%, 100% { transform: translateY(0) scale(1); text-shadow: 0 4px 15px rgba(0,0,0,0.5); }
            50% { transform: translateY(-8px) scale(1.05); text-shadow: 0 8px 25px rgba(0,198,255,0.6); }
        }

        /* ===== CARD BODY ===== */
        .login-card-body {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            color: #fff;
            padding: 35px 30px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card-body:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 70px rgba(0,198,255,0.6);
        }

        .login-box-msg {
            color: #f1f1f1;
            font-size: 15px;
            margin-bottom: 25px;
        }

        /* ===== INPUT ===== */
        .form-control {
            border-radius: 30px;
            padding-left: 45px;
            transition: all 0.3s ease;
            background: rgba(255,255,255,0.1);
            border: 1.5px solid rgba(255,255,255,0.3);
            color: #fff;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.6);
        }

        .form-control:focus {
            border-color: #00c6ff;
            background: rgba(255,255,255,0.15);
            box-shadow: 0 0 20px rgba(0,198,255,0.6);
            color: #fff;
            transform: scale(1.02);
        }

        .input-group-text {
            background: transparent;
            border: none;
            color: #00c6ff;
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            transition: transform 0.3s, color 0.3s;
        }

        .form-control:focus + .input-group-text,
        .form-control:not(:placeholder-shown) + .input-group-text {
            color: #fff;
            transform: translateY(-50%) scale(1.1);
        }

        /* ===== BUTTON ===== */
        .btn-login {
            border-radius: 30px;
            font-weight: 600;
            letter-spacing: 1px;
            background: linear-gradient(90deg, #007BFF, #00c6ff);
            color: #fff;
            border: none;
            overflow: hidden;
            position: relative;
            transition: 0.4s all;
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
            transition: all 0.5s;
        }

        .btn-login:hover::before {
            left: 125%;
        }

        .btn-login:hover {
            transform: scale(1.05) rotate(-1deg);
            box-shadow: 0 10px 30px rgba(0,198,255,0.5);
        }

        /* ===== ALERT ===== */
        .alert {
            border-radius: 12px;
            font-size: 14px;
        }

        /* ===== MARQUEE BOTTOM ===== */
        .login-marquee-box {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0,0,0,0.6);
            padding: 10px 0;
        }

        .login-marquee {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
        }

        .login-marquee span {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 20s linear infinite;
        }

        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-100%); }
        }

    </style>
</head>

<body class="hold-transition login-page">

<div class="login-box text-center">
    <div class="login-logo">
        <b>Ngadu</b>Yuk
    </div>

    <div class="card login-card-body">
        <p class="login-box-msg">public complaint system</p>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="/login" method="post">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn btn-login btn-block">
                LOGIN
            </button>
        </form>
    </div>
</div>

<!-- ===== MARQUEE BOTTOM ===== -->
<div class="login-marquee-box">
    <div class="login-marquee">
        <span>
            Aplikasi Pengaduan Masyarakat • Transparansi • Cepat • Mudah • Laporkan Sekarang • 
            Aplikasi Pengaduan Masyarakat • Transparansi • Cepat • Mudah • Laporkan Sekarang
        </span>
    </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
