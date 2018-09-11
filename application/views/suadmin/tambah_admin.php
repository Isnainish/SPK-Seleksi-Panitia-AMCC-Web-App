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
        <h2 class="no-margin-bottom">Data Pengguna</h2>
      </div>
    </header>
    <br>
    <!-- Tambah kriteria -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5">
          
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Tambah Admin</h3>
            </div>
            <div class="card-body">
            <form method="post" action="<?= base_url() ?>index.php/suadmin/SuAdmin/addAdmin">
              <div class="form-group">
                          <label class="form-control-label">Kepanitiaan</label>
                          <div>
                           <select class="form-control" name="id_kegiatan">
                            <option>-- Pilih Nama Kegiatan --</option>
                            <?php foreach ($kegiatan->result() as $row) {
                            ?>
                              <option value="<?= $row->id_kegiatan ?>"><?= $row->nama_kegiatan ?> </option>

                            <?php
                              }
                            ?>

                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Nama Lengkap Admin</label>
                        <input type="text" placeholder="nama lengkap" class="form-control" name="nama" required>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">username</label>
                        <input type="text" placeholder="username" class="form-control" name="username" required>
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Password</label>
                        <input type="password" placeholder="password" class="form-control" name="password">
                      </div>

                             
                      <input type="submit" value="Simpan" class="btn btn-info"> 
                    
                  </form> 
                  <div class="form-group" align="right">
                  <a style="color: white; margin-bottom: 10px; " href="<?= site_url('suadmin/SuAdmin/DataAdmin')?>"><button class="btn btn-secondary btn-sm" style="padding:8px;text-align: right;"> Kembali</button></a></div>
          </div><!-- card-body -->

        </div><!-- card -->
        
      </div>
    </div><!-- row -->
  </div> 

  <?php $this->load->view('admin/template/footer'); ?>