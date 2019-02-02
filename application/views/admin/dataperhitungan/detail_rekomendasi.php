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
        <h2 class="no-margin-bottom">Langkah Perhitungan Metode SAW</h2>
      </div>
    </header>
    <br>
    <!-- Data Penialian-->
    <div class="container-fluid">
      <div class="nilai" >
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
            <!-- langkah 1 -->
              <div class="card-header d-flex align-items-center">
                <h5>Langkah 1 : Mengubah nilai tes pendaftar menjadi nilai rating setiap kriteria yang telah ditentukan dengan membandingkan nilainya</h5>
              </div>
              <table class="table">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Pendaftar</th>
                    <!-- <th>Pewawancara</th> -->
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
                   $i=1;
                   foreach ($nilaibaru as $val) { ?>
                   <tr>
                     <td><?= $i?></td>
                     <td><?= $val['nama_pendaftar'] ?></td>
                     <td><?= $val['c1']; ?></td>
                     <td><?= $val['c2']; ?></td>
                     <td><?= $val['c3']; ?></td>
                     <td><?= $val['c4']; ?></td>
                     <td><?= $val['c5']; ?></td>
                     <td><?= $val['c6']; ?></td>
                     <td><?= $val['c7']; ?></td>
                   </tr>
                   <?php $i++;} ?>

                </tbody>

              </table>
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
            
            <!-- langkah 2 -->
              <div class="card-header d-flex align-items-center">
                <h5>Langkah 2 : Normalisasi nilai (R)</h5>
              </div>
              <table class="table">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                    <th width="10%">Alternatif</th>
                    <!-- <th>Pewawancara</th> -->
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
                    foreach ($normalisasi as $r) {
                  ?>
                  <tr>  
                    <th><?= $i ?></th>
                    <td>Alternatif <?= $i ?></td>
                    <td><?= $r['c1'] ?></td>
                    <td><?= $r['c2']  ?></td>
                    <td><?= $r['c3']  ?></td>
                    <td><?= $r['c4']  ?></td>
                    <td><?= $r['c5']  ?></td>
                    <td><?= $r['c6']  ?></td>
                    <td><?= $r['c7']  ?></td>
                    
                  </tr>
                  <?php 
                    $i++;
                    }
                  ?>
                </tbody>
              </table>
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
              <!-- langkah 3 -->
              <div class="card-header d-flex align-items-center">
                <h5>Langkah 3 : Menghitung nilai preferensi (V)</h5>
              </div>
              <table class="table">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                    <th width="10%">Alternatif</th>
                    <!-- <th>Pewawancara</th> -->
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
                    foreach ($hasil as $v) {
                  ?>
                  <tr>  
                    <th><?= $i ?></th>
                    <td>Alternatif <?= $i ?></td>
                    <td><?= $v['c1']  ?></td>
                    <td><?= $v['c2']  ?></td>
                    <td><?= $v['c3']  ?></td>
                    <td><?= $v['c4']  ?></td>
                    <td><?= $v['c5']  ?></td>
                    <td><?= $v['c6']  ?></td>
                    <td><?= $v['c7']  ?></td>
                    
                  </tr>
                  <?php 
                    $i++;
                    }
                  ?>
                </tbody>
              </table>
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
              <!-- langkah 4 -->
              <div class="card-header d-flex align-items-center">
                <h5>Langkah 4 : Hasil Perangkingan dengan metode SAW </h5>
              </div>
              <table class="table">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                    <th width="10%">Alternatif</th>
                    <th width="10%">Rangking</th>
                    <!-- <th>Pewawancara</th> -->
                    
                  </tr>   
                </thead>
                <tbody align="center">               
                  <?php 
                    $i = 1;
                    foreach ($rangking as $rangking) {
                  ?>
                  <tr>  

                    <td><?= $i ?></td>
                    <td>Alternatif <?= $i ?></td>
                    <td><?= $rangking?></td>

                    
                  </tr>
                <?php   $i++; } ?>
                </tbody>
              </table>

          </div>

          <div class="col-sm-4">
                
                <a href="<?=site_url('admin/DataPerhitungan/Rekomendasi/simpan_rekomendasi/')?><?= $idkegiatan?>/<?= $idsie?>"><input type="submit" name="simpan" value="Simpan Hasil" class="btn btn-primary"></a>
                
                
              </div>
 
          <br>
          
          
        </div>          
      </div><!-- nilai -->
    </div>

    <?php $this->load->view('admin/template/footer'); ?>