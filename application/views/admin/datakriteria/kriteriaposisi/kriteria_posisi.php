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

      <li class=""><a href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria')?>"> <i class="icon-interface-windows"></i>Data Kriteria </a>
      </li>

      <li><a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"> <i class="icon-interface-windows"></i>Data Himpunan Kriteria </a>
      </li>

      <li class="active"><a href="<?=site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi')?>"> <i class="icon-interface-windows"></i>Data Posisi Kepanitiaan </a>
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
        <h2 class="no-margin-bottom">Data Kriteria Posisi</h2>
      </div>
    </header>
    <br>
        <!-- input kegiatan -->
    <div align="center" class="col-md-12">
      <div class="row-mt">
        <?php  
        $caripos = $this->session->userdata('caripos');
        ?>
        <form action="<?= site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi/doSearchKegiatan') ?>" method="POST">
          <div class="col-lg-6">
            <form role="form">
              <div class="form-group">
                <select class="form-control" name="id_kegiatan">
                  <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                  <?php foreach ($select_kegiatan->result() as $row) {
                  ?>
                    <option value="<?= $row->id_kegiatan ?>" <?= ($row->id_kegiatan == $caripos['id_kegiatan'] ? 'selected="selected"' : '') ?>><?= $row->nama_kegiatan?> </option>
                    <?php
                    }
                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-info">Pilih</button>
            </form>         
          </div>
        </form>
      </div>
    </div>  
    <br>
    <!-- informasi Kriteria Posisi -->
    <div class="container-fluid">
      <div class="row">
     
      <div class="col-lg-12" <?php if ($detail_kegiatan == 0) {
          echo "hidden";
          }?>
      >
        <a style="color: white;" href="<?=site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi/tambahKritPos')?>"><button class="btn btn-info btn-sm">Tambah</button></a>
          </div>
          <br>
        <div class="col-lg-12">
          <br>
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Informasi Data Kriteria Posisi 
                <?php foreach ($select_kegiatan->result() as $kegiatan) {
                ?>
                <strong style="color: #0090d2;"><?= ($kegiatan->id_kegiatan == $caripos['id_kegiatan'] ? $kegiatan->nama_kegiatan : '') ?></strong>
                
                <?= ($kegiatan->nama_kegiatan == $caripos['id_kegiatan'] ? : '') ?>

                <?php
              }
              ?></h3>
            </div>
            <div class="card-body">
              <table class="table">
                <thead align="center">
                  <tr>
                    <th width="10%">No</th>
                    <th width="40%">Nama Sie-Kepanitiaan</th>
                    <th width="20%">Aksi</th>
                  </tr>
                </thead>
                <tbody align="center">
                  <?php 
                    $i = 1;
                    foreach ($datasie->result() as $row) {                    
                  ?>

                  <tr>
                    <th><?= $i ?></th>
                    <td><?= $row->nama_sie ?></td>
                    <td <?php if ($detail_kegiatan == 0) {
                        echo "hidden";
                        }?>
                    >
                      <a href="<?= site_url('admin/DataKriteria/KriteriaPosisi/DetailPosisi/DetailKritPosisi/')?><?= $row->id_kegiatan ?>/<?= $row->id_sie ?>" class="btn btn-info btn-sm" value="id_sie">Detail</a>

                      <a href="<?= site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi/UbahKritPos/')?><?= $row->id_sie ?>" class="btn btn-warning btn-sm" value="id_sie">Ubah</a>

                      <a href="<?= site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi/DeleteKritPos/')?><?= $row->id_sie ?>" class="btn btn-danger btn-sm" >Hapus</a>
                  </tr>

                  <?php 
                  $i++;
                    }
                  ?>
                </tbody>
              </table>
            </div><!-- card-body -->
          </div><!-- card -->
        </div>
      </div><!-- row -->
    </div> 

  <?php $this->load->view('admin/template/footer'); ?>