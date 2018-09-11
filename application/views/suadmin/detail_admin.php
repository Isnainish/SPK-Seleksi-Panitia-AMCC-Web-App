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
        <h2 class="no-margin-bottom">Data Admin</h2>
      </div>
    </header>
    <br>
    <!-- Tambah kriteria -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Info Detail Admin</h3>
            </div>
            
            <?php foreach ($detail_admin->result() as $det) {
            ?>
            <div class="card-body" style="font-size: 18px;">
              <h3 class="h4"><?= $det->nama ?></h3>
              <table class="table table-striped table-hover">
                <tr>
                  <td width="30%"><strong>Ketua Panitia</strong></td>
                  <td width="70%"><?= $det->nama_kegiatan ?></td>        
                </tr>
                <tr>
                  <td width="30%"><strong>Status</strong></td>
                  <td width="70%"><strong>Admin</strong></td>        
                </tr>
                <tr>
                  <td width="30%"><strong>Tanggal Pelaksanaan</strong></td>
                  <td width="70%"><?= $det->tanggal ?></td>        
                </tr>
                <tr>
                  <td width="30%"><strong>username</strong></td>
                  <td width="70%"><?= $det->username ?></td>        
                </tr>
                <tr>
                  <td width="30%"><strong>password</strong></td>
                  <td width="70%"><?= $det->password ?></td>        
                </tr>
              </table>
            </div><!-- card-body -->
            <?php } ?>
            

          </div><!-- card -->
          <a style="color: white; margin-bottom: 10px; " href="<?= site_url('suadmin/SuAdmin/DataAdmin')?>"><button class="btn btn-secondary btn-sm" style="padding:8px;text-align: right;"> Kembali</button></a>
        </div>
      </div><!-- row -->
    </div> 

    <?php $this->load->view('admin/template/footer'); ?>