<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top rain-topbar">

<style>
/* ================= TOPBAR ================= */
.rain-topbar{
    position:relative;
    background:linear-gradient(135deg,#8B5CF6,#EC4899);
    box-shadow:0 10px 30px rgba(0,0,0,.25);
    border-radius:0 0 18px 18px;
    overflow:hidden;
    animation: dropTop .7s ease;
}
@keyframes dropTop{
    from{transform:translateY(-60px);opacity:0}
    to{transform:translateY(0);opacity:1}
}

/* ================= USER ================= */
.user-name{
    color:#fff;
    font-weight:800;
    letter-spacing:.5px;
    transition:.3s;
}
.user-name:hover{
    text-shadow:0 0 12px rgba(255,255,255,.9);
}

.img-profile{
    transition:.4s;
}
.nav-item:hover .img-profile{
    transform:rotate(8deg) scale(1.1);
    box-shadow:0 0 0 3px rgba(255,255,255,.5);
}

/* ================= DROPDOWN ================= */
.dropdown-menu{
    border-radius:18px;
    overflow:hidden;
    animation: zoomIn .25s ease;
}
@keyframes zoomIn{
    from{transform:scale(.85);opacity:0}
    to{transform:scale(1);opacity:1}
}
.dropdown-item{
    transition:.25s;
    font-weight:600;
}
.dropdown-item:hover{
    background:linear-gradient(135deg,#EC4899,#8B5CF6);
    color:#fff !important;
}
.dropdown-item:hover i{
    color:#fff !important;
}

/* ================= TOGGLE ================= */
#sidebarToggleTop{
    transition:.3s;
}
#sidebarToggleTop:hover{
    transform:rotate(90deg) scale(1.1);
    text-shadow:0 0 12px #fff;
}

/* ================= RAIN EFFECT ================= */
.rain-layer{
    pointer-events:none;
    position:absolute;
    top:0;left:0;right:0;bottom:-40px;
    overflow:hidden;
    z-index:1;
}
.drop{
    position:absolute;
    bottom:100%;
    width:2px;
    height:18px;
    background:linear-gradient(to bottom,
        rgba(255,255,255,0),
        rgba(255,255,255,.9));
    animation: fall linear infinite;
    opacity:.6;
}
@keyframes fall{
    to{ transform:translateY(140px); }
}
</style>

<!-- ===== RAIN LAYER ===== -->
<div class="rain-layer" id="rainLayer"></div>

<!-- Sidebar Toggle (Mobile) -->
<button id="sidebarToggleTop"
        class="btn btn-link d-md-none rounded-circle mr-3 text-white"
        style="z-index:2">
    <i class="fas fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto align-items-center" style="z-index:2">

    <!-- User Info -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle d-flex align-items-center"
           href="#" id="userDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">

            <span class="mr-2 d-none d-lg-inline user-name">
                <?= $_SESSION['user']['username'] ?? 'User'; ?>
            </span>

            <img class="img-profile rounded-circle border border-white"
                 src="/aset/img/default-profile.png"
                 width="38" height="38" alt="Profile">
        </a>

        <!-- Dropdown -->
        <div class="dropdown-menu dropdown-menu-right shadow"
             aria-labelledby="userDropdown">

            <h6 class="dropdown-header text-center text-success">
                👋 Halo, <?= $_SESSION['user']['username'] ?? 'User'; ?>
            </h6>

            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-success"></i>
                Profil Saya
            </a>

            <a class="dropdown-item" href="#">
                <i class="fas fa-cog fa-sm fa-fw mr-2 text-success"></i>
                Pengaturan
            </a>

            <div class="dropdown-divider"></div>

            <a class="dropdown-item text-danger" href="/logout"
               onclick="return confirm('Yakin ingin logout?')">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                Logout
            </a>
        </div>
    </li>

</ul>
</nav>

<!-- ================= RAIN SCRIPT ================= -->
<script>
const rainLayer = document.getElementById('rainLayer');

function createRain(){
    const drop = document.createElement('div');
    drop.classList.add('drop');

    drop.style.left = Math.random()*100 + '%';
    drop.style.animationDuration = (0.8 + Math.random()*0.8) + 's';

    rainLayer.appendChild(drop);

    setTimeout(()=>{ drop.remove(); }, 2000);
}

// intensitas hujan
setInterval(createRain, 120);
</script>
