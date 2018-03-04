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
                <li class="active"><a href="<?=site_url('admin/Beranda')?>"> <i class="icon-home"></i>Beranda </a></li>

                <li><a href="<?=site_url('admin/DataPendaftar/Pendaftar')?>"> <i class="icon-user"></i>Data Pendaftar </a></li>

                <li><a href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria')?>"> <i class="icon-interface-windows"></i>Data Kriteria </a>
                </li>

                <li><a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"> <i class="icon-interface-windows"></i>Himpunan Kriteria </a>
                </li>

                <li><a href="<?=site_url('admin/DataPerhitungan/Perhitungan')?>"> <i class="icon-padnote"></i>Perhitungan </a></li>

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
              <h2 class="no-margin-bottom">Beranda</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom" >
              <div class="container-fluid">
              <div class="col-lg-12">
                <div class="row bg-white has-shadow">

                  <!-- Item -->
                  <div class="col-xl-4 col-sm-4">
                    <div class="item d-flex align-items-center">
                      <div class="icon bg-blue"><i class="icon-user"></i></div>
                      <div class="title"><span>Pendaftar</span>
                        <div class="progress">
                          <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                      </div>
                      <div class="number"><strong>25</strong></div>
                    </div>
                  </div>
                  <!-- Item -->
                  <div class="col-xl-4 col-sm-4">
                    <div class="item d-flex align-items-center">
                      <div class="icon bg-green"><i class="icon-user"></i></div>
                      <div class="title"><span>Pewawancara</span>
                        <div class="progress">
                          <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                        </div>
                      </div>
                      <div class="number"><strong>70</strong></div>
                    </div>
                  </div>
                  <!-- Item -->
                </div>
                </div> 
              </div><!-- container-fluid -->         
          </section>

          <?php $this->load->view('admin/template/footer'); ?>