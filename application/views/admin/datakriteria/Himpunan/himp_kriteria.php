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
      <<li><a href="<?=site_url('admin/Beranda')?>"> <i class="icon-home"></i>Beranda</a></li>

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

    <!-- input kriteria -->
    <div class="col-md-12">
      <div class="row-mt">
        <div class="button" style="margin-left: 15px;">
          <a style="color: white;" href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria/tambahHimp')?>"><button class="btn btn-info btn-sm">Tambah</button></a>
        </div>
        <br>

        <?php  
        $cari = $this->session->userdata('cari');
        ?>
        <form action="<?= site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria/doSearchHimpunan') ?>" method="POST">
          <div class="col-lg-12">
            <form role="form">
              <div class="form-inline">
                
                
                <select class="form-control" name="id_kegiatan" style="margin-right: 5px;  margin-top: 10px;">
                <option>-- Pilih Nama Kegiatan --</option>
                <?php foreach ($select_event as $k) { ?>
                  <option value="<?= $k->id_kegiatan ?>" <?= ($k->id_kegiatan == $cari['id_kegiatan'] ? 'selected="selected"' : '')?>> <?= $k->nama_kegiatan?> </option> 

                <?php } ?>
                </select>
              
              
              <select class="form-control" name="id_kriteria" style="margin-right: 5px; margin-top: 10px;">
                <option value = "kriteria"> -- Pilih Kriteria -- </option>
                <?php foreach ($select_option->result() as $row) {
                  ?>
                  <option value="<?= $row->id_kriteria ?>" <?= ($row->id_kriteria == $cari['id_kriteria'] ? 'selected="selected"' : '') ?>> <?= $row->nama_kriteria?> </option>

                  <?php
                }
                ?>
              </select>
            
            
              <button type="submit" class="btn btn-info">Pilih</button>
            
            </div>
            
          </form>         
        </div>
      </form>
    </div>
  </div>  
  
  <!-- informasi himp Kriteria -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-header d-flex align-items-center">
            <strong>
              <?php foreach ($select_option->result() as $row) {
                ?>
                <?= ($row->id_kriteria == $cari['id_kriteria'] ? $row->nama_kriteria : '') ?>

                <?php
              }
              ?>
            
          </strong>
          </div>
          <div class="card-body">
            <table class="table">
              <thead align="center">
                <tr>
                  <th width="5%">No</th>
                  <th width="20%">Nilai</th>
                  <th width="10%">Bobot</th>
                  <th width="20%">Keterangan</th>
                  <th width="20%">Aksi</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php 
                $i = 1;
                foreach ($listHimpunan as $row) {
                  ?>

                  <tr>
                    <th><?= $i ?></th>
                    <td><?= $row->nilai_himpunan ?></td>
                    <td><?= $row->bobot ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td>

                     <a href="<?= site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria/editHimp/')?><?= $row->id_kegiatan ?>/<?= $row->id_himp ?>" class="btn btn-warning btn-sm" >Ubah</a>

                     <a href="<?= site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria/DeleteHimpunan/')?><?= $row->id_himp ?>" class="btn btn-danger btn-sm" >Delete</a>
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