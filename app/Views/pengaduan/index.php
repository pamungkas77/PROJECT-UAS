<?php require_once __DIR__.'/../layouts/header.php'; ?>
<?php require_once __DIR__.'/../layouts/sidebar.php'; ?>

<style>
:root{
    --pink:#EC4899;
    --pink-dark:#BE185D;
    --soft:#FFF1F2;
}

/* ===== CARD ===== */
.pengaduan-card{
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.12);
}
.pengaduan-header{
    background:linear-gradient(135deg,#EC4899,#8B5CF6);
    color:#fff;
    padding:18px 24px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.pengaduan-header h6{margin:0;font-weight:800}

/* ===== TOOLBAR ===== */
.toolbar{
    background:#fff;
    padding:14px 18px;
    display:flex;
    gap:14px;
    align-items:center;
    justify-content:space-between;
    border-bottom:1px solid #f1f1f1;
}

/* ===== TABLE ===== */
.table-wrap{padding:20px;background:#fff}
.table{
    border-collapse:separate;
    border-spacing:0 10px;
}
.table thead th{
    background:#FFF1F2;
    color:#BE185D;
    border:none;
    font-weight:800;
}
.table tbody tr{
    background:#fff;
    transition:.25s;
    cursor:pointer;
}
.table tbody tr:hover{
    background:#FDF2F8;
    transform:scale(1.01);
}
.table td{border:none;vertical-align:middle}

/* ===== BADGE ===== */
.badge{
    padding:7px 16px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

/* ===== IMAGE ===== */
.img-thumb{
    width:60px;
    border-radius:14px;
    transition:.3s;
}
.img-thumb:hover{
    transform:scale(1.3) rotate(2deg);
}

/* ===== PREVIEW ===== */
.preview-box{
    display:none;
    position:absolute;
    background:#fff;
    padding:14px 16px;
    width:260px;
    border-radius:14px;
    box-shadow:0 15px 30px rgba(0,0,0,.15);
    z-index:999;
    font-size:13px;
}

/* ===== ACTION BUTTON ===== */
.action-btn{
    margin:0 3px;
    padding:5px 10px;
    font-size:13px;
}
</style>

<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<div class="container-fluid mt-4">

<div class="card pengaduan-card mb-4">

<!-- ===== HEADER ===== -->
<div class="pengaduan-header">
    <h6><i class="fas fa-list"></i> Daftar Pengaduan</h6>
    <?php if($_SESSION['user']['role'] !== 'admin'): ?>
    <a href="/pengaduan/create" class="btn btn-light btn-sm">
        <i class="fas fa-plus"></i> Tambah
    </a>
    <?php endif; ?>
</div>

<!-- ===== TOOLBAR ===== -->
<div class="toolbar">
    <input type="text" id="searchInput" class="form-control w-50"
           placeholder="Cari judul / isi laporan...">

    <select id="statusFilter" class="form-control w-auto">
        <option value="">Semua Status</option>
        <option value="0">Baru</option>
        <option value="proses">Diproses</option>
        <option value="selesai">Selesai</option>
    </select>
</div>

<!-- ===== TABLE ===== -->
<div class="table-wrap">
<div class="table-responsive">

<table class="table" id="pengaduanTable">
<thead>
<tr class="text-center">
    <th>Judul</th>
    <th>Isi</th>
    <th>Status</th>
    <th>Foto</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php foreach($pengaduan as $p): ?>
<tr data-status="<?= $p['status'] ?>">
<td><?= htmlspecialchars($p['judul']) ?></td>

<td class="preview-trigger" 
    data-full="<?= htmlspecialchars($p['isi_laporan']) ?>">
    <?= htmlspecialchars(substr($p['isi_laporan'],0,50)) ?>...
</td>

<td class="text-center">
<?php if ($p['status'] == 0): ?>
    <span class="badge badge-warning"><i class="fas fa-clock"></i> Baru</span>
<?php elseif ($p['status'] == 'proses'): ?>
    <span class="badge badge-info"><i class="fas fa-spinner"></i> Diproses</span>
<?php elseif ($p['status'] == 'selesai'): ?>
    <span class="badge badge-success"><i class="fas fa-check-circle"></i> Selesai</span>
<?php endif; ?>
</td>

<td class="text-center">
<?php if($p['foto']): ?>
    <img src="/uploads/<?= $p['foto'] ?>" class="img-thumb">
<?php else: ?>
    -
<?php endif; ?>
</td>

<td class="text-center">
<?php if($_SESSION['user']['role'] === 'admin'): ?>
    <!-- Admin hanya bisa update status -->
    <form action="/pengaduan/update" method="POST" class="d-flex justify-content-center">
        <input type="hidden" name="id" value="<?= $p['id'] ?>">
        <select name="status" class="form-control form-control-sm mr-2">
            <option value="0" <?= $p['status']==0?'selected':'' ?>>Baru</option>
            <option value="proses" <?= $p['status']=='proses'?'selected':'' ?>>Diproses</option>
            <option value="selesai" <?= $p['status']=='selesai'?'selected':'' ?>>Selesai</option>
        </select>
        <button class="btn btn-primary btn-sm action-btn">
            <i class="fas fa-sync-alt"></i>
        </button>
    </form>
<?php else: ?>
    <!-- Masyarakat bisa edit & hapus sendiri -->
    <div class="d-flex justify-content-center">
        <a href="/pengaduan/edit?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm action-btn">
            <i class="fas fa-edit"></i>
        </a>
        <form action="/pengaduan/delete" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $p['id'] ?>">
            <button class="btn btn-danger btn-sm action-btn" onclick="return confirm('Yakin hapus pengaduan ini?');">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>
<?php endif; ?>
</td>

</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>
</div>

</div>

</div>
</div>
</div>

<?php require_once __DIR__.'/../layouts/footer.php'; ?>

<!-- ================= INTERACTIVE SCRIPT ================= -->
<script>
/* ===== LIVE SEARCH + FILTER ===== */
const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');
const rows = document.querySelectorAll('#pengaduanTable tbody tr');

function applyFilter(){
    let search = searchInput.value.toLowerCase();
    let status = statusFilter.value;

    rows.forEach(r=>{
        let text = r.innerText.toLowerCase();
        let rowStatus = r.dataset.status;

        let matchText = text.includes(search);
        let matchStatus = status === '' || rowStatus == status;

        r.style.display = (matchText && matchStatus) ? '' : 'none';
    });
}

searchInput.addEventListener('keyup', applyFilter);
statusFilter.addEventListener('change', applyFilter);

/* ===== HOVER PREVIEW ISI ===== */
const previewBox = document.createElement('div');
previewBox.className = 'preview-box';
document.body.appendChild(previewBox);

document.querySelectorAll('.preview-trigger').forEach(el=>{
    el.addEventListener('mouseenter', e=>{
        previewBox.innerText = el.dataset.full;
        previewBox.style.display = 'block';
    });
    el.addEventListener('mousemove', e=>{
        previewBox.style.left = e.pageX + 15 + 'px';
        previewBox.style.top  = e.pageY + 15 + 'px';
    });
    el.addEventListener('mouseleave', ()=>{
        previewBox.style.display = 'none';
    });
});
</script>
