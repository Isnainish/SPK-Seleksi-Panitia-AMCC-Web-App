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

      <li  class="active"><a href="<?=site_url('admin/DataPendaftar/Pendaftar')?>"> <i class="icon-user"></i>Data Pendaftar </a></li>

      <li><a href="<?=site_url('admin/Pewawancara')?>"> <i class="icon-user"></i>Data Pewawancara </a></li>

      <li><a href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria')?>"> <i class="icon-interface-windows"></i>Data Kriteria </a>
      </li>

      <li><a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"> <i class="icon-interface-windows"></i>Himpunan Kriteria </a>
      </li>

      <li><a href="<?=site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi')?>"> <i class="icon-interface-windows"></i>Data Posisi Kepanitiaan </a>
      </li>

      <li><a href="<?=site_url('admin/DataPerhitungan/Perhitungan')?>"> <i class="icon-padnote"></i>Data Perhitungan </a></li>

      <li><a href="<?=site_url('admin/DataPerhitungan/Rekomendasi')?>"> <i class="icon-padnote"></i> Data Rekomendasi Posisi </a></li>

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
        <h2 class="no-margin-bottom">Informasi Pendaftar</h2>
      </div>
    </header>
    <br>
    <!-- Detail data Pendaftar-->  
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header d-flex align-items-center">       
              <h3 class="h4">Identitas Diri</h3>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
               <?php 
               foreach ($listDetail->result() as $row) {                    
                ?>
                  <tr>
                      <img style="width: 150px; height: 150px;" src="<?= base_url()?>assets/foto/<?=$row->filefoto?>">                    
                    
                  </tr>
                  <tr>
                    <td width="30%">Nama Peserta</td>
                    <td width="70%"><?= $row->nama_pendaftar ?></td>        
                  </tr>
                  <tr>
                    <td width="30%">NIM</td>
                    <td width="70%"><?= $row->nim ?></td>
                  </tr>
                  <tr>
                    <td width="30%">Program Studi</td>
                    <td width="70%"><?= $row->program_studi ?></td>
                  </tr>
                  <tr>
                    <td width="30%">Email</td>
                    <td width="70%"><?= $row->email ?></td>
                  </tr>
                  <tr>
                    <td width="30%">Alamat</td>
                    <td width="70%"><?= $row->alamat ?></td>
                  </tr>
                  <tr>
                    <td width="30%">Nomer HP</td>
                    <td width="70%"><?= $row->nomer_hp ?></td>
                  </tr>
                  <tr>
                    <td width="30%">Keahlian</td>
                    <td width="70%"><?= $row->keahlian ?></td>
                  </tr>
                  <tr>
                    <td width="30%">Pengalaman</td>
                    <td width="70%"><?= $row->pengalaman ?></td>
                  </tr>
                  <tr>
                    <td width="30%">Motivasi</td>
                    <td width="70%"><?= $row->motivasi ?></td>
                  </tr>

                  <tr>
                    <td width="30%">IPK</td>
                    <td width="70%"><?= $row->ipk ?></td>
                  </tr>
                  
                  <tr>
                    <td width="40%">Pilihan Posisi 1</td>
                    <td width="60%">
                      <?=$row->pos1 ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="40%">Pilihan Posisi 2</td>
                    <td width="60%">
                      <?=$row->pos2 ?>

                     
                    </td>
                  </tr>
                  
                <?php 
                  }
                 ?>
            </table>
          </div><!-- card-body -->

        </div><!-- card -->
        <div class="form-group row" style="margin-left: 4px;">
          <a style="color: white;" href="<?=site_url('admin/DataPendaftar/Pendaftar')?>"><button class="btn btn-secondary btn-sm" style="padding: 10px;">Kembali</button></a>
        </div>
        <br>
      </div>
    </div><!-- row -->
  </div>
  <?php $this->load->view('admin/template/footer'); ?>