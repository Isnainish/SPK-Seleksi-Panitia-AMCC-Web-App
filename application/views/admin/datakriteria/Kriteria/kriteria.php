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
      <li><a href="<?=site_url('admin/Beranda')?>"> <i class="icon-home"></i>Beranda </a></li>

      <li><a href="<?=site_url('admin/DataPendaftar/Pendaftar')?>"> <i class="icon-user"></i>Data Pendaftar </a></li>

      <li class="active"><a href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria')?>"> <i class="icon-interface-windows"></i>Data Kriteria </a>
      </li>

      <li><a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"> <i class="icon-interface-windows"></i>Himpunan Kriteria </a>
      </li>

      <li><a href="<?=site_url('admin/DataPerhitungan/Perhitungan')?>"> <i class="icon-padnote"></i>Perhitungan </a></li>

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
        <h2 class="no-margin-bottom">Data Kriteria</h2>
      </div>
    </header>
    <br>
    <!-- informasi Kriteria -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
        <?php
          $daftarKriteria = $listKriteria->num_rows();
          if ($daftarKriteria == 0) {
        ?>
          <div class="button">
            <a style="color: white;" href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria/tambahKriteria')?>"><button class="btn btn-info btn-sm">Tambah</button></a>
          </div>
          <?php
            }
            else{

          ?>
          <div class="button">
            <a style="color: white;" href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria/tambahKriteria')?>"><button class="btn btn-info btn-sm">Tambah</button></a>
          </div>
          <br>
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Informasi Data Kriteria</h3>
            </div>
            <div class="card-body">
              <table class="table">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                    <th width="30%">Nama kriteria</th>
                    <th width="5%">Kode</th>
                    <th width="5%%">Bobot</th>
                    <th width="20%">Keterangan</th>
                    <th width="20%">Aksi</th>
                  </tr>
                </thead>
                <tbody align="center">
                  <?php 
                    $i = 1;
                    foreach ($listKriteria->result() as $row) {                    
                  ?>

                  <tr>
                    <th><?= $i ?></th>
                    <td><?= $row->nama_kriteria ?></td>
                    <td><?= $row->kode ?></td>
                    <td><?= $row->bobot ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td>

                      <a href="<?= site_url('admin/DataKriteria/Kriteria/Kriteria/editKriteria/')?><?= $row->id_kriteria ?>" class="btn btn-warning btn-sm" >Ubah</a>

                      <a href="<?= site_url('admin/DataKriteria/Kriteria/Kriteria/DeleteKriteria/')?><?= $row->id_kriteria ?>" class="btn btn-danger btn-sm" >Hapus</a>

                  </tr>

                  <?php 
                  $i++;
                    }
                  ?>
                </tbody>
              </table>
            </div><!-- card-body -->
          </div><!-- card -->
          <?php
            }
          ?>
        </div>
      </div><!-- row -->
    </div> 

  <?php $this->load->view('admin/template/footer'); ?>