<?php require_once __DIR__.'/../layouts/header.php'; ?>
<?php require_once __DIR__.'/../layouts/sidebar.php'; ?>
<?php require_once __DIR__.'/../layouts/topbar.php'; ?>

<style>
:root{
    --pink:#EC4899;
    --pink-dark:#BE185D;
    --purple:#8B5CF6;
    --blue:#3B82F6;
    --green:#22C55E;
    --soft:#FFF1F2;
    --dark:#1F2933;
}

/* ===== PAGE ===== */
.page-wrap{
    background:linear-gradient(180deg,#FFF1F2 0%,#ffffff 45%);
    min-height:100vh;
    padding-bottom:40px;
}

/* ===== HERO ===== */
.dashboard-hero{
    background:linear-gradient(135deg,#EC4899,#8B5CF6);
    color:#fff;
    padding:28px 30px;
    border-radius:26px;
    margin-bottom:28px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 20px 40px rgba(236,72,153,.35);
}
.dashboard-hero h1{font-weight:900;margin:0}

/* ===== STATS ===== */
.stats-panel{
    display:grid;
    grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:26px;
}
.stat-card{
    background:#fff;
    border-radius:22px;
    padding:22px;
    cursor:pointer;
    transition:.35s;
    position:relative;
    overflow:hidden;
}
.stat-card:hover{
    transform:translateY(-6px) scale(1.02);
    box-shadow:0 18px 35px rgba(0,0,0,.15);
}
.stat-icon{
    width:56px;height:56px;border-radius:16px;
    display:flex;align-items:center;justify-content:center;
    color:#fff;font-size:22px;margin-bottom:12px;
}
.bg-pink{background:linear-gradient(135deg,#EC4899,#DB2777)}
.bg-purple{background:linear-gradient(135deg,#8B5CF6,#7C3AED)}
.bg-blue{background:linear-gradient(135deg,#3B82F6,#2563EB)}
.bg-green{background:linear-gradient(135deg,#22C55E,#16A34A)}

.stat-title{font-size:13px;color:#6B7280;font-weight:700}
.stat-value{font-size:34px;font-weight:900}

/* ===== FILTER ===== */
.filter-bar{
    background:#fff;
    border-radius:22px;
    padding:16px 20px;
    display:flex;
    gap:16px;
    align-items:center;
    justify-content:space-between;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    margin-bottom:22px;
}

/* ===== TABLE ===== */
.table-wrap{
    background:#fff;
    border-radius:28px;
    padding:20px;
    box-shadow:0 15px 35px rgba(0,0,0,.12);
}
.table{
    border-collapse:separate;
    border-spacing:0 10px;
}
.table thead th{
    background:#FFF1F2;
    border:none;
    color:#BE185D;
    font-weight:800;
}
.table tbody tr{
    background:#fff;
    transition:.25s;
}
.table tbody tr:hover{
    background:#FDF2F8;
    transform:scale(1.01);
}
.table td{border:none;vertical-align:middle}

/* ===== BADGE ===== */
.badge{
    padding:7px 18px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

/* ===== BTN ===== */
.btn-icon{
    border-radius:14px;
    width:42px;height:42px;
    display:flex;align-items:center;justify-content:center;
}

/* ===== EFFECT ===== */
.pulse:hover{animation:pulse .6s}
@keyframes pulse{
    0%{transform:scale(1)}
    50%{transform:scale(1.08)}
    100%{transform:scale(1)}
}
</style>

<div id="content-wrapper" class="d-flex flex-column page-wrap">
<div id="content">
<div class="container-fluid">

<!-- ===== HERO ===== -->
<div class="dashboard-hero">
    <div>
        <h1><i class="fas fa-heart"></i> NgaduYuk</h1>
        <small>Smart & interactive complaint dashboard</small>
    </div>
    <strong><?= date('l, d M Y') ?></strong>
</div>

<!-- ===== STATS ===== -->
<div class="stats-panel">

<div class="stat-card pulse" onclick="goTo('/pengaduan')">
    <div class="stat-icon bg-purple"><i class="fas fa-layer-group"></i></div>
    <div class="stat-title">Total Pengaduan</div>
    <div class="stat-value" id="countTotal"><?= $totalPengaduan ?? 0 ?></div>
</div>

<div class="stat-card pulse" onclick="quickFilter('baru')">
    <div class="stat-icon bg-pink"><i class="fas fa-bell"></i></div>
    <div class="stat-title">Pengaduan Baru</div>
    <div class="stat-value"><?= $pengaduanBaru ?? 0 ?></div>
</div>

<div class="stat-card pulse" onclick="quickFilter('diproses')">
    <div class="stat-icon bg-blue"><i class="fas fa-sync"></i></div>
    <div class="stat-title">Diproses</div>
    <div class="stat-value"><?= $pengaduanDiproses ?? 0 ?></div>
</div>

<div class="stat-card pulse" onclick="quickFilter('selesai')">
    <div class="stat-icon bg-green"><i class="fas fa-check-double"></i></div>
    <div class="stat-title">Selesai</div>
    <div class="stat-value"><?= $pengaduanSelesai ?? 0 ?></div>
</div>

</div>

<!-- ===== FILTER ===== -->
<div class="filter-bar">
    <select id="filterStatus" class="form-control w-auto">
        <option value="">Semua Status</option>
        <option value="baru">Baru</option>
        <option value="diproses">Diproses</option>
        <option value="selesai">Selesai</option>
    </select>

    <input type="text" id="searchPengaduan" class="form-control w-50" placeholder="Cari judul / pelapor...">
</div>

<!-- ===== TABLE ===== -->
<div class="table-wrap">
<div class="table-responsive">

<table class="table" id="dashboardTable">
<thead>
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Pelapor</th>
    <th>Status</th>
    <th>Foto</th>
    <th>PDF</th>
    <?php if($_SESSION['user']['role'] === 'admin'): ?>
    <th>Aksi</th>
    <?php endif; ?>
</tr>
</thead>

<tbody>
<?php foreach($pengaduan as $i => $p): ?>
<tr data-status="<?= $p['status'] ?>">
<td><?= $i+1 ?></td>
<td><?= htmlspecialchars($p['judul']) ?></td>
<td><?= htmlspecialchars($p['nama'] ?? 'User') ?></td>
<td>
<?php
$cls = [
 'baru'=>'badge badge-warning',
 'diproses'=>'badge badge-info',
 'selesai'=>'badge badge-success'
];
?>
<span class="<?= $cls[$p['status']] ?>"><?= ucfirst($p['status']) ?></span>
</td>

<td>
<?php if(!empty($p['foto'])): ?>
<img src="/uploads/<?= $p['foto'] ?>" width="60">
<?php endif; ?>
</td>

<td>
<?php if(!empty($p['file_pdf'])): ?>
<a href="/uploads/<?= $p['file_pdf'] ?>" target="_blank">
<i class="fas fa-file-pdf text-danger fa-2x"></i>
</a>
<?php endif; ?>
</td>

<?php if($_SESSION['user']['role'] === 'admin'): ?>
<td>
<form action="/pengaduan/update" method="POST" class="d-flex">
<input type="hidden" name="id" value="<?= $p['id'] ?>">
<select name="status" class="form-control form-control-sm mr-2">
<option value="baru" <?= $p['status']=='baru'?'selected':'' ?>>Baru</option>
<option value="diproses" <?= $p['status']=='diproses'?'selected':'' ?>>Diproses</option>
<option value="selesai" <?= $p['status']=='selesai'?'selected':'' ?>>Selesai</option>
</select>
<button class="btn btn-primary btn-icon">
<i class="fas fa-sync-alt"></i>
</button>
</form>
</td>
<?php endif; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>
</div>

</div>
</div>
</div>

<?php require_once __DIR__.'/../layouts/footer.php'; ?>

<!-- ================= INTERACTIVE SCRIPT ================= -->
<script>
function goTo(url){
    window.location.href = url;
}

/* FILTER DARI CARD */
function quickFilter(status){
    document.getElementById('filterStatus').value = status;
    applyFilter();
}

/* LIVE FILTER */
document.getElementById('filterStatus').addEventListener('change', applyFilter);
document.getElementById('searchPengaduan').addEventListener('keyup', applyFilter);

function applyFilter(){
    let status = document.getElementById('filterStatus').value.toLowerCase();
    let search = document.getElementById('searchPengaduan').value.toLowerCase();
    let rows = document.querySelectorAll('#dashboardTable tbody tr');

    rows.forEach(r=>{
        let rowStatus = r.dataset.status.toLowerCase();
        let text = r.innerText.toLowerCase();

        let matchStatus = status === '' || rowStatus === status;
        let matchSearch = text.includes(search);

        r.style.display = (matchStatus && matchSearch) ? '' : 'none';
    });
}
</script>
