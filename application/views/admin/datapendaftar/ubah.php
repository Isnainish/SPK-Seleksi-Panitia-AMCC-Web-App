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
              <h3 class="h4">Ubah Identitas Pendaftar</h3>
            </div>
            <div class="card-body">
              <form method="post" action="<?= site_url('admin/DataPendaftar/Pendaftar/doEditPendaftar/'.$edtPendaftar['id_pendaftar'])?>">

                <div class="form-group">
                    <img style="width: 150px; height: 150px;" src="<?= base_url()?>assets/foto/<?=$edtPendaftar['filefoto']?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_pendaftar" value="<?= set_value('nama_pendaftar', $edtPendaftar['nama_pendaftar']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">NIM</label>
                  <input type="text" class="form-control" name="nim" value="<?= set_value('nim', $edtPendaftar['nim']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Program Studi</label>
                  <input type="text" class="form-control" name="program_studi" value="<?= set_value('program_studi', $edtPendaftar['program_studi']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Email</label>
                  <input type="text" class="form-control" name="email" value="<?= set_value('email', $edtPendaftar['email']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="<?= set_value('alamat', $edtPendaftar['alamat']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Nomer HP</label>
                  <input type="text" class="form-control" name="nomer_hp" value="<?= set_value('nomer_hp', $edtPendaftar['nomer_hp']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Keahlian</label>
                  <input type="text" class="form-control" name="keahlian" value="<?= set_value('keahlian', $edtPendaftar['keahlian']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Pengalaman</label>
                  <input type="text" class="form-control" name="pengalaman" value="<?= set_value('pengalaman', $edtPendaftar['pengalaman']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Motivasi</label>
                  <input type="text" class="form-control" name="motivasi" value="<?= set_value('motivasi', $edtPendaftar['motivasi']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">IPK</label>
                  <input type="text" class="form-control" name="ipk" value="<?= set_value('ipk', $edtPendaftar['ipk']) ?>">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Pilihan Posisi 1</label>
                  <div>
                    <select name="posisi1" class="form-control">
                      <option value = "posisi1"> -- Pilihan Posisi Kepanitiaan -- </option>
                      <?php foreach ($select_sie->result() as $sie1) {
                        ?>

                        <option value="<?= $sie1->id_sie ?>"<?= ($sie1->id_sie == $edtPendaftar['pos1'] ? 'selected="selected"' : '') ?>><?= $sie1->nama_sie ?> </option>

                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-control-label">Pilihan Posisi 2</label>
                  <div>
                    <select name="posisi2" class="form-control">
                      <option value = "posisi2"> -- Pilihan Posisi Kepanitiaan -- </option>
                      <?php foreach ($select_sie->result() as $sie2) {
                        ?>

                        <option value="<?= $sie2->id_sie ?>"<?= ($sie2->id_sie == $edtPendaftar['pos2'] ? 'selected="selected"' : '') ?>><?= $sie2->nama_sie ?> </option>

                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <input type="submit" value="Simpan" class="btn btn-info">
              </form>
              <div class="form-group" align="right">       
                <a style="color: white;" href="<?= site_url('admin/DataPendaftar/Pendaftar')?>"><button class="btn btn-secondary btn-sm" style="padding: 8px;"> Kembali</button></a>
              </div>
            </div><!-- card-body -->

          </div><!-- card -->
          <br>
        </div>
      </div><!-- row -->
    </div>
    <?php $this->load->view('admin/template/footer'); ?>