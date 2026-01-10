<ul class="navbar-nav sidebar sidebar-dark accordion sipmas-sidebar" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/pengaduan">
        <div class="sidebar-brand-icon">
            <i class="fas fa-bullhorn"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            NgaduYuk
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] === '/admin/dashboard') ? 'active' : '' ?>">
        <a class="nav-link" href="/admin/dashboard">
            <i class="fas fa-chart-line"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Pengaduan -->
    <li class="nav-item <?= (str_starts_with($_SERVER['REQUEST_URI'], '/pengaduan')) ? 'active' : '' ?>">
        <a class="nav-link" href="/pengaduan">
            <i class="fas fa-file-alt"></i>
            <span>Pengaduan</span>
        </a>
    </li>

    <!-- Tambah Pengaduan -->
    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] === '/pengaduan/create') ? 'active' : '' ?>">
        <a class="nav-link" href="/pengaduan/create">
            <i class="fas fa-plus-circle"></i>
            <span>Tambah Pengaduan</span>
        </a>
    </li>

    <hr class="sidebar-divider mt-3">

    <!-- Logout -->
    <li class="nav-item mt-auto">
        <a class="nav-link text-danger" href="/logout">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>