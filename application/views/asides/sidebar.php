
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistem Penjualan<sup>1.0</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?= nav('dashboard', $this->uri->segments) ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Produksi
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?= nav('production', $this->uri->segments) ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-industry"></i>
          <span>Produksi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Produksi Bata</h6>
            <a class="collapse-item <?= nav('new', $this->uri->segments) ?>"" href="<?= base_url('production/new') ?>">Produksi</a>
            <a class="collapse-item <?= nav('inventaris', $this->uri->segments) ?>"" href="<?= base_url('production/inventaris') ?>">Inventaris</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaksi
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#penjualan" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-hand-holding-usd"></i>
          <span>Penjualan</span>
        </a>
        <div id="penjualan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="">Penjualan Baru</a>
          </div>
        </div>
      </li>

      <?php if ($this->session->userdata['user_detail']->role == 'admin' ) { ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Managemen Pengguna
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user"></i>
          <span>Manajemen Pengguna</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="">Pengguna Baru</a>
            <a class="collapse-item" href="">Daftar Pengguna</a>
          </div>
        </div>
      </li>

      <?php } ?>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->