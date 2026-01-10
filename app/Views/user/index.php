<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            padding: 20px;
        }
        h2 {
            margin-bottom: 15px;
        }
        a.btn {
            display: inline-block;
            padding: 8px 14px;
            margin-bottom: 15px;
            background: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background: #e9ecef;
        }
    </style>
</head>
<body>

<h2>Daftar User</h2>

<a href="/dashboard" class="btn">⬅ Kembali ke Dashboard</a>

<table>
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Role</th>
    </tr>

    <?php if (!empty($users)): ?>
        <?php $no = 1; foreach ($users as $u): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($u['username']) ?></td>
                <td><?= htmlspecialchars($u['role']) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3" align="center">Data user kosong</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>