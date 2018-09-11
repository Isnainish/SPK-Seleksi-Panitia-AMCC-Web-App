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

     <li class="active"><a href="<?=site_url('admin/Pewawancara')?>"> <i class="icon-user"></i>Data Pewawancara </a></li>

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
        <h2 class="no-margin-bottom">Data Pewawancara Panitia Kegiatan AMCC</h2>
      </div>
    </header>


          <!-- informasi Kegiatan -->
          <div class="container-fluid">
            <div class="row" >
            
              <!-- input kegiatan -->
              <div class="col-md-12" align="center">
                <div class="row-mt">
                  <br>
                  
                  <?php  
                    $pilihkegiatan = $this->session->userdata('pilihkegiatan');
                  ?>
                  <form action="<?= site_url('admin/Pewawancara/doSearchKegiatan') ?>" method="POST">
                    <div align="center" class="col-lg-6">
                      <form role="form">
                        <div class="form-group">
                          <select class="form-control" name="id_kegiatan">
                            <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                            <?php foreach ($select->result() as $row) {
                            ?>
                              <option value="<?= $row->id_kegiatan ?>" <?= ($row->id_kegiatan == $pilihkegiatan['id_kegiatan'] ? 'selected="selected"' : '') ?>><?= $row->nama_kegiatan?> </option>
                              <?php
                              }
                            ?>
                          </select>
                        </div>
                        <button  type="submit" class="btn btn-info">Pilih</button>
                      </form>         
                    </div>
                  </form>
                </div>
              </div>  
              <br>
              <!-- informasi pewawancara -->
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12" >
                    <br>
                    <div class="button">
                      <a style="color: white; padding-left: 15px;" href="<?=site_url('admin/Pewawancara/tambahPewawancara')?>"><button class="btn btn-info btn-sm">Tambah Pewawancara</button></a>
                    </div>

                    <br>
                    <!-- Data Pewawancara -->
                    <div class="col-lg-7" >
                      <div class="daily-feeds card"> 
                        <div class="card-header sidebar-header-shadow">
                          <h3 class="h4">Daftar Pewawancara 
                          <?php foreach ($select->result() as $row) {
                            ?>
                             <?= ($row->id_kegiatan == $pilihkegiatan['id_kegiatan'] ? $row->nama_kegiatan : '') ?>

                            <?php
                          }
                          ?>
                          </h3>
                          
                        </div>
                        <?php foreach ($listPewawancara->result() as $list) {
                        ?>   
                        <div class="card-body no-padding">
                          <!-- Item-->
                          <div class="item">             
                            <div class="feed d-flex justify-content-between"> 
                                                  
                              <table class="feed-body d-flex justify-content-between"> 
                                <tr>
                                <td width="5%"><a href="#" class="feed-profile"><img src="<?=base_url('assets/img/amcc-logo.png')?>" alt="person" class="img-fluid rounded-circle"></a></td>     
                                <td width="50%">
                                  <h5><?=$list->nama ?></h5>
                                  <span><?=$list->nama_level?></span> 
                                  <br>
                                    <div class="CTAs">
                                    <a href="<?=site_url('admin/Pewawancara/detailPewawancara/')?><?=$list->id_detail_user?>" class="btn btn-xs btn-info">Detail</a>
                                    <a href="<?=site_url('admin/Pewawancara/ubahPewawancara/')?><?=$list->id_detail_user?>" class="btn btn-xs btn-warning">Ubah</a>
                                    <a href="<?=site_url('admin/Pewawancara/hapusPewawancara/')?><?=$list->id_detail_user?>" class="btn btn-xs btn-danger">Hapus</a>
                                  </div>
                                  </td>
                              
                              </tr>
                            </table>
                              
                            </div>
                          </div>

                          

                        </div>
                        <?php } ?>
                      </div>
                    </div>
                   

                  </div>
                </div><!-- row -->
              </div>

            </div><!-- row -->
          </div> 

          <?php $this->load->view('admin/template/footer'); ?>