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
        <h3 class="h4">Selamat Datang, di halaman super admin <span style="color:#007bff"><strong>SPK</strong> Seleksi Panitia Kegiatan AMCC</span></h3>
      </div>
    </header>
    <br>
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12">
          <form role="form">
            <div class="form-inline" >
              <!-- profile suadmin -->
              <div class="col-lg-5">
                <div class="client card">
                  <div class="card-body text-center">
                    <div class="client-avatar"><img src="<?=base_url('assets/img/amcc-logo.png')?>" alt="..." class="img-fluid rounded-circle">
                      <div class="status bg-green"></div>
                    </div>
                    <?php $nama = $this->session->userdata('nama'); ?>
                    <div class="client-title">
                      <h3><?=print_r('nama') ?></h3>
                      <span>Ketua Umum<br>Amikom Computer Club</span><a href="#">Super Admin</a>
                    </div>
                    <br>
                    <div class="client-info">
                      <div class="row">
                        <div class="col-4"><strong><a href="<?=site_url('suadmin/SuAdmin')?>" data-toggle="modal" data-target="#myModal">Detail</a></strong><br><small></small></div>
                        <!-- Modal-->
                        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                          <div role="document" class="modal-dialog">
                            <div class="modal-content">
                              <?php foreach ($ProfileSuad as $suad) {
                                ?>
                                <div class="modal-body">
                                  <h3 class="h4" style="color:#007bff;">Ketua Umum <br>Amikom Computer Club</h3>

                                  <table class="col-lg-12">
                                    <tr>
                                      <td width="40%"><strong>Nama Lengkap</strong></td>
                                      <td width="60%"><?= $suad->nama?></td>        
                                    </tr>
                                    <tr>
                                      <td width="40%"><strong>Status</strong></td>
                                      <td width="60%"><strong>Super Admin</strong></td>        
                                    </tr>
                                    <tr>
                                      <td width="40%"><strong>username</strong></td>
                                      <td width="60%"><?= $suad->username?></td>        
                                    </tr>
                                    <tr>
                                      <td width="40%"><strong>password</strong></td>
                                      <td width="60%"><?= $suad->password?></td>        
                                    </tr>

                                  </table>
                                </div>
                              <?php } ?>
                                <div class="modal-footer">
                                  <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                                </div>
                            </div>
                          </div>
                        </div>
                          <!-- end detail -->
                        <div class="col-4"><strong></strong><br><small></small></div>
                        <!-- Ubah -->
                        <div class="col-4"><strong><a href="<?=site_url('suadmin/SuAdmin/UbahSuad')?>">Ubah</a></strong>
                        </div>
                        <!-- end ubah -->
                      </div>
                    </div>
                    <br>
                    <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div>

                <!-- content -->
                <div class="statistics col-lg-3 col-12">
                  <div class="statistic d-flex align-items-center bg-white has-shadow" > 
                    <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                    <a href="<?=site_url('suadmin/Suadmin/DataKegiatan')?>">
                      <div class="text"><strong><?=$jmlkegiatan?></strong><br><small>Data Kegiatan</small></div></a>
                    </div>

                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                      <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                      <a href="<?=site_url('suadmin/Suadmin/DataAdmin')?>"><div class="text"><strong><?=$jmladmin?></strong><br><small>Data Admin</small></div></a>
                    </div>
                  </div>


                </div>
              </form>



            </div>          
          </div><!-- row -->
        </div>

        <?php $this->load->view('admin/template/footer'); ?>