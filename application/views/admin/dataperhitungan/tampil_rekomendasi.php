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
        <h2 class="no-margin-bottom">Perhitungan Metode SAW untuk Merekomendasikan Posisi Kepanitiaan</h2>
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
                <h5 style="color: red; font-size: 15px;" class="h4">Perhitungan dilakukan dengan mengelompokkan pendaftar berdasarkan pilihan posisi yang sama kemudian diterapkan perhitungan dengan metode SAW </h5>
            </div>
            <br>
            <!-- Tampilkan nama Sie -->
            <?php
            $u = 0; 
            foreach ($sie as $s) { ?>
              <h5 style="color:#17a2b8;"><?= $s['nama_sie']?></h5>
            

            <!-- Data pendaftar Setiap SIe -->
              <div class="card-header d-flex align-items-center">
                <h5>Berikut nilai tes yang diperoleh pendaftar yang telah dikelompokkan berdasarkan pilihan posisi yang sama </h5>
              </div>
              <table class="table">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Pendaftar</th>
                    <th width="10%">Nilai Attitude</th>
                    <th width="10%">Nilai Loyalitas</th>
                    <th width="15%">Nilai Kerjasama Tim</th>
                    <th width="10%">Nilai Keahlian</th>
                    <th width="10%">Nilai Pengalaman</th>
                    <th width="10%">Nilai Motivasi</th>
                    <th width="5%">Nilai IPK</th>
                  </tr>   
                </thead>
                <tbody align="center">                
                   
                
                <?php 
                   $i=1;
                   foreach ($pendaftar[$u] as $val) { ?>
                   <tr>
                     <td><?= $i?></td>
                     <td><?= $val['nama_pendaftar']; ?></td>
                     <td><?= $val['nilai_attitude']; ?></td>
                     <td><?= $val['nilai_loyalitas']; ?></td>
                     <td><?= $val['nilai_kerjasama']; ?></td>
                     <td><?= $val['nilai_keahlian']; ?></td>
                     <td><?= $val['nilai_pengalaman']; ?></td>
                     <td><?= $val['nilai_motivasi']; ?></td>
                     <td><?= $val['nilai_ipk']; ?></td>
                   </tr>
                   <?php $i++;} ?>
                </tbody>
              </table>
              
              <div class="button">
                <a style="color: white;" href="<?=site_url('admin/DataPerhitungan/Rekomendasi/hitungrekomendasi/')?><?= $s['id_kegiatan']?>/<?= $s['id_sie']?>"><button class="btn btn-info btn-sm">Hitung</button></a>
              </div>
              <br>
            
            <?php $u++; } ?>

          </div>
 
          <br>
          
          </div>
        </div>          
      </div><!-- nilai -->
    </div>

    <?php $this->load->view('admin/template/footer'); ?>