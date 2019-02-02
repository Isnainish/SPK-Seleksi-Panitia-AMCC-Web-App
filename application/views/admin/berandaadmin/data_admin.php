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

  <div class="col-lg-12">
    <form role="form">
      <div class="form-inline" >
        <div class="col-lg-5" >
          <!-- profil admin -->
          <div class="client card">
            <div class="card-body text-center">

              <div class="client-avatar">
                <img src="<?=base_url('assets/img/amcc-logo.png')?>" alt="..." class="img-fluid rounded-circle">
                <div class="status bg-green"></div>
              </div>
              <br>
              <div class="client-title">
                <h3><?= $this->session->userdata['auth_session']['nama'];?></h3><a href="#">Admin</a><span>(Ketua Panitia)</span><br>
              </div>
              <div class="client-info" >
                <!-- <div class="row">
                  <div class="col-4">
                  </div>
                  <div class="col-4"><button class="btn btn-sm btn-warning" style="padding:5px;"><strong><a style="color: #000; font-size: 15px;" href="">Ubah Profil</a></strong><br><small></small></button>
                  </div>
                  <div class="col-4">
                  </div>
                </div> -->
                <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- content -->
        <div class="statistics col-lg-6 col-12">
        <?php foreach ($detail_admin->result() as $detadmin) {
        ?>
          <div class="statistic d-flex align-items-center bg-white has-shadow" > 
            <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
              <div class="text" style="font-size: 12px;"><strong><small><?=$detadmin->nama_kegiatan?></small></strong>
                <br>
                <span><small style="color: #0090d2;"><?=$detadmin->tanggal?></small></span>
                <br>
                <button class="btn btn-sm btn-warning" style="padding:5px;"><strong><a style="color: #000; font-size: 15px;" href="<?= site_url('admin/Beranda/ubahAdmin/')?><?= $detadmin->id_kegiatan?>/<?= $this->session->userdata['auth_session']['id_user'];?>">Ubah</a></strong><br><small></small></button>
              </div>
          </div>
          <?php } ?>
          <br>
        </div>
        


      </div>
    </form>

  </div>

  <?php $this->load->view('admin/template/footer'); ?>