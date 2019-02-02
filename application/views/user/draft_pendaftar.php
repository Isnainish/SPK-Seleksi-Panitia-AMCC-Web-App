<?php $this->load->view('user/template_usr/headuser'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- dashboard user -->
  <div class="container-fluid" style="background-color: #EEF5F9">
    <div class="row" >
      <div class="col-lg-12" >
        <div class="col-lg-12" >
          <br>
          <!-- Data Pndaftar -->
          <div class="col-lg-12">
            <div class="card-header d-flex align-items-center">
              <p style=" font-size: 18px;">Lakukan penilaian berdasarkan <strong>kegiatan wawancara yang sedang berlangsung</strong>. Pilihlah nama kegiatan dibawah ini :</p>
            </div>
            <div class="card-body" align="center">
              <?php  
              $draftnama = $this->session->userdata('draftnama');
              ?>
              <form action="<?= site_url('user/Pewawancara/doSearchKegiatanP') ?>" method="POST">
                <div class="col-lg-6">
                  <form role="form">
                    <div class="form-group">
                      <select class="form-control" name="id_kegiatan">
                        <option value = "kegiatan"> -- Pilih Nama Kegiatan -- </option>
                        <?php foreach ($namakegiatan->result() as $name) {
                         ?>
                         <option value="<?= $name->id_kegiatan ?>"<?= ($name->id_kegiatan == $draftnama['id_kegiatan'] ? 'selected="selected"' : '') ?>> <?=$name->nama_kegiatan?></option>
                         <?php 
                       }
                       ?>
                     </select>
                   </div>
                   <button type="submit" class="btn btn-info">Pilih</button>
                 </form>         
               </div>
             </form>
           </div>
           <div class="card" style="border: 1px solid #e6e6fa;">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Daftar Peserta
                <strong style="color: #0090d2;">
                  <?php foreach ($namakegiatan->result() as $name) {
                    ?>
                    <?= ($name->id_kegiatan == $draftnama['id_kegiatan'] ? $name->nama_kegiatan : '') ?>

                    <?php
                  }
                  ?>

                </strong></h3>
              </div>
              <div class="card-body">
                <p style="color: #0090d2; font-size: 14px;">Pilihlah daftar peserta dibawah ini berdasarkan nama peserta yang akan dilakukan tes wawancara.</p>
                <table class="table table-striped table-hover">
                  <thead  align="center">
                    <th width="5%">No</th>
                    <th width="45%">Nama Peserta</th>
                  </thead>
                  <tbody  align="center">
                    <?php 
                    $i=1;
                    foreach ($draftPendaftar->result() as $row) {
                      ?>
                      <tr>
                        <th><?= $i?></th>
                        <td>
                          <a href="<?=site_url('user/Pewawancara/Penilaian/')?><?= $row->id_kegiatan?>/<?= $row->id_pendaftar ?>"><?= $row->nama_pendaftar?></a>
                        </td>           
                      </tr>
                      <?php 
                      $i++;
                    }
                    ?>
                  </tbody>
                </table>
              </div> <!-- card-body -->
            </div> <!-- card -->
            <a style="color: white;" href="<?=site_url('user/Pewawancara')?>"><button class="btn btn-secondary btn-sm" style="padding: 10px;">Kembali</button></a>
            <br>
            <br>
          </div><!-- Data Pndaftar -->
          <br>
        </div> 
      </div>

    </div><!-- row -->
    <br>
  </div><!-- container -->

  <?php $this->load->view('user/template_usr/foot'); ?>