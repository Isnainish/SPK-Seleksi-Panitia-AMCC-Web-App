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
    <!-- Tambah kriteria -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Tambah Sie dalam Kepantiaan</h3>
            </div>
            <div class="card-body">
              <form method="post" action="<?= base_url() ?>index.php/admin/DataKriteria/KriteriaPosisi/KriteriaPosisi/addKritPos">
                <div class="form-group">
                          <label class="form-control-label">Kepanitiaan</label>
                          <div>
                           <select class="form-control" name="id_kegiatan">
                            <option>-- Pilih Nama Kegiatan --</option>
                            <?php foreach ($select_kegiatan->result() as $row) {
                            ?>
                              <option value="<?= $row->id_kegiatan ?>"><?= $row->nama_kegiatan ?> </option>

                            <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>
               <div class="form-group">
                <label class="form-control-label">Nama Sie-Panitia</label>
                <div>
                  <input type="text" class="form-control" name="nama_sie" placeholder="nama sie-panitia" required>
                </div>
              </div>
                  <a style="color: white;" href="<?=site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi')?>"><button class="btn btn-info btn-sm" style="padding: 8px;"> Simpan</button></a>
              
            </form>
            <div class="form-group" align="right">
               
               <a style="color: white;" href="<?= site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi')?>"><button class="btn btn-secondary btn-sm" style="padding: 8px;"> Kembali</button></a>
            </div>
          </div><!-- card-body -->

        </div><!-- card -->
      </div>
    </div><!-- row -->
  </div>

  <?php $this->load->view('admin/template/footer'); ?>