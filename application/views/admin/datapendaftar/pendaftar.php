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
        <h2 class="no-margin-bottom">Data Pendaftar</h2>
      </div>
    </header>
    <br>
    <!-- input kegiatan -->
    <div align="center" class="col-md-12">
      <div class="row-mt">

        <?php  
        $search = $this->session->userdata('search');
        ?>
        <form action="<?= site_url('admin/DataPendaftar/Pendaftar/doSearchKegiatan') ?>" method="POST">
          <div class="col-lg-6">
            <form role="form">
              <div class="form-group">
                <select class="form-control" name="id_kegiatan">
                  <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                  <?php foreach ($select_option->result() as $row) {
                  ?>
                    <option value="<?= $row->id_kegiatan ?>" <?= ($row->id_kegiatan == $search['id_kegiatan'] ? 'selected="selected"' : '') ?>><?= $row->nama_kegiatan?> </option>
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
    <!-- Data Pendaftar-->  
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <br>
          <div class="card">
            <div class="card-header d-flex align-items-center">       
             <h3 class="h4">Data pendaftar Kepanitiaan AMCC</h3>
           </div>
           <div class="card-body">
            <table class="table table-striped table-hover">
              <thead align="center">
                <tr>
                  <th width="5%">No</th>
                  <th width="10%">NIM</th>
                  <th width="20%">Nama Pendaftar</th>
                  <th width="25%">Alamat</th>
                  <th width="15%">Program Studi</th>
                  <th colspan="2" width="25%">Aksi</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php 
                $i = 1;
                foreach ($listPendaftar->result() as $row) {                     
                  ?>

                  <tr>
                    <th><?= $i ?></th>
                    <td><?= $row->nim ?></td>
                    <td><?= $row->nama_pendaftar ?></td>
                    <td><?= $row->alamat ?></td>
                    <td><?= $row->program_studi ?></td>
                    <td <?php if ($detail_kegiatan == 0) {
                      echo "hidden";
                    }?>>

                      <a href="<?= site_url('admin/DataPendaftar/Pendaftar/DetailPendaftar/')?><?= $row->id_pendaftar ?>" class="btn btn-info btn-sm">Detail</a>
                      <a href="<?= site_url('admin/DataPendaftar/Pendaftar/EditPendaftar/')?><?= $row->id_pendaftar ?>" class="btn btn-warning btn-sm">Ubah</a>
                      <a href="<?= site_url('admin/DataPendaftar/Pendaftar/DeletePendaftar/')?><?= $row->id_pendaftar ?>" class="btn btn-danger btn-sm">Hapus</a>
                      
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