<?php $this->load->view('user/template_usr/head'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- dashboard user -->
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12">
          <div class="col-lg-12">
            <!-- Data peserta yang lolos-->
            <div class="col-lg-12">
              <br>
              <div class="card" style="border: 1px solid #e6e6fa;">

                <div class="card-header d-flex align-items-center">
                  <h3 class="h4" align="center">Pengumuman Hasil Seleksi</h3>
                </div>

                <div class="card-body">
                  <p style="color: #000; font-size: 18px;"> <strong>Selamat,</strong> 
                  kepada peserta panitia kegiatan di Amikom Computer Club yang telah lolos seleksi, dan yang belum lolos jangan berkecil hati ya, masih banyak event di AMCC pantau terus  informasinya di website <a href="http://www.amcc.or.id"><strong>http://amcc.or.id</strong></a> dan di instagramnya AMCC @amccamikom.<br><br>Berikut Daftar nama peserta yang lolos menjadi panitia kegiatan di Amikom Computer Club : </p>
                  <table class="table table-striped table-hover">
                      <thead  align="center">
                        <th width="5%">No</th>
                        <th width="45%">Nama Peserta</th>
                      </thead>

                      <tbody  align="center">
                      <?php 
                      $i=1;
                      foreach ($pengumuman as $val) {
                       ?>
                       <tr>
                         <td><?= $i?></td>
                         <td><?= $val['nama_pendaftar']?></td>
                       </tr>
                       <?php $i++; } ?>
                      </tbody>
                  </table>

                  <p style="color: #000; font-size: 18px;">Terimakasih kepada seluruh peserta yang telah berpartisipasi. Tetap semangat! <h5>Learning By Doing Learling By Teaching</h5></p>
                </div> <!-- card-body -->

              </div> <!-- card -->
            </div><!-- Data lolos-->
            <br>
          </div> 
        </div>

      </div><!-- row -->
      <br>
    <br>
      <br>
    </div><!-- container -->
    
<?php $this->load->view('user/template_usr/foot'); ?>