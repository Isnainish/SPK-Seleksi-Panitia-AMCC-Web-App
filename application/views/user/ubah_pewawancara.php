<?php $this->load->view('user/template_usr/headuser'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- dashboard user -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12" style="background-color: #EEF5F9;" align="center">
        <br>
        <div class="col-lg-7">
          <div class="card" style="border: 1px solid #e6e6fa; padding-left: 8px; padding-right: 8px;">
            <div class="card-header d-flex align-items-center">
              <h2 class="h4">Ubah Profil Pewawancara</h2>
            </div>
            <div class="card-body">
              <form method="post" action="<?= site_url('user/Pewawancara/doEditPewawancara/'.$edtPewawancara['id_user'])?>">

                <div class="form-group row">
                  <label class="form-control-label">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" value="<?= set_value('nama', $edtPewawancara['nama']) ?>">
                </div>
                <div class="form-group row">
                  <label class="form-control-label">Username</label>
                  <input type="text" class="form-control" name="username" value="<?= set_value('username', $edtPewawancara['username']) ?>">
                </div>
                <div class="form-group row">
                  <label class="form-control-label">Password</label>
                  <input type="text" class="form-control" name="password" value="<?= set_value('password', $edtPewawancara['password']) ?>">
                </div>
                <div class="form-group" align="left">
                  <input type="submit" value="Simpan" class="btn btn-info">
                </div>
              </form>
              <div class="form-group" align="right">       
                <a style="color: white;" href="<?= site_url('user/Pewawancara')?>"><button class="btn btn-secondary btn-sm" style="padding: 10px;"> Batal</button></a>
              </div>

            </div><!-- card-body -->
          </div> <!-- card -->
        </div>

      </div>

    </div> 
  </div>

</div><!-- row -->
<br>
</div><!-- container -->

<?php $this->load->view('user/template_usr/foot'); ?>