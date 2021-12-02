<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-medal"></i>
        </div>
        <div class="sidebar-brand-text mx-3">sisKaryawan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= $title == 'Pegawai' ? 'active' : null; ?>">
        <a class="nav-link" href="<?= base_url('pegawai'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Pegawai</span></a>
    </li>

    <li class="nav-item <?= $title == 'Kriteria' ? 'active' : null; ?>">
        <a class="nav-link" href="<?= base_url('kriteria'); ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kriteria</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
        Perhitungan
    </div>

    <li class="nav-item <?= $title == 'Alternatif' ? 'active' : null; ?>">
        <a class="nav-link" href="<?= base_url('alternatif'); ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Alternatif</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>