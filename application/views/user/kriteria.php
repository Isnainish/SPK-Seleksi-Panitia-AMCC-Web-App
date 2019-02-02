<?php $this->load->view('user/template_usr/head'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- informasi kriteria usr -->
  <div class="container-fluid">
    <div class="row">
     <div class="col-lg-12">
      <br>
      <div align="center" class="col-md-12">
        <div class="col-lg-12">
          <div class="card" style="border: 1px solid #e6e6fa;">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Data Kriteria</h3>
            </div>
            <div class="card-body"  >
              <table class="table table-striped table-hover">
                <thead align="center">
                  <tr>
                    <th width="5%">No</th>
                    <th width="30%">Nama kriteria</th>
                    <th width="5%">Kode</th>
                    <th width="15%">Bobot</th>
                    <th width="20%">Keterangan</th>
                  </tr>
                </thead>
                <tbody align="center">
                  <?php 
                  $i = 1;
                  foreach ($draftKriteria as $row) {                    
                    ?>

                    <tr>
                      <th><?= $i ?></th>
                      <td><?= $row->nama_kriteria ?></td>
                      <td><?= $row->kode ?></td>
                      <td><?= $row->bobot ?></td>
                      <td><?= $row->keterangan ?></td>
                    </tr>
                    <?php 
                    $i++;
                  }
                  ?>
                </tbody>
              </table> 
            </div>
          </div> <!-- card -->
        </div>

      </div>
      <div class="col-sm-4" style="margin: 20px;">
        <a style="color: white;" href="<?=site_url('user/Pewawancara')?>"><button class="btn btn-secondary btn-sm" style="padding: 10px;">Kembali</button></a>
      </div>
      <br>
      <br>
    </div>
  </div> <!-- row -->
  <br>
</div> <!-- container -->


<?php $this->load->view('user/template_usr/foot'); ?>