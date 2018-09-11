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

      <li><a href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria')?>"> <i class="icon-interface-windows"></i>Data Kriteria </a>
      </li>
      
      <li><a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"> <i class="icon-interface-windows"></i>Data Himpunan Kriteria </a>
      </li>

      <li><a href="<?=site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi')?>"> <i class="icon-interface-windows"></i>Data Posisi Kepanitiaan </a>
      </li>

      <li><a href="<?=site_url('admin/DataPerhitungan/Perhitungan')?>"> <i class="icon-padnote"></i>Data Perhitungan </a></li>

      <li><a href="<?=site_url('admin/DataPerhitungan/Rekomendasi')?>"> <i class="icon-padnote"></i> Data Rekomendasi Posisi </a></li>

      <li class="active"><a href="<?=site_url('admin/DataHasil/Hasil')?>"> <i class="fa fa-bar-chart"></i>Hasil </a></li>

    </ul>
    <ul class="list-unstyled">
      <li class="nav-item"><a href="<?=site_url('auth/Auth')?>" class="nav-link logout"> <i class="fa fa-sign-out">Logout</i></a></li>
    </ul>
  </nav>
  <div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
      <div class="container-fluid">
        <h2 class="no-margin-bottom">Data Hasil</h2>
      </div>
    </header>
    <br>
    <!-- Data hasil perhitungan-->

    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12">
          <form action="<?= base_url()?>index.php/admin/DataHasil/Hasil/addstatus" method="POST">
          <div class="card">
            <div class="col-lg-12">
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Hasil Perangkingan</h3>
              </div>
              <table class="table">
                <thead align="center">
                  <tr>
                    <th>No</th>
                    <th>Nama Pendaftar</th>
                    <th>Nilai</th>
                    <th>Rangking</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody align="center">
                  <?php 
                  $i=1;
                  foreach ($rangking as $h) {
                   ?>
                  <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $h['nama_pendaftar']?></td>
                    <td><?= $h['hasil']?></td>
                    <th>Rangking <?= $i ?></th>
                  <th>
                      <input type="checkbox" name="status[]" id="status">
                    </th>     
                  </tr>

                  <?php $i++; } ?>
                </tbody>
              </table>
           </div>
          </div> <!-- card -->

          <div class="form-group row">
            <div class="col-sm-4 offset-sm-5">
              <a href="<?=site_url('admin/DataHasil/Hasil/hasilakhir')?>"><button type="submit" class="btn btn-primary">Simpan</button></a>
            </div>
          </div>

          </form>
          <br>  
        </div>
      </div> <!-- row -->
    </div> <!-- container-fluid -->
   
    <!-- Hasil Rekomendasi -->
    <div class="container-fluid">
      <div class="row" >

        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Rekomendasi Posisi Kepanitiaan</h3>
              </div>
              <table class="table">
                <thead align="center">
                  <tr>
                    <th>No</th>
                    <th>Nama Pendaftar</th>
                    <th>Rekomendasi Posisi</th>
                    <th>Nilai Rangking</th>
                  </tr>
                </thead>
                <tbody align="center">
                  <?php 
                  $i = 1;
                  foreach ($rekomendasi as $hr) {              
                   ?>
                  <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $hr['nama_pendaftar']?></td>
                    <td><?= $hr['nama_sie']?></td>

                    <td><?= $hr['hasil_rekomendasi']?></td>
                                           
                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
            </div>
          </div> <!-- card -->
        </div>

      </div> <!-- row -->
    </div> <!-- container-fluid -->

    <?php $this->load->view('admin/template/footer'); ?>