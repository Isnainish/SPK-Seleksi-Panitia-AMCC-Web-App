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
    <!-- Sidebar Navidation Menus--><!-- <span class="heading">Main</span> -->
    <ul class="list-unstyled">
      <li><a href="<?=site_url('suadmin/SuAdmin')?>"> <i class="fa fa-tasks"></i>Data Super Admin </a></li>
      <!-- <li class="active"><a href="<?=site_url('suadmin/SuAdmin/DataAdmin')?>"> <i class="icon-interface-windows"></i>Data Admin </a></li> -->
    </ul>

    <ul class="list-unstyled">
      <li class="nav-item"><a href="<?=site_url('auth/Auth/logout_proses')?>" class="nav-link logout"> <i class="fa fa-sign-out">Logout</i></a></li>
    </ul>
  </nav>
  <div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
      <div class="container-fluid">
        <h2 class="no-margin-bottom">Daftar Kepanitiaan di Amikom Computer Club</h2>
      </div>
    </header>
    <br>

    <!-- Data Penialian-->
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12">
          <!-- Data Kepanitiaan -->
          
          <div class="col-lg-8">                           
            <div class="card">

              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Input Data Kegiatan</h3>
              </div>
              <div class="card-body">
                <form class="form-inline" method="post" action="<?= base_url() ?>index.php/suadmin/SuAdmin/addDataKegiatan">
                  <div class="form-group">
                    <input id="inlineFormInput" type="text" placeholder="Nama Kegiatan" name="nama_kegiatan" class="mr-3 form-control">
                  </div>
                  <div class="form-group">
                    <input id="inlineFormInputGroup" type="text" placeholder="Tanggal Seleksi Panitia" name="tanggal" class="mr-3 form-control" >
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-info">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header d-flex align-items-center">       
             <h3 class="h4">Data Kepanitiaan AMCC</h3>
           </div>
           <div class="card-body">
            <table class="table table-striped table-hover">
              <thead align="center">
                <tr>
                  <th width="5%">No</th>
                  <th width="50%">Nama Kegiatan</th>
                  <th width="30%">Tanggal Pelaksanaan Seleksi Panitia</th>
                  <th colspan="2" width="15%">Aksi</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php 
                $i=1;
                foreach ($allkegiatan->result() as $row) {
                  ?>

                  <tr>
                    <th><?= $i?></th>
                    <td><?= $row->nama_kegiatan?></td>
                    <td><?= $row->tanggal?></td>
                    <td>

                      <a href="<?= site_url('suadmin/SuAdmin/ubahKegiatan/')?><?= $row->id_kegiatan?>" class="btn btn-warning btn-sm">Ubah</a>

                      <a href="<?= site_url('suadmin/SuAdmin/hapusKegiatan/')?><?= $row->id_kegiatan?>" class="btn btn-danger btn-sm" >Hapus</a>
                      
                    </tr>
                    <?php $i++; } ?>

                  </tbody>
                </table>
              </div><!-- card-body -->
            </div><!-- card -->
            <a style="color: white; margin-bottom: 10px;" href="<?= site_url('suadmin/SuAdmin')?>"><button class="btn btn-secondary btn-sm" style="padding: 10px;"> Kembali</button></a>

          </div>          
        </div><!-- row -->

      </div>

      <?php $this->load->view('admin/template/footer'); ?>