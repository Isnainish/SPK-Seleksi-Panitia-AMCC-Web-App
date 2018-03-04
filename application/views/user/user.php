<?php $this->load->view('user/template_usr/head'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- dashboard user -->
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12">
          <div class="col-lg-12">
            <div class="form-group row">
              <div class="col-sm-4" style="margin: 20px;">
                <a style="color: white;" href="<?=site_url('user/KriteriaUser')?>"><button class="btn btn-info btn-sm" style="padding: 10px;">Data Kriteria</button></a>
              </div>
            </div>
            <!-- Data Pndaftar -->
            <div class="col-lg-12">
              <div class="line-chart-example card" style="border: 1px solid #e6e6fa;">
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Daftar Peserta</h3>
                </div>
                <div class="card-body">
                  <p style="color: #0090d2; font-size: 12px;">Pilihlah daftar peserta dibawah ini berdasarkan nama peserta yang akan dilakukan tes wawancara.</p>
                  <table class="table table-striped table-hover">
                    <tr align="center">
                      <td width="5%">No</td>
                      <td width="45%"><a href="<?=site_url('user/Penilaian')?>">Nama Peserta</a></td>           
                    </tr>
                  </table>
                </div> <!-- card-body -->
              </div>
            </div><!-- Data Pndaftar -->
          </div> 
        </div>
      </div><!-- row -->
    </div><!-- container -->

    <?php $this->load->view('user/template_usr/foot'); ?>