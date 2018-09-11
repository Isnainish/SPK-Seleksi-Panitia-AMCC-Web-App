<?php $this->load->view('user/template_usr/headuser'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- dashboard user -->
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12">
          <div class="col-lg-12" style="background-color: #EEF5F9">
            <div class="card" >
              
              <div class="card-body" align="center" >
                <img style="width: 160px; height: 160px;" src="<?=base_url('assets/img/amcc-logo.png')?>">
                <br>
                <br>
                <p style="font-size: 18px;">
                <strong>Selamat Datang di Sistem Pendukung Keputusan Seleksi Panitia Kegiatan Amikom Computer Club, <br>berikut informasi cara melakukan penilaian :</strong><br></p>
                <p style="font-size: 16px;">1. Silahkan klik tombol Penilaian untuk memulai proses wawancara. <br>
                2. Memilih jenis kegiatan berdasarkan seleksi kepanitiaan yang sedang berlangsung. <br>
                3. Memilih nama pendaftar yang akan dinilai untuk mendapatakan informasi profil pendaftar dan form untuk penilaian. <br>
                4. Untuk mengetahui detail kriteria yang digunakan dalam proses seleksi dapat dilihat dengan meng-klik data pendaftar. <br>
                </p>
                <br>
                <div class="col-sm-4" >
                <div class="form-inline">
                  <div class="col-sm-6" >
                    <a style="color: white;" href="<?=site_url('user/Pewawancara/Kriteria')?>"><button class="btn btn-info" style="padding: 10px;">Data Kriteria</button></a>
                  </div>
                  <div class="col-sm-6" >
                    <a style="color: white;" href="<?=site_url('user/Pewawancara/DataPendaftar')?>"><button class="btn btn-warning" style="padding: 10px;">Data Penilaian</button></a>
                  </div>
                </div>
                <br>
                </div>
                     
              </div>  

            </div>

          </div> 
        </div>

      </div><!-- row -->
      <br>
    </div><!-- container -->

<?php $this->load->view('user/template_usr/foot'); ?>