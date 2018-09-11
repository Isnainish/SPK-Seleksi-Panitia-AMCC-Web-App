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

      <li class="active"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Data Pengguna </a>
        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
          <li><a href="<?=site_url('admin/DataUser/User')?>">Data Admin</a></li>
          <li class="active"><a href="<?=site_url('admin/DataUser/User/dataPewawancara')?>">Data Pewawancara</a></li>
          
        </ul>
      </li>
      <li><a href="<?=site_url('admin/DataPendaftar/Pendaftar')?>"> <i class="icon-user"></i>Data Pendaftar </a></li>

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
        <div class="col-lg-10">
          
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Info Detail Pewawancara</h3>
            </div>
            <div class="card-body">
              <?php foreach ($info_detail->result() as $row) {
                ?>
                <h3 class="h4"><?= $row->nama?></h3>
                <?php } ?>
                <table class="col-lg-12">
                  <thead align="center">
                    <th width="5%">No.</th>
                    <th width="70%">Nama Kegiatan</th>  
                    <th width="25%">Status</th>
                    
                  </thead>
                  <tbody align="center">
                    <tr>
                      <?php 
                      $i=1;
                      foreach ($info_detail->result() as $info) {
                        
                        ?>
                        <td><?= $i ?></td>
                        <td><?= $info->nama_kegiatan ?></td>
                        <td><?= $info->nama_level ?></td>

                        <?php 
                        $i++; 
                      } 
                      ?>
                    </tr>
                  </tbody>
                </table>
              </div><!-- card-body -->

            </div><!-- card -->
            <div class="form-group">       
              <a style="color: white;" href="<?= site_url('admin/Pewawancara')?>"><button class="btn btn-secondary btn-sm" style="padding: 8px;"> Kembali</button></a>
            </div>
          </div>
        </div><!-- row -->
      </div> 

      <?php $this->load->view('admin/template/footer'); ?>