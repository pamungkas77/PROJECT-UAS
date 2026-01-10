<?php
require_once __DIR__ . '/../Models/Pengaduan.php';

class DashboardController
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $model = new Pengaduan();
        $pengaduan = $model->all();

        $totalPengaduan     = count($pengaduan);
        $pengaduanBaru      = 0;
        $pengaduanDiproses  = 0;
        $pengaduanSelesai   = 0;

        foreach ($pengaduan as $p) {
            if ($p['status'] === 'baru') {
                $pengaduanBaru++;
            } elseif ($p['status'] === 'diproses') {
                $pengaduanDiproses++;
            } elseif ($p['status'] === 'selesai') {
                $pengaduanSelesai++;
            }
        }

        // Ambil 5 pengaduan terbaru
        $latestPengaduan = array_slice(array_reverse($pengaduan), 0, 5);

        require __DIR__ . '/../Views/dashboard/index.php';
    }
}