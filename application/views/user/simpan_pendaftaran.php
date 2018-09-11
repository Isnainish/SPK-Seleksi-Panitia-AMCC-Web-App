<?php $this->load->view('user/template_usr/head'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- penilaian -->
  <div class="container-fluid">
    <div class="row" >
      <div class="col-lg-12">
        <br>
        <div class="card">
          <div class="col-lg-12">
            
            <br>
            <div class="col-lg-12">
              
                <div class="card-body" style="text-align: center; margin-bottom: 120px;">
                  <div>
                     <img style="width: 200px; height: 200px;" src="<?=base_url('assets/img/amcc-logo.png')?>">
                  </div>
                  <br>
                  <p><strong>Terima Kasih,</strong> Telah melakukan pendaftaran.</p>
                  <p>Silahkan klik <a href="">Amikom Computer Club</a> untuk info lebih lanjut. </p>
                  <div class="form-group">       
                  <p>Untuk pendaftaran Panitia Kegiatan Amikom Computer Club silahkan klik </p>
                  <a style="color: white;" href="<?= site_url('user/FormPendaftar')?>"><button class="btn btn-info btn-sm" style="padding: 10px;">DAFTAR</button></a>
                  </div>
                </div><!-- card-body -->
             
            </div>

          </div>
        </div><!-- card -->
      </div>
    </div> <!-- row -->
  </div> <!-- container -->
  <?php $this->load->view('user/template_usr/foot'); ?>