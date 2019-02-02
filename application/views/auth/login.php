<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK Seleksi Panitia Kegiatan</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?> ">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?> ">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="<?=base_url('assets/css/fontastic.css')?> ">
  <!-- Google fonts - Poppins -->
  <link rel="stylesheet" href="<?=base_url('assets/https://fonts.googleapis.com/css?family=Poppins:300,400,700')?> ">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="<?=base_url('assets/css/style.default.css" id="theme-stylesheet')?> ">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="<?=base_url('assets/css/custom.css')?> ">
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?=base_url('assets/img/amcc-logo.png')?> ">
</head>
<body>
  <div class="page login-page">
    <div class="container d-flex align-items-center">
      <div class="form-holder has-shadow">
        <div class="row">
          <!-- Logo & Information Panel-->
          <div class="col-lg-6">
            <div class="info d-flex align-items-center">
              <div class="content">
                <div class="logo">
                  <h1>Selamat Datang,</h1>
                </div>
                <h5 style="font-size: 16px;">Di Sistem Pendukung Keputusan Seleksi Panitia Kegiatan</h5>
                <strong style="color: #000; font-size: 22px;">AMIKOM COMPUTER CLUB</strong><br>
                <p style="font-size: 10px;">Universitas Amikom Yogyakarta</p>
              </div>
            </div>
          </div>
          <!-- Form Login    -->
          <div class="col-lg-6 bg-white">
            <div class="form d-flex align-items-center">
              <div class="content">
                <form id="login-form" method="post" action="<?= site_url('auth/Auth/login_process')?>">
                  <div class="form-group">
                    <input id="login-username" type="text" name="user" class="input-material" placeholder="Username" required>
                  </div>

                  <div class="form-group">
                    <input id="login-password" type="password" name="pass" class="input-material" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                <select class="form-control" name="jabatan">
                  <option value = "kegiatan"> -- Pilih Jabatan -- </option>
                  <?php foreach ($level->result() as $level) {
                  ?>
                    <option value="<?= $level->id_level ?>"><?= $level->nama_level?> </option>
                    <?php
                    }
                  ?>
                </select>
              </div>
                  <input type="submit" name="login" class="btn btn-primary" value="Login">
                </form>
              </div>
            </div>
          </div>
          <!-- end Form Login    -->
        </div>
      </div>
    </div>
    <div class="copyrights text-center">
      <p>Suported By <strong><a href="https://www.amcc.or.id" class="external" style="color: #000;">Amikom Computer Club</a></strong>
      </p>
    </div>
  </div>
  <!-- Javascript files-->
  <script src="<?=base_url('assets/https://code.jquery.com/jquery-3.2.1.min.js')?> "></script>
  <script src="<?=base_url('assets/vendor/popper.js/umd/popper.min.js')?> "> </script>
  <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?> "></script>
  <script src="<?=base_url('assets/vendor/jquery.cookie/jquery.cookie.js')?> "> </script>
  <script src="<?=base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>
  <script src="<?=base_url('assets/vendor/jquery-validation/jquery.validate.min.js')?> "></script>
  <!-- Main File-->
  <script src="<?=base_url('assets/js/front.js')?> "></script>
</body>
</html>