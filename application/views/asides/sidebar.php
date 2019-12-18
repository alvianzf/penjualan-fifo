
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
          <i class="fas fa-fw fa-hammer"></i>
          <span>Produksi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Produksi Bata</h6>
            <a class="collapse-item <?= nav('new', $this->uri->segments) ?> <?= nav('edit', $this->uri->segments) ?>" href="<?= base_url('production/new') ?>">Produksi</a>
            <a class="collapse-item <?= nav('inventaris', $this->uri->segments) ?>" href="<?= base_url('production/inventaris') ?>">Inventaris</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?= nav('purchasing', $this->uri->segments) ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#purchasing" aria-expanded="true" aria-controls="purchasing">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Pembelian</span>
        </a>
        <div id="purchasing" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pembelian Bahan Baku</h6>
            <a class="collapse-item <?= nav('new-purchase', $this->uri->segments) ?> <?= nav('edit-purchase', $this->uri->segments) ?>" href="<?= base_url('purchasing/new-purchase') ?>">Pembelian Baru</a>
            <a class="collapse-item <?= nav('stock', $this->uri->segments) ?>" href="<?= base_url('purchasing/stock') ?>">Stok</a>
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
      <li class="nav-item <?= nav('sales', $this->uri->segments) ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#penjualan" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-hand-holding-usd"></i>
          <span>Penjualan</span>
        </a>
        <div id="penjualan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item  <?= nav('new-sales', $this->uri->segments) ?>"  href="<?= base_url('sales/new-sales') ?>">Penjualan Baru</a>
            <a class="collapse-item <?= nav('transaksi', $this->uri->segments) ?>" href="<?= base_url('sales/transaksi') ?>">Daftar Penjualan</a>
            <a class="collapse-item <?= nav('receipts', $this->uri->segments) ?>" href="<?= base_url('sales/receipts') ?>">Daftar Transaksi</a>
          </div>
        </div>
      </li>

      <?php if ($this->session->userdata['user_detail']->role == 'admin' ) { ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Administrasi Sistem
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?= nav('admin', $this->uri->segments) ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user"></i>
          <span>Admin</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item  <?= nav('production-settings', $this->uri->segments) ?>" href="<?= base_url ('admin/production-settings') ?>">Atur Detil Produksi</a>
            <a class="collapse-item  <?= nav('register', $this->uri->segments) ?>" href="<?= base_url ('admin/register') ?>">Pengguna Baru</a>
            <a class="collapse-item  <?= nav('user-list', $this->uri->segments) ?>" href="<?= base_url ('admin/user-list') ?>">Daftar Pengguna</a>
            <a class="collapse-item  <?= nav('reports', $this->uri->segments) ?>" href="<?= base_url ('admin/reports') ?>">Laporan</a>
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