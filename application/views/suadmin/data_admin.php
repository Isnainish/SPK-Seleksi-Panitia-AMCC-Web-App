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

    <!-- Data Penialian-->
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12">
          <div class="button">
            <a style="color: white; padding-left: 15px;" href="<?=site_url('suadmin/SuAdmin/tambahAdmin')?>"><button class="btn btn-info btn-sm">Tambah Admin</button></a>
          </div>

          <br>
          <!-- Data Pewawancara -->
          <div class="col-lg-7" >
            <div class="daily-feeds card"> 
              <div class="card-header sidebar-header-shadow">
                <h3 class="h4">Daftar Admin 

                </h3>

              </div>
              <?php foreach ($admin->result() as $row) {
              ?>
              <div class="card-body no-padding">
                <!-- Item-->
                <div class="item">             
                  <div class="feed d-flex justify-content-between"> 
                    
                    <table class="feed-body d-flex justify-content-between"> 
                      <tr>
                        <td width="5%"><a href="#" class="feed-profile"><img src="<?=base_url('assets/img/amcc-logo.png')?>" alt="person" class="img-fluid rounded-circle"></a></td>     
                        <td width="50%">
                          <h3><?=$row->nama?></h3>
                          <h6><?=$row->nama_kegiatan?></h6>
                          <span><?=$row->tanggal?></span>

                          <br>
                          <div class="CTAs">
                            <a href="<?=site_url('suadmin/SuAdmin/DetailAdmin/')?><?=$row->id_detail_user?>" class="btn btn-info">Detail</a>
                            <a href="<?=site_url('suadmin/SuAdmin/UbahAdmin/')?><?= $row->id_detail_user?>" class="btn btn-xs btn-warning">Ubah</a>
                            <a href="<?=site_url('suadmin/SuAdmin/HapusAdmin/')?><?= $row->id_detail_user?>" class="btn btn-xs btn-danger">Hapus</a>
                          </div>
                        </td>

                      </tr>
                    </table>

                  </div>
                </div>

              </div>
              <?php } ?>

            </div>
            <a style="color: white;" href="<?= site_url('suadmin/SuAdmin')?>"><button class="btn btn-secondary btn-sm" style="padding: 10px;"> Kembali</button></a>
          </div>

              </div>          
            </div><!-- row -->
          </div>

          <?php $this->load->view('admin/template/footer'); ?>