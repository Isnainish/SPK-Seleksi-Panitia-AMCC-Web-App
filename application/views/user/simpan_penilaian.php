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
              
                <div class="card-body" style="text-align: center; margin-bottom: 80px;">
                  <div>
                     <img style="width: 200px; height: 200px;" src="<?=base_url('assets/img/amcc-logo.png')?>">
                  </div>
                  <br>
                  <p><strong>Terima Kasih,</strong> Telah melakukan penilaian.</p>
                  <p>Silahkan klik <a href="<?= site_url('user/Pewawancara/DataPendaftar')?>">Kembali</a> untuk melakukan penilaian selanjutnya</p>
                  <p>dan Klik <a href="<?= site_url('auth/Auth/logout_proses')?>">Logout</a> untuk keluar.</p>
                </div><!-- card-body -->
             
            </div>

          </div>
        </div><!-- card -->
      </div>
    </div> <!-- row -->
  </div> <!-- container -->
  <?php $this->load->view('user/template_usr/foot'); ?>