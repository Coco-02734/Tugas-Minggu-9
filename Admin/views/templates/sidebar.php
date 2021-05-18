<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/admin') ?>">

        <div class="sidebar-brand-text mx-3">Admin Seller</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Fitur
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Kelola Produk</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Produk</h6>
                <a class="collapse-item" href="<?= base_url('admin/admin/inputproduk') ?>">Tambah Produk</a>
                <a class="collapse-item" href="<?= base_url('admin/admin/daftarproduk') ?>l">Daftar Produk</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Penjualan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Statistik</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Kelola Role
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/admin/kelola') ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kelola User</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->