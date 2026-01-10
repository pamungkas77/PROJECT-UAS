<?php require_once __DIR__.'/../layouts/header.php'; ?>
<?php require_once __DIR__.'/../layouts/sidebar.php'; ?>

<div id="content-wrapper" class="d-flex flex-column bg-light">
<div id="content">

<?php require_once __DIR__.'/../layouts/topbar.php'; ?>

<div class="container-fluid mt-4">

    <!-- ================= TITLE ================= -->
    <div class="mb-4">
        <h1 class="h4 font-weight-bold text-gray-800">
            <i class="fas fa-plus-circle text-success"></i> Buat Pengaduan Baru
        </h1>
        <small class="text-muted">
            Sampaikan laporan Anda dengan jelas dan lengkap
        </small>
    </div>

    <!-- ================= FORM CARD ================= -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="/pengaduan/store" method="POST" enctype="multipart/form-data">

                <!-- Judul -->
                <div class="form-group">
                    <label class="font-weight-bold">
                        <i class="fas fa-heading text-primary"></i> Judul Pengaduan
                    </label>
                    <input type="text"
                           name="judul"
                           class="form-control form-control-lg"
                           placeholder="Contoh: Jalan rusak di depan sekolah"
                           required>
                </div>

                <!-- Isi -->
                <div class="form-group">
                    <label class="font-weight-bold">
                        <i class="fas fa-align-left text-primary"></i> Isi Laporan
                    </label>
                    <textarea name="isi_laporan"
                              rows="6"
                              class="form-control"
                              placeholder="Jelaskan detail kejadian, lokasi, dan waktu..."
                              required></textarea>
                </div>

                <!-- Upload Foto -->
                <div class="form-group">
                    <label class="font-weight-bold">
                        <i class="fas fa-image text-primary"></i> Foto Pendukung (Opsional)
                    </label>
                    <input type="file"
                           name="foto"
                           class="form-control-file"
                           accept="image/*">
                    <small class="text-muted">
                        Format gambar: JPG, PNG
                    </small>
                </div>

                <!-- Upload PDF -->
                <div class="form-group">
                    <label class="font-weight-bold">
                        <i class="fas fa-file-pdf text-danger"></i> Dokumen PDF (Opsional)
                    </label>
                    <input type="file"
                           name="pdf"
                           class="form-control-file"
                           accept="application/pdf">
                    <small class="text-muted">
                        Unggah dokumen pendukung (maks. 5MB)
                    </small>
                </div>

                <!-- Tombol -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fas fa-paper-plane"></i> Kirim Pengaduan
                    </button>

                    <a href="/pengaduan" class="btn btn-secondary ml-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

</div>
</div>

<?php require_once __DIR__.'/../layouts/footer.php'; ?>