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

      <li class="active"><a href="<?=site_url('admin/Pewawancara')?>"> <i class="icon-user"></i>Data Pewawancara </a></li>

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
        <h2 class="no-margin-bottom">Data Pengguna</h2>
      </div>
    </header>
    <br>
    <!-- Tambah kriteria -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5">

          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Ubah Pewawancara</h3>
            </div>
            <div class="card-body">
              <form method="post" action="<?= site_url('admin/Pewawancara/doEditPewawancara/'.$detail['id_detail_user'])?>">
                <div class="form-group">
                  <label class="form-control-label">Kepanitiaan</label>
                  <div>
                    <select class="form-control" name="id_kegiatan">
                      <option>-- Pilih Nama Kegiatan --</option>
                      <?php foreach ($pilih_kegiatan->result() as $kegiatan) {
                        ?>
                        <option value="<?= $kegiatan->id_kegiatan ?>"<?= ($kegiatan->id_kegiatan == $detail['id_kegiatan'] ? 'selected="selected"' : '') ?>><?= $kegiatan->nama_kegiatan?> </option>

                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Nama Lengkap</label>
                  <input type="text" placeholder="nama lengkap" class="form-control" name="nama" value="<?= set_value('nama', $detail['nama']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Username</label>
                  <input type="text" placeholder="username" class="form-control" name="username" value="<?= set_value('username', $detail['username']) ?>">
                </div>
                <div class="form-group">       
                  <label class="form-control-label">Password</label>
                  <input type="password" placeholder="password" class="form-control" name="password" value="<?= set_value('password', $detail['password']) ?>">
                </div>       
                <input type="submit" value="Simpan" class="btn btn-primary">
              </form>
              <div class="form-group" align="right">       
                <a style="color: white;" href="<?= site_url('admin/Pewawancara')?>"><button class="btn btn-secondary btn-sm" style="padding: 8px;"> Kembali</button></a>
              </div>
            </div><!-- card-body -->

          </div><!-- card -->
        </div>
      </div><!-- row -->
    </div> 

    <?php $this->load->view('admin/template/footer'); ?>