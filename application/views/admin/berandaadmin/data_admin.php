<?php $this->load->view('admin/template/header'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="<?=base_url('assets/img/amcc-logo.png')?>" alt="" class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h4">AMCC</h1>
        <p>Seleksi Panitia Kegiatan</p>
      </div>
    </div>  
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
     <li class="active"><a href="<?=site_url('admin/Beranda')?>"> <i class="icon-home"></i>Beranda</a></li>

     <li><a href="<?=site_url('admin/DataPendaftar/Pendaftar')?>"> <i class="icon-user"></i>Data Pendaftar </a></li>

     <li><a href="<?=site_url('admin/Pewawancara')?>"> <i class="icon-user"></i>Data Pewawancara </a></li>

     <li><a href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria')?>"> <i class="icon-interface-windows"></i>Data Kriteria </a>
     </li>

     <li><a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"> <i class="icon-interface-windows"></i>Data Himpunan Kriteria </a>
     </li>

     <li><a href="<?=site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi')?>"> <i class="icon-interface-windows"></i>Data Posisi Kepanitiaan </a>
     </li>

     <li><a href="<?=site_url('admin/DataPerhitungan/Perhitungan')?>"> <i class="icon-padnote"></i>Data Perhitungan </a></li>

     <li><a href="<?=site_url('admin/DataPerhitungan/Rekomendasi')?>"> <i class="icon-padnote"></i> Data Rekomendasi Posisi </a></li>

     <li><a href="<?=site_url('admin/DataHasil/Hasil')?>"> <i class="fa fa-bar-chart"></i>Hasil </a></li>

   </ul>
   <ul class="list-unstyled">
    <li class="nav-item"><a href="<?=site_url('auth/Auth/logout_proses')?>" class="nav-link logout"> <i class="fa fa-sign-out">Logout</i></a></li>
  </ul>
</nav>
<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h3 style="font-size: 18px;" class="h4">Selamat Datang, di halaman admin <span style="color:#007bff;"><strong>SPK</strong> Seleksi Panitia Kegiatan AMCC</span></h3>
    </div>
  </header>
  <br>

  <div class="col-lg-12" style="margin-left: 10px;">
    <div class="col-lg-5">
      <div class="client card">
        <?php foreach ($admin->result() as $row) {
          ?>
          <div class="card-body text-center" style="border-bottom: 30px solid #EEF5F9;">

            <div class="client-avatar">
              <img src="<?=base_url('assets/img/amcc-logo.png')?>" alt="..." class="img-fluid rounded-circle">
              <div class="status bg-green"></div>
            </div>
            <div class="client-title">
              <h3><?= $row->nama?></h3><span>Ketua Panitia
              <br><?=$row->nama_kegiatan?><br><small style="color: #0090d2;"><?= $row->tanggal ?></small></span>
              <a href="#">Admin</a>
            </div>
            <div class="client-info" >
              <div class="row">
                <div class="col-4"><strong>Username</strong><br><?= $row->username?></div>
                <div class="col-4"><strong><a href=""></a></strong><br><small></small></div>
                <div class="col-4"><strong>Password<a href=""></a></strong><br><?= $row->password?></div>
              </div>
              <div class="row">
                  <div class="col-4"><strong><a href=""></a></strong><br><small></small></div>
                  <div class="col-4"><button class="btn btn-sm btn-warning" style="padding: 10px;"><strong><a style="color: #000;" href="<?= site_url('admin/Beranda/ubahAdmin/')?><?=$row->id_detail_user?>">Ubah</a></strong><br><small></small></button></div>
              </div>
                  <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

<?php $this->load->view('admin/template/footer'); ?>