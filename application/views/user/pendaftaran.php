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
  <div class="col-lg-12" >
    <div class="card-header d-flex align-items-center" style="margin-right: 13%; margin-left: 13%; background-color: #EEF5F9;" >
      <div class="avatarform">
        <img style="width: 70px; height: 70px; margin-right: 130px;" src="<?=base_url('assets/img/amcc-logo.png')?>" alt=" " class="img-fluid rounded-circle">
      </div>
      <div class="title">
        <h3 class="h4">Form Pendaftaran Seleksi Panitia Kegiatan Amikom Computer Club</h3>
        <div align="center">
          website <small style="color: #0090d2;" class="h4">www.amcc.or.id</small>
        </div>
      </div>

    </div> 
    <div class="card-body" style="margin-left: 15%;">
      <p style="color: red; font-size: 14px;"><strong>*Selamat Datang, Silahkan pilih nama kegiatan dibawah ini jika ingin mendaftar panitia kegiatan di Amikom Computer Club :</strong></p>

      <?php  
      $addkegiatan = $this->session->userdata('addkegiatan');
      ?>
      <!-- pilih nama kegiatan -->
      <form action="<?= site_url('user/FormPendaftar/doSearchKegiatan') ?>" method="POST" style="margin-left: 4%;">
        <div class="col-lg-12">
          <form role="form">
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Kepanitiaan yang diikuti</label>
              <div class="col-sm-5 select">
                <select class="form-control" name="id_kegiatan">
                  <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                  <?php foreach ($kegiatanamcc->result() as $k) {
                    ?>
                    <option value="<?= $k->id_kegiatan ?>" <?= ($k->id_kegiatan == $addkegiatan['id_kegiatan'] ? 'selected="selected"' : '') ?>><?= $k->nama_kegiatan?> </option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            <div class="col-sm-4 offset-sm-3" align="center">
              <button type="submit" class="btn btn-primary">Pilih</button>
            </div>
            </div>
          </form> 

        </div>
      </form>
      <!-- input data pendaftar -->
      <form class="form-horizontal" method="post" action="<?= site_url('user/FormPendaftar/processaddPendaftar/')?><?= $addkegiatan['id_kegiatan']?>" enctype="multipart/form-data" style="margin-left: 5%;">
        <p style="color: red; font-size: 14px;"><strong>*Masukkan Data Diri dengan Benar, Cek kembali sebelum di submit !</strong></p>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Nama Lengkap</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="nama_pendaftar" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">NIM</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="nim" required>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Alamat Asal</label>
          <div class="col-sm-5">
            <textarea type="text" class="form-control" name="alamat" required></textarea>
          </div>
        </div>
        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Email</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="email" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Nomer HP</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="nomer_hp" required>
          </div>
        </div>
        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Program Studi</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="program_studi" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">IPK Semester Terakhir</label>
          <div class="col-sm-5">
            <input type="text" class="form-control label" name="ipk" required>
            <small class="help-block-none">gunakan tanda titik untuk bilangan desimal</small>
          </div>
        </div>
        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Keahlian</label>
          <div class="col-sm-5">
            <textarea type="text" class="form-control" name="keahlian" required></textarea>
          </div>
        </div>
        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Pengalaman</label>
          <div class="col-sm-5">
            <textarea type="text" class="form-control" name="pengalaman" required></textarea>
          </div>
        </div>
        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Motivasi</label>
          <div class="col-sm-5">
            <textarea type="text" class="form-control" name="motivasi" required></textarea>
          </div>
        </div>
        <div class="line"></div>

        <label style="font-size: 14px;"><strong style="color: red;">*WAJIB DIISI</strong><br>Pilihlah Posisi yang anda inginkan apabila diterima menjadi anggota Kepanitaan :</label>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Pilihan Posisi 1</label>
          <div class="col-sm-5 select" >
            <?php  
            $pilihan1 = $this->session->userdata('pilihan1');
            ?>
            <select name="posisi1" class="form-control">
              <option value = "id1"> -- Pilihan Posisi Kepanitiaan -- </option>
              <?php foreach ($select_sie->result() as $sie) {
                ?>

                <option value="<?= $sie->id_sie ?>"<?= ($sie->id_sie == $pilihan1['id_sie'] ? 'selected="selected"' : '') ?>><?= $sie->nama_sie ?> </option>

                <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Pilihan Posisi 2</label>
          <div class="col-sm-5 select" >
            <?php  
            $pilihan2 = $this->session->userdata('pilihan2');
            ?>
            <select name="posisi2" class="form-control">
              <option value = "id2"> -- Pilihan Posisi Kepanitiaan -- </option>
              <?php foreach ($select_sie->result() as $sie) {
                ?>

                <option value="<?= $sie->id_sie ?>"<?= ($sie->id_sie == $pilihan2['id_sie'] ? 'selected="selected"' : '') ?>><?= $sie->nama_sie ?> </option>

                <?php
              }
              ?>
            </select>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Foto</label>
          <div class="col-sm-4">
            <input type="file" class="form-control-file" name="filefoto" id="filefoto" required>
            <small class="help-block-none">Ukuran foto maksimal 100kb</small>
          </div>
        </div>
        <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-4 offset-sm-3">
            <button type="submit" class="btn btn-primary">Daftar</button>
          </div>
        </div>
      </form>
      </div><!-- card-body -->

      <div class="card-footer" style="margin-right: 13%; margin-left: 13%; background-color: white;" >        
        <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
        </div>
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