<?php $this->load->view('user/template_usr/head'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- informasi kriteria usr -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card-body" align="center">
          <br>
          <?php  
          $select = $this->session->userdata('select');
          ?>
          <form action="<?= site_url('user/Pewawancara/doSearchKegiatanK') ?>" method="POST">
            <div class="col-lg-6">
              <form role="form">
                <div class="form-group">
                  <select class="form-control" name="id_kegiatan">
                    <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                    <?php foreach ($namakegiatan as $name) {
                     ?>
                     <option value="<?= $name->id_kegiatan ?>"<?= ($name->id_kegiatan == $select['id_kegiatan'] ? 'selected="selected"' : '') ?>> <?=$name->nama_kegiatan?></option>
                     <?php 
                   }
                   ?>
                 </select>
               </div>
               <button type="submit" class="btn btn-info">Pilih</button>

             </form>         
           </div>
         </form>
         <br>
       </div>
     </div>

     <div class="col-lg-12">
      <br>
      <div align="center" class="col-md-12">
        <div class="col-lg-12">
          <div class="card" style="border: 1px solid #e6e6fa;">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Data Kriteria 
              <strong style="color: #0090d2;">
              <?php foreach ($namakegiatan as $name) {
                ?>
                <?= ($name->id_kegiatan == $select['id_kegiatan'] ? $name->nama_kegiatan : '') ?>

                <?php
              }
              ?>
            
          </strong></h3>
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
                  foreach ($draftKriteria->result() as $row) {                    
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