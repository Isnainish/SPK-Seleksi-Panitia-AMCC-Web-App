<?php $this->load->view('user/template_usr/head'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- penilaian -->
  <div class="container-fluid">
    <div class="row" >
      <div class="col-lg-12">
        <br>
        <div class="card">
          <div class="col-lg-12">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Data Penilaian</h3>
            </div>
            <br>
            <!-- Detail Pndaftar -->
            <div class="col-lg-12">
              <div class="card" style="border: 1px solid #e4e4fa;">
                  <div class="card-header d-flex align-items-center" >
                    <h5>Detail Data Peserta</h5>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped table-hover"">
                      <tr>
                        <td>Nama Peserta</td>
                        <td></td>           
                      </tr>
                      <tr>
                        <td>NIM</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Program Studi</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>IPK</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>No. HP</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Keahlian</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Pengalaman</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Motivasi</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Pilihan Posisi 1</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Pilihan Posisi 2</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>IPK</td>
                        <td></td>
                      </tr>
                    </table>
                  </div><!-- card-body -->
              </div> <!-- card -->
            </div>

            <!-- penilaian -->
            <div class="card-header d-flex align-items-center">
              <h5>Form Penilaian</h5>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Nilai Attitude</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Nilai Loyalitas</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Nilai Kemampuan Kerjasama Tim</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Nilai Loyalitas</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Nilai Keahlian</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Nilai Pengalaman</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Nilai Motivasi</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Nilai IPK</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="line"></div>
              <div class="form-group row">
                <div class="col-sm-4 offset-sm-3">
                  <a href=""><button type="submit" class="btn btn-primary">Submit</button></a>
                </div>
              </div>
            </div>
            <!-- end penilaian -->

          </div>
        </div><!-- card -->
      </div>
    </div> <!-- row -->
</div> <!-- container -->
  <?php $this->load->view('user/template_usr/foot'); ?>