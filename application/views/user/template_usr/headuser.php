<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>S P K Seleksi Panitia Kegiatan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/amcc-logo.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand -->
                <a href="index.html" class="navbar-brand">
                  <div class="brand-text brand-big"><span>S P K Seleksi</span><strong> Panitia Kegiatan</strong></div>
                  </a>
              </div>
              
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                <li class="nav-item d-flex align-items-center" style="margin-top: 10px;">
                  <h4>Hi, <?= $this->session->userdata['auth_session']['nama'];?></h4>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('user/Pewawancara/UbahPewawancara/')?><?= $this->session->userdata['auth_session']['id_user'];?>"><i class="icon-user"></i><span class="badge bg-red">1</span></a>
                 
                </li>


                <!-- Logout    -->
                <li class="nav-item" style="margin-left: 25px; margin-top : 10px;"><h4><a href="<?=site_url('auth/Auth/logout_proses')?>" class="nav-link logout"> <i class="fa fa-sign-out">Logout</i></a></h4></li>
              </ul>



            </div>

              
              <!-- Navbar Menu -->
            </div>
          </div>

        </nav>
      </header>
