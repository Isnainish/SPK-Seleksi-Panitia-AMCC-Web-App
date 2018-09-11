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

      <li class="active"><a href="<?=site_url('admin/DataPerhitungan/Perhitungan')?>"> <i class="icon-padnote"></i>Data Perhitungan </a>
      </li>

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
        <h2 class="no-margin-bottom">Data Perhitungan</h2>
      </div>
    </header>
    <br>
        <!-- input kegiatan -->
    <div align="center" class="col-md-12">
      <div class="row-mt">
        <?php  
        $carinama = $this->session->userdata('carinama');
        ?>
        <form action="<?= site_url('admin/DataPerhitungan/Perhitungan/doSearchKegiatan') ?>" method="POST">
          <div class="col-lg-6">
            <form role="form">
              <div class="form-group">
                <select class="form-control" name="id_kegiatan">
                  <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                  <?php foreach ($select_option->result() as $sk) {
                  ?>
                    <option value="<?= $sk->id_kegiatan ?>" <?= ($sk->id_kegiatan == $carinama['id_kegiatan'] ? 'selected="selected"' : '') ?>><?= $sk->nama_kegiatan?> </option>
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
    <!-- Data Penialian-->
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Data Penilaian</h3>
              </div>
              <table class="table">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                    <th width="10%">NIM</th>
                    <th width="20%">Nama Pendaftar</th>
                
                    <th width="5%">C1</th>
                    <th width="5%">C2</th>
                    <th width="5%">C3</th>
                    <th width="5%">C4</th>
                    <th width="5%">C5</th>
                    <th width="5%">C6</th>
                    <th width="5%">C7</th>
                  </tr>

                  
                </thead>
                <tbody align="center">
                  
                  <?php 
                    $i = 1;
                    foreach ($penilaian as $row) {
                  ?>
                  <tr>  
                    <th><?= $i ?></th>
                    <td><?= $row->nim ?></td>
                    <td><?= $row->nama_pendaftar ?></td>
                    <td><?= $row->nilai_attitude ?></td>
                    <td><?= $row->nilai_loyalitas ?></td>
                    <td><?= $row->nilai_kerjasama ?></td>
                    <td><?= $row->nilai_keahlian ?></td>
                    <td><?= $row->nilai_pengalaman ?></td>
                    <td><?= $row->nilai_motivasi ?></td>
                    <td><?= $row->nilai_ipk ?></td>
                    
                  </tr>
                  <?php 
                    $i++;
                    }
                  ?>
                </tbody>
              </table>
               </div>
               
            <div class="card-body" >         
               <p>
               <strong>*Keterangan : </strong>
               <strong>C1</strong> : Nilai Attitude,
               <strong>C2</strong> : Nilai Loyalitas,
               <strong>C3</strong> : Nilai Kerjasama Tim,
               <strong>C4</strong> : Nilai Keahlian,
               <strong>C5</strong> : Nilai Pengalaman,
               <strong>C6</strong> : Nilai Motivasi,
               <strong>C7</strong> : Nilai IPK
               </p>
            </div>
          </div>
          <div class="button" align="center">
            <a style="color: white;" href="<?=site_url('admin/DataPerhitungan/Perhitungan/hitung/')?><?= $carinama['id_kegiatan']?>"><button class="btn btn-info btn-sm">Hitung</button></a>
          </div>
          <br>
          

        </div>          
      </div><!-- row -->
    </div>

    <?php $this->load->view('admin/template/footer'); ?>