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
        <h2 class="no-margin-bottom">Data Nilai pada Setiap Sie-Kepanitiaan</h2>
      </div>
    </header>
    <br>

    <!-- informasi Kriteria Posisi -->
    <div class="container-fluid">
      <div class="row">
      
      <div class="button">
        <div class="col-lg-12">
        <div>
        <a style="color: white;" href="<?=site_url('admin/DataKriteria/KriteriaPosisi/DetailPosisi/tambahDetPos/')?><?= $idkegiatan ?>/<?= $idsie ?>"><button class="btn btn-info btn-sm">Tambah</button></a>
        </div>
          <br>
          <div class="card">
            <div class="card">
              
            </div>
            <div class="card-body">
              <table class="table">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                   
                    <th width="10%">Kriteria</th>
                    <th width="5%">Bobot</th>
                    <th width="10%">Keterangan</th>
                    <th width="20%">Aksi</th>
                  </tr>
                </thead>
                <tbody align="center">
                  <?php 
                    $i = 1;
                    foreach ($detailpos as $row) {                    
                  ?>

                  <tr>
                    <th><?= $i ?></th>
                    <td><?= $row->nama_kriteria ?>
                    </td>
                    <td><?= $row->bobot ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td>
                      <a href="<?= site_url('admin/DataKriteria/KriteriaPosisi/DetailPosisi/editDetailPos/')?><?= $row->id_kriteria_posisi ?>" class="btn btn-warning btn-sm" >Ubah</a>

                      <a href="<?= site_url('admin/DataKriteria/KriteriaPosisi/DetailPosisi/DeleteDetailPos/')?><?= $row->id_kegiatan.'/'.$row->id_sie.'/'.$row->id_kriteria_posisi ?>" class="btn btn-danger btn-sm" >Hapus</a>
                    </td>

                  </tr>

                  <?php 
                  $i++;
                    }
                  ?>
                </tbody>
              </table>
            </div><!-- card-body -->
            </div>
          </div><!-- card -->
        </div>
      </div><!-- row -->
    </div> 

  <?php $this->load->view('admin/template/footer'); ?>