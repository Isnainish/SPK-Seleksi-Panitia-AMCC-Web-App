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
  <div class="col-lg-12">
    <div class="card-header d-flex align-items-center" style="margin-right: 13%; margin-left: 13%;">
      <div class="avatarform">
        <img style="width: 70px; height: 70px; margin-right: 150px;" src="<?=base_url('assets/img/amcc-logo.png')?>" alt=" " class="img-fluid rounded-circle">
      </div>
      <div class="title">
        <h3 class="h4">Form Pendaftaran Seleksi Panitia Kegiatan Amikom Computer Club</h3>
      </div>
    </div> 
    <div class="card-body">
        <p style="color: red; font-size: 12px;"><strong>*Masukkan Data Diri dengan Benar, Cek kembali sebelum di submit !</strong></p>
        <form class="form-horizontal">
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nama Lengkap</label>
            <div class="col-sm-4">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">NIM</label>
            <div class="col-sm-4">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Program Studi</label>
            <div class="col-sm-4">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Alamat</label>
            <div class="col-sm-4">
              <textarea type="text" class="form-control"></textarea>
            </div>
          </div>
          <div class="line"></div>
          <div class="form-group row has-success">
            <label class="col-sm-3 form-control-label">IPK</label>
            <div class="col-sm-4">
              <input type="text" class="form-control is-invalid" placeholder="Isikan IPK Semester terakhir">
            </div>
          </div>
          <div class="line"></div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Keahlian</label>
            <div class="col-sm-4">
              <textarea type="text" class="form-control"></textarea>
            </div>
          </div>
          <div class="line"></div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Pengalaman</label>
            <div class="col-sm-4">
              <textarea type="text" class="form-control"></textarea>
            </div>
          </div>
          <div class="line"></div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Motivasi</label>
            <div class="col-sm-4">
              <textarea type="text" class="form-control"></textarea>
            </div>
          </div>
          <div class="line"></div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nomer HP</label>
            <div class="col-sm-4">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Email</label>
            <div class="col-sm-4">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="line"></div>

          <label style="font-size: 14px;">Pilihlah Posisi yang anda inginkan apabila diterima menjadi anggota Kepanitaan :</label>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Pilihan Posisi 1</label>
            <div class="col-sm-4 select" >
              <select name="account_1" class="form-control">
                <option value = ""> -- Pilihan Posisi -- </option>
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Pilihan Posisi 2</label>
            <div class="col-sm-4 select">
              <select name="account_2" class="form-control">
                <option value = ""> -- Pilihan Posisi -- </option>
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
              </select>
            </div>
          </div>
          <div class="line"></div>
          <div class="form-group row">
            <label for="fileInput" class="col-sm-3 form-control-label">Foto</label>
            <div class="col-sm-4">
              <input id="fileInput" type="file" class="form-control-file">
              <small class="help-block-none">Ukuran foto maksimal 100kb</small>
            </div>
          </div>
          <div class="line"></div>
          <div class="form-group row">
            <div class="col-sm-4 offset-sm-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
    </div><!-- card-body -->
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