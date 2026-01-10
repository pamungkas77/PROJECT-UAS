<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>NgaduYuk | Public Complaint System</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="/aset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- SB Admin 2 -->
    <link href="/aset/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom -->
    <link href="/aset/css/custom.css" rel="stylesheet">
    <link href="/aset/css/custom-theme.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #F0FDF4;
        }
        h1, h2, h3, h4, h5, h6, p,
        a {
            transition: all .3s ease;
        }

        .btn {
            border-radius: 12px;
            font-weight: 600;
            transition: all .3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0,0,0,.18);
        }

        .card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
            transition: all .3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .topbar {
            background: linear-gradient(135deg, #baa8bd, #d300fd) !important;
            box-shadow: 0 4px 20px rgba(0,0,0,.15);
        }

        .topbar .nav-link,
        .topbar .text-gray-600 {
            color: #ffffff !important;
        }

        .sidebar {
            background: linear-gradient(180deg, #9400ea, #d300fd);
        }

        .sidebar .nav-item .nav-link {
            color: rgba(255,255,255,.85);
            border-radius: 10px;
            margin: 4px 10px;
        }

        .sidebar .nav-item .nav-link:hover {
            background-color: rgba(255,255,255,.15);
            color: #ffffff;
        }

        .sidebar .nav-item.active .nav-link {
            background-color: #e14be7;
            color: #ffffff;
            font-weight: 700;
        }

        .sidebar-brand {
            color: #ffffff !important;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .badge-menunggu { background: #FACC15; color: #000; }
        .badge-proses   { background: #38BDF8; }
        .badge-selesai  { background: #22C55E; }
        .badge-ditolak  { background: #EF4444; }
    </style>
</head>

<body id="page-top">

<div id="wrapper">