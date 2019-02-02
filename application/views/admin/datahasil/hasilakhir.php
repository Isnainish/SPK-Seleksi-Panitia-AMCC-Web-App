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
        <h2 class="no-margin-bottom">Data Hasil Lolos Seleksi Panitia Kegiatan</h2>
      </div>
    </header>
    <br>
    <!-- hasil akhir -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12" align="center">
          <?php  
          $carihasil = $this->session->userdata('carihasil');
          ?>
          <form action="<?= site_url('admin/DataHasil/Hasil/doSearchHasilKegiatan') ?>" method="POST">
            <div class="col-lg-6">
              <form role="form">
                <div class="form-group">
                  <select class="form-control" name="id_kegiatan">
                    <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                    <?php foreach ($nama_kegiatan->result() as $row) {
                          ?>
                          <option value="<?= $row->id_kegiatan ?>" <?= ($row->id_kegiatan == $carihasil['id_kegiatan'] ? 'selected="selected"' : '') ?>><?= $row->nama_kegiatan?> </option>
                          
                          <?php
                        }
                        ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-info">Pilih</button>
              </form>         
            </div>
          </form>
          <br>
          <div class="card">

            <div class="col-lg-12">
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Hasil Seleksi Panitia Kegiatan Amikom Computer Club</h3>
              </div>
              <table class="table table-striped table-hover">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                    <th width="30%">Nama Pendaftar</th>
                    <th width="10%">Aksi</th>
                  </tr>
                </thead>
                <tbody align="center">
                  <?php  
                  $i=1;
                  foreach ($lolos as $val) {
                    ?>
                    <tr>
                      <th scope="row"><?= $i?></th>
                      <td><?= $val['nama_pendaftar']?></td>
                      <td 
                      <?php if ($detail_kegiatan == 0) {
                        echo "hidden";
                      } ?>>
                        <a href="<?= site_url('admin/DataHasil/Hasil/hapushasilakhir/')?><?=$val['id_kegiatan']?>/<?=$val['id_rangking']?>" class="btn btn-danger btn-sm" >Hapus</a>
                      </td>
                    </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- card -->
            <div class="form-group">
              <div align="center">
                <a href="<?= site_url('admin/DataHasil/Hasil')?>"><button type="submit" class="btn btn-secondary">Kembali</button></a>
                <a href="<?= site_url('user/Pengumuman')?>"><button type="submit" class="btn btn-primary" <?php if ($detail_kegiatan == 0) {
                        echo "hidden";
                      } ?>>Publikasikan</button></a>
              </div>
            </div>
            <br>  
          </div>
        </div><!-- row -->
      </div><!-- container-fluid -->

      <?php $this->load->view('admin/template/footer'); ?>