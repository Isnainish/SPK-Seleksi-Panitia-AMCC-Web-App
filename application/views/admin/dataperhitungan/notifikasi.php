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
     <li><a href="<?=site_url('admin/Beranda')?>"> <i class="icon-home"></i>Beranda</a></li>

      <li><a href="<?=site_url('admin/DataPendaftar/Pendaftar')?>"> <i class="icon-user"></i>Data Pendaftar </a></li>

      <li><a href="<?=site_url('admin/Pewawancara')?>"> <i class="icon-user"></i>Data Pewawancara </a></li>

      <li><a href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria')?>"> <i class="icon-interface-windows"></i>Data Kriteria </a></li>

      <li><a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"> <i class="icon-interface-windows"></i>Data Himpunan Kriteria </a>
      </li>

      <li><a href="<?=site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi')?>"> <i class="icon-interface-windows"></i>Data Posisi Kepanitiaan </a>
      </li>

      <li><a href="<?=site_url('admin/DataPerhitungan/Perhitungan')?>"> <i class="icon-padnote"></i>Data Perhitungan </a></li>

      <li class="active"><a href="<?=site_url('admin/DataPerhitungan/Rekomendasi')?>"> <i class="icon-padnote"></i> Data Rekomendasi Posisi </a></li>
      
      <li><a href="<?=site_url('admin/DataHasil/Hasil')?>"> <i class="fa fa-bar-chart"></i>Hasil </a></li>

    </ul>
    <ul class="list-unstyled">
      <li class="nav-item"><a href="<?=site_url('auth/Auth')?>" class="nav-link logout"> <i class="fa fa-sign-out">Logout</i></a></li>
    </ul>
  </nav>
  <div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
      <div class="container-fluid">
        <h2 class="no-margin-bottom">Langkah Perhitungan Metode SAW</h2>
      </div>
    </header>
    <br>
    <!-- Data Penialian-->
    <div class="container-fluid">
      <div class="nilai" >
        <div class="col-lg-12">
          <div class="card">
           
            <div class="col-lg-12">
              <div class="card-header d-flex align-items-center">
                <?php foreach ($nama_pendaftar as $val) {
                  
                ?>
                <h5>Pendaftar tunggal, PERHITUNGAN TIDAK DAPAT DILAKUKAN. <br><br>
                Catatan : <strong style="color: red;"><?= $val['nama_pendaftar'] ?></strong> <?php } ?> 
                akan direkomendasikan dalam posisi kepanitiaan ini </h5>
                

                
              </div>
              <br>

              <div class="button align-items-center">
                <a href="<?=site_url('admin/DataPerhitungan/Rekomendasi/simpan_data_tunggal/')?><?= $idsie?>"><input type="submit" name="simpan" value="Simpan Hasil" class="btn btn-primary"></a>
               </div>
               <br>
              </div>
        
          
          
        </div>          
      </div><!-- nilai -->
    </div>

    <?php $this->load->view('admin/template/footer'); ?>