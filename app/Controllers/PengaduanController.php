<?php
require_once __DIR__ . '/../Models/Pengaduan.php';

class PengaduanController
{
    private $model;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->model = new Pengaduan();
    }

    /* ===================== INDEX ===================== */
    public function index()
    {
        if ($_SESSION['user']['role'] === 'masyarakat') {
            $pengaduan = $this->model->getByUser($_SESSION['user']['id']);
        } else {
            $pengaduan = $this->model->all();
        }

        require __DIR__ . '/../Views/pengaduan/index.php';
    }

    /* ===================== CREATE ===================== */
    public function create()
    {
        require __DIR__ . '/../Views/pengaduan/create.php';
    }

    /* ===================== STORE ===================== */
    public function store()
    {
        $judul        = $_POST['judul'] ?? '';
        $isi_laporan = $_POST['isi_laporan'] ?? '';

        if ($judul === '' || $isi_laporan === '') {
            header('Location: /pengaduan/create');
            exit;
        }

        /* ===== FOTO ===== */
        $foto = null;
        if (!empty($_FILES['foto']['name'])) {
            $foto = time() . '_' . $_FILES['foto']['name'];
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                __DIR__ . '/../../public/uploads/' . $foto
            );
        }

        /* ===== PDF ===== */
        $pdf = null;
        if (!empty($_FILES['pdf']['name'])) {
            $pdf = time() . '_' . $_FILES['pdf']['name'];
            move_uploaded_file(
                $_FILES['pdf']['tmp_name'],
                __DIR__ . '/../../public/uploads/' . $pdf
            );
        }

        $this->model->create([
            'judul'        => $judul,
            'isi_laporan' => $isi_laporan,
            'foto'         => $foto,
            'file_pdf'    => $pdf,
            'user_id'     => $_SESSION['user']['id']
        ]);

        header('Location: /pengaduan');
        exit;
    }

    /* ===================== EDIT ===================== */
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /pengaduan');
            exit;
        }

        $pengaduan = $this->model->find($id);
        require __DIR__ . '/../Views/pengaduan/edit.php';
    }

    /* ===================== UPDATE ===================== */
    public function update()
    {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            header('Location: /pengaduan');
            exit;
        }

        $foto = $_POST['old_foto'] ?? null;
        $pdf  = $_POST['old_pdf'] ?? null;

        if (!empty($_FILES['foto']['name'])) {
            $foto = time() . '_' . $_FILES['foto']['name'];
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                __DIR__ . '/../../public/uploads/' . $foto
            );
        }

        if (!empty($_FILES['pdf']['name'])) {
            $pdf = time() . '_' . $_FILES['pdf']['name'];
            move_uploaded_file(
                $_FILES['pdf']['tmp_name'],
                __DIR__ . '/../../public/uploads/' . $pdf
            );
        }

        $this->model->update($id, [
            'judul'        => $_POST['judul'],
            'isi_laporan' => $_POST['isi_laporan'],
            'foto'         => $foto,
            'file_pdf'    => $pdf,
            'status'       => $_POST['status'] ?? 'baru'
        ]);

        header('Location: /pengaduan');
        exit;
    }

    /* ===================== DELETE ===================== */
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }

        header('Location: /pengaduan');
        exit;
    }
}