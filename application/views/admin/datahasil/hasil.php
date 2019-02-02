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
        <h2 class="no-margin-bottom">Data Hasil Perhitungan</h2>
      </div>
    </header>
    <br>
    <!-- Data hasil perhitungan-->

    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12">
          <div align="center" class="col-md-12">
            <div class="row-mt">
              <?php  
              $pilihnamakegiatan = $this->session->userdata('pilihnamakegiatan');
              ?>
              <form action="<?= site_url('admin/DataHasil/Hasil/doSearchKegiatan') ?>" method="POST">
                <div class="col-lg-6">
                  <form role="form">
                    <div class="form-group">
                      <select class="form-control" name="id_kegiatan">
                        <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                        <?php foreach ($nama_kegiatan->result() as $row) {
                          ?>
                          <option value="<?= $row->id_kegiatan ?>" <?= ($row->id_kegiatan == $pilihnamakegiatan['id_kegiatan'] ? 'selected="selected"' : '') ?>><?= $row->nama_kegiatan?> </option>
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
          <form action="<?= base_url()?>index.php/admin/DataHasil/Hasil/addstatus/<?=$pilihnamakegiatan['id_kegiatan']?>?>" method="POST">
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
                    <td>Rangking <?= $i ?></td>
                  <td>
                      <input type="checkbox" name="status[]" value="<?= $h['id_rangking']?>">
                    </td>     
                  </tr>

                  <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
            </div> <!-- card -->
            <h6 class="h6">***Catatan : Simpan dan lihat data yang telah di <b>checlist</b> dengan klik tombol <b>Hasil Seleksi</b></h6>
            <div class="form-group" <?php if ($detail_kegiatan == 0) {
              echo "hidden";
            } ?>>
              <div align="right">
                <button type="submit" class="btn btn-primary">Hasil Seleksi</button>
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