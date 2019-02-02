<?php $this->load->view('user/template_usr/head'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- penilaian -->
  <div class="container-fluid" >
    <div class="row" >
      <div class="col-lg-12">
        <br>
        <div class="card">
          <div class="col-lg-12">
            <div class="card-header d-flex align-items-center" >
              <h3 class="h4">Data Penilaian</h3>
            </div>
            <br>
            <!-- Detail Pndaftar -->
            <div align="center">
              <div class="col-lg-10">
                <div class="card" style="border: 1px solid #e4e4fa;">
                  <div class="card-header d-flex align-items-center" >
                    <h5>Detail Data Peserta</h5>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped table-hover"">
                      <?php 
                      foreach ($draftPenilaian->result() as $row) {                    
                        ?>
                        <tr>
                            <img style="width: 150px; height: 150px;" src="<?= base_url()?>assets/foto/<?=$row->filefoto?>">                    
                        </tr>
                        <tr>
                          <td>Nama Peserta</td>
                          <td><?= $row->nama_pendaftar ?></td>           
                        </tr>
                        <tr>
                          <td>NIM</td>
                          <td><?= $row->nim ?></td>
                        </tr>
                        <tr>
                          <td>Program Studi</td>
                          <td><?= $row->program_studi ?></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><?= $row->email ?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><?= $row->alamat ?></td>
                        </tr>
                        <tr>
                          <td>IPK</td>
                          <td><?= $row->ipk ?></td>
                        </tr>
                        <tr>
                          <td>No. HP</td>
                          <td><?= $row->nomer_hp ?></td>
                        </tr>
                        <tr>
                          <td>Keahlian</td>
                          <td><?= $row->keahlian ?></td>
                        </tr>
                        <tr>
                          <td>Pengalaman</td>
                          <td><?= $row->pengalaman ?></td>
                        </tr>
                        <tr>
                          <td>Motivasi</td>
                          <td><?= $row->motivasi ?></td>
                        </tr>
                        <tr>
                          <td>Pilihan Posisi 1</td>
                          <td>
                            <?= $row->pos1 ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Pilihan Posisi 2</td>
                          <td>
                            <?= $row->pos2?>
                          </td>
                        </tr>
                        
                        <?php 
                      }
                      ?>
                    </table>
                  </div><!-- card-body -->
                </div> <!-- card -->

              </div>
            </div>
            <!-- end -->
            <div class="card-header d-flex align-items-center" style="background-color: #f8f9fa;">
              <h5>Form Penilaian<br><small>penilaian dimulai dari 1 hingga 100</small></h5>
            </div>
            <div class="card-body" style="background-color: #f8f9fa;">
              <form method="post" action="<?= base_url() ?>index.php/user/Pewawancara/addPenilaian/<?= $id_kegiatan ?>/<?= $id_pendaftar ?>">

                <div class="line"></div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Nilai Attitude</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="c1" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Nilai Loyalitas</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="c2" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Nilai Kemampuan Kerjasama Tim</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="c3" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Nilai Keahlian</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="c4" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Nilai Pengalaman</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="c5" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Nilai Motivasi</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="c6" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Nilai IPK<br><small>masukkan sesuai nilai IPK pendaftar</small></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="c7" required>
                    <small>bilangan desimal gunakan tanda titik</small>
                  </div>
                </div>
                <div class="line"></div>
                
                  <div class="col-sm-4 offset-sm-3" >
                    <a href=""><button type="submit" class="btn btn-info">Simpan</button></a>
                  </div>
                
              </form>
              <br>
              <div class="form-group" align="right" >
                <a style="color: white;" href="<?=site_url('user/Pewawancara/DataPendaftar')?>"><button class="btn btn-secondary btn-sm" style="padding: 10px;">Kembali</button></a>
              </div>
              <br>
            </div>
            <!-- end penilaian -->

          </div>
        </div><!-- card -->
      </div>

    </div> <!-- row -->
  </div> <!-- container -->
  <?php $this->load->view('user/template_usr/foot'); ?>
