<?php
require_once __DIR__ . '/../Core/Database.php';

class Pengaduan
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->pdo;
    }

    /* ================= ALL ================= */
    public function all()
    {
        $sql = "SELECT * FROM pengaduan
                ORDER BY created_at DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* ================= BY USER ================= */
    public function getByUser($userId)
    {
        $sql = "SELECT * FROM pengaduan
                WHERE user_id = ?
                ORDER BY created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* ================= CREATE ================= */
    public function create($data)
    {
        $sql = "INSERT INTO pengaduan
                (judul, isi_laporan, foto, file_pdf, status, user_id, tgl_pengaduan)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['judul'],
            $data['isi_laporan'],
            $data['foto'],
            $data['file_pdf'],
            'baru',
            $data['user_id'],
            date('Y-m-d')
        ]);
    }

    /* ================= FIND ================= */
    public function find($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM pengaduan WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* ================= UPDATE ================= */
    public function update($id, $data)
    {
        $sql = "UPDATE pengaduan
                SET judul = ?, isi_laporan = ?, foto = ?, file_pdf = ?, status = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['judul'],
            $data['isi_laporan'],
            $data['foto'],
            $data['file_pdf'],
            $data['status'],
            $id
        ]);
    }

    /* ================= DELETE ================= */
    public function delete($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM pengaduan WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }
}