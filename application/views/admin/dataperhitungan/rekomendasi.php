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

      <li><a href="<?=site_url('admin/DataPerhitungan/Perhitungan')?>"> <i class="icon-padnote"></i>Data Perhitungan </a>
      </li>

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
        <h2 class="no-margin-bottom">Perhitungan Rekomendasi Nilai dengan Metode SAW</h2>
      </div>
    </header>
    <br>

    <!-- Data Penialian-->
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12">
          <!-- input kegiatan -->
    <div align="center" class="col-md-12">
      <div class="row-mt">
        <?php  
        $posisi = $this->session->userdata('posisi');
        ?>
        <form action="<?= site_url('admin/DataPerhitungan/Rekomendasi/doSearchKegiatan') ?>" method="POST">
          <div class="col-lg-6">
            <form role="form">
              <div class="form-group">
                <select class="form-control" name="id_kegiatan">
                  <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                    <?php foreach ($select_option->result() as $rp) {
                  ?>
                    <option value="<?= $rp->id_kegiatan ?>" <?= ($rp->id_kegiatan == $posisi['id_kegiatan'] ? 'selected="selected"' : '') ?>><?= $rp->nama_kegiatan?> </option>
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
          <div class="card">
            <div class="col-lg-12">

              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Data Pilihan Posisi Di Kepanitiaan</h3>
              </div>
              <table class="table">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Sie-Panitia</th>
                    <th width="20%">Pilihan Posisi 1</th>
                    <th width="20%">Pilihan Posisi 2</th>
                  </tr>

                  
                </thead>
                <tbody align="center">

                  <?php 
                  $i = 1;
                  foreach ($pilihansie as $pil) {
                    ?>
                    <tr>  
                      <th><?= $i ?></th>
                      <td><?= $pil['nama_pendaftar'] ?></td> 
                      
                      <td><?= $pil['pos1'] ?></td>
                      
                      <td><?= $pil['pos2'] ?></td>
                    </tr>
                    <?php 
                    $i++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          
          <div class="button" align="center">
            <a style="color: white;" href="<?=site_url('admin/DataPerhitungan/Rekomendasi/viewNilai/')?><?= $posisi['id_kegiatan']?>"><button class="btn btn-info btn-sm">Hitung</button></a>
          </div>
          <br>
          
        </div>          
      </div><!-- row -->
    </div>

    <?php $this->load->view('admin/template/footer'); ?>