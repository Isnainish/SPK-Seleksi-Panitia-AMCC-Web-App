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
      <li class="active"><a href="<?=site_url('suadmin/SuAdmin')?>"> <i class="fa fa-tasks"></i>Data Super Admin </a></li>
      <!-- <li><a href="<?=site_url('suadmin/SuAdmin/DataAdmin')?>"> <i class="icon-interface-windows"></i>Data Admin </a></li>
 -->
    </ul>

      
    <ul class="list-unstyled">
      <li class="nav-item"><a href="<?=site_url('auth/Auth/logout_proses')?>" class="nav-link logout"> <i class="fa fa-sign-out">Logout</i></a></li>
    </ul>
  </nav>
  <div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
      <div class="container-fluid">
        <h2 class="no-margin-bottom">Daftar Kepanitiaan di AMCC</h2>
      </div>
    </header>
    <br>
    <!-- Tambah kriteria -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5">
          
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Ubah Kegiatan</h3>
            </div>
            <div class="card-body">
            <form method="post" action="<?= site_url('suadmin/SuAdmin/doEditKegiatan/'.$edtKegiatan['id_kegiatan'])?>">
                      <div class="form-group">
                        <label class="form-control-label">Nama Kegiatan</label>
                        <input type="text" placeholder="nama Kegiatan" class="form-control" name="nama_kegiatan" required value="<?= set_value('nama_kegiatan', $edtKegiatan['nama_kegiatan']) ?>">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Tanggal Pelaksanaan Seleksi</label>
                        <input type="text" placeholder="tanggal pelaksanaan seleksi" class="form-control" name="tanggal" required value="<?= set_value('tanggal', $edtKegiatan['tanggal']) ?>">
                      </div>

                    <div class="form-group">       
                      <input type="submit" value="Simpan" class="btn btn-info">
                      <a style="color: white; " href="<?= site_url('suadmin/SuAdmin/DataKegiatan')?>"><button class="btn btn-secondary btn-sm" style="padding:8px;"> Kembali</button></a>
                    </div>

                  </form>
                  
          </div><!-- card-body -->

        </div><!-- card -->
      </div>
    </div><!-- row -->
  </div> 

  <?php $this->load->view('admin/template/footer'); ?>