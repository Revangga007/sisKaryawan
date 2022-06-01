<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-medal"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPK Museum Batik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $title == 'Dashboard' ? 'active' : null; ?>">
        <?php if (session('role') != 'pegawai') : ?>
            <a class="nav-link" href="<?= base_url('/'); ?>">
            <?php else : ?>
                <a class="nav-link" href="<?= base_url('/pegawai/profil'); ?>">
                <?php endif; ?>
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if (session("role") == "tu") : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Kasubag TU
        </div>
    <?php endif; ?>
    <?php if (session("role") == "tu") : ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= $title == 'Pegawai' ? 'active' : null; ?>">
            <a class="nav-link" href="<?= base_url('pegawai'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Pegawai</span></a>
        </li>
    <?php endif; ?>
    <?php if (session("role") == 'tu') : ?>
        <li class="nav-item <?= $title == 'Kriteria' ? 'active' : null; ?>">
            <a class="nav-link" href="<?= base_url('kriteria'); ?>">
                <i class="fas fa-fw fas fa-clipboard-list"></i>
                <span>Kriteria</span></a>
        </li>
    <?php endif; ?>
    <?php if (session("role") == 'tu') : ?>
        <li class="nav-item <?= $title == 'Alternatif' ? 'active' : null; ?>">
            <a class="nav-link" href="<?= base_url('alternatif'); ?>">
                <i class="fas fa-fw fa-cog"></i>
                <span>Alternatif</span></a>
        </li>
    <?php endif; ?>
    <?php if (session("role") == 'tu') : ?>
        <li class="nav-item <?= $title == 'Perhitungan' ? 'active' : null; ?>">
            <a class="nav-link" href="<?= base_url('perhitungan'); ?>">
                <i class="fas fa-fw fa-calculator"></i>
                <span>Perhitungan</span></a>
        </li>
    <?php endif; ?>
    <?php if (session("role") == 'tu') : ?>
        <li class="nav-item <?= $title == 'History' ? 'active' : null; ?>">
            <a class="nav-link" href="<?= base_url('history'); ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>History</span></a>
        </li>
    <?php endif; ?>
    <?php if (session("role") == 'pegawai') : ?>
        <li class="nav-item <?= $title == 'ranking' ? 'active' : null; ?>">
            <a class="nav-link" href="<?= base_url('/pegawai/ranking'); ?>">
                <i class="fas fa-fw fa-star"></i>
                <span>Ranking</span></a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <?php if (session("role") == 'admin') : ?>
        <div class="sidebar-heading">
            Admin
        </div>
    <?php endif; ?>
    <?php if (session("role") == 'admin') : ?>
        <li class="nav-item <?= $title == 'Users' ? 'active' : null; ?>">
            <a class="nav-link" href="<?= base_url('users'); ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span></a>
        </li>
    <?php endif; ?>
    <hr class="sidebar-divider">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>