<!-- Page Wrapper -->
<div id="wrapper">
  <?php if ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'Admin'){ ?>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard'); ?> ">
        <div class="sidebar-brand-icon">
          <i class="fas fa-store-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-1 text-monospace">Sanggar Teknik Persada</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Menu
        </div>
        <!-- Nav Data Master -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Master</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Sub Menu :</h6>
              <a class="collapse-item" href="<?php  echo base_url('toko/stok_barang');?>">Data Barang</a>
              <a class="collapse-item" href="<?php  echo base_url('toko/jenis_barang_c');?>">Data Jenis Barang</a>
              <a class="collapse-item" href="<?php echo base_url('toko/supplier_c') ?>">Data Supplier</a>
              <a class="collapse-item" href="<?php echo base_url('admin/data_admin') ?>">Data User</a>
            </div>
          </div>
        </li>




        <!-- Nav Penjualan-->
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?php echo base_url('toko/penjualan_c') ?>">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Penjualan</span>
          </a>
        </li>

        <!-- Nav Laporan -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
          </a>
          <div id="laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Sub Menu :</h6>
              <a class="collapse-item" href="<?php  echo base_url('laporan/cetak_laporan_penjualan');?>">Laporan Penjualan</a>
              <a class="collapse-item" href="<?php  echo base_url('laporan/cetak_laporan_stok_barang');?>">Laporan Data Barang</a>
            </div>
          </div>
        </li>

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Keluar
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('login/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
          </li>


          <?php //KHUSUS PEMILIK  ?>
        <?php }else{ ?>
         <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard'); ?> ">
            <div class="sidebar-brand-icon">
              <i class="fas fa-store-alt"></i>
            </div>
            <div class="sidebar-brand-text mx-1 text-monospace">Sanggar Teknik Persada</div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
              Menu
            </div>

            <!-- Nav Laporan -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <span>Laporan</span>
              </a>
              <div id="laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Sub Menu :</h6>
                  <a class="collapse-item" href="<?php  echo base_url('laporan/cetak_laporan_penjualan');?>">Laporan Penjualan</a>
                  <a class="collapse-item" href="<?php  echo base_url('laporan/cetak_laporan_stok_barang');?>">Laporan Data Barang</a>
                </div>
              </div>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
              Keluar
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('login/logout') ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
              </li>
            </ul>

          <?php } ?>
          <!-- Divider -->



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-success topbar mb-4 static-top shadow">
              <marquee style="color : white;">~ Selamat datang di sistem informasi pencatatan CV.Sanggar Teknik Persada.
              Jl. Purbaya No.121, Warak Kidul, Sumberadi, Kec. Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta ~</marquee>
            </nav>
