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

      <li class="active"><a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"> <i class="icon-interface-windows"></i>Data Himpunan Kriteria </a>
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
        <h2 class="no-margin-bottom">Data Himpunan Kriteria</h2>
      </div>
    </header>
    <br>
    <!-- informasi Kriteria -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Tambah Nilai Sub-Kriteria</h3>
            </div>
            <div class="card-body">
              <?php  
              $search = $this->session->userdata('search');
              ?>
              <form action="<?= site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria/doSearchKegiatan') ?>" method="POST">
                <div class="col-lg-12">
                  <form role="form">
                    <div class="form-group">
                      <label class="form-control-label">Pilih Nama Kepanitiaan</label>
                      <select class="form-control" name="id_kegiatan">
                        <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                        <?php foreach ($select_event->result() as $row) {
                          ?>
                          <option value="<?= $row->id_kegiatan ?>" <?= ($row->id_kegiatan == $search['id_kegiatan'] ? 'selected="selected"' : '') ?>><?= $row->nama_kegiatan?> </option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div align="center">
                      <button type="submit" class="btn btn-info">Pilih</button>
                    </div>
                  </form>         
                </div>
              </form>
              <?php if ($search['id_kegiatan'] > 0) {
              ?>
              <form method="post" action="<?= base_url() ?>index.php/admin/DataKriteria/HimpKriteria/Himp_Kriteria/addHimpunan/<?= $search['id_kegiatan'] ?>">

                <div class="form-group">
                  <label class="form-control-label">Pilih Kriteria</label>
                  <div>
                    <select class="form-control" name="id_kriteria">
                      <option value = "kriteria"> -- Pilih Kriteria -- </option>
                      <?php foreach ($select_option->result() as $row) {
                        ?>
                        <option value="<?= $row->id_kriteria ?>"><?= $row->kode?> <?= $row->nama_kriteria ?> </option>

                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Nilai</label><br>
                  <select class="form-control" name="nilai_himpunan">
                    <option value="">-- Pilihan Nilai Himpunan--</option>
                    <option value="<40"> <40 </option>
                    <option value="41-50"> 41-50 </option>
                    <option value="51-70"> 51-70 </option>
                    <option value="71-90"> 71-90 </option>
                    <option value=">90"> >90 </option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Bobot</label>
                  <select class="form-control" name="bobot_himpunan">
                    <option value="">-- Pilihan Bobot Nilai Himpunan --</option>
                    <option value="1"> 1 [Sangat rendah] </option>
                    <option value="2"> 2 [Rendah] </option>
                    <option value="3"> 3 [Cukup] </option>
                    <option value="4"> 4 [Tinggi] </option>
                    <option value="5"> 5 [Sangat Tinggi] </option>
                  </select>
                </div>
                <input type="submit" value="Simpan" class="btn btn-info">
              </form>
              <?php } ?>
              <div class="form-group" align="right">       
                <a style="color: white;" href="<?= site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"><button class="btn btn-secondary btn-sm" style="padding: 8px;"> Kembali</button></a>
              </div>
            </div> <!-- card-body -->
          </div><!-- card -->

        </div>
      </div><!-- row -->
    </div>

    <?php $this->load->view('admin/template/footer'); ?>