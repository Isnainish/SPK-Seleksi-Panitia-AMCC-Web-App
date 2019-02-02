<?php $this->load->view('admin/template/header'); ?>

<div class="page-content d-flex align-items-stretch"> 
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="<?=base_url('assets/img/amcc-logo.png')?>" alt="" class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h4">AMCC</h1>
        <p>Seleksi Panitia Kegiatan</p>
      </div> 
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
      <li><a href="<?=site_url('admin/Beranda')?>"> <i class="icon-home"></i>Beranda</a></li>

      <li><a href="<?=site_url('admin/DataPendaftar/Pendaftar')?>"> <i class="icon-user"></i>Data Pendaftar </a></li>

      <li><a href="<?=site_url('admin/Pewawancara')?>"> <i class="icon-user"></i>Data Pewawancara </a></li>

      <li><a href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria')?>"> <i class="icon-interface-windows"></i>Data Kriteria </a>
      </li>

      <li><a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"> <i class="icon-interface-windows"></i>Data Himpunan Kriteria </a>
      </li>

      <li class="active"><a href="<?=site_url('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi')?>"> <i class="icon-interface-windows"></i>Data Posisi Kepanitiaan </a>
      </li>

      <li><a href="<?=site_url('admin/DataPerhitungan/Perhitungan')?>"> <i class="icon-padnote"></i>Data Perhitungan </a></li>

      <li><a href="<?=site_url('admin/DataPerhitungan/Rekomendasi')?>"> <i class="icon-padnote"></i> Data Rekomendasi Posisi </a></li>

      <li><a href="<?=site_url('admin/DataHasil/Hasil')?>"> <i class="fa fa-bar-chart"></i>Hasil </a></li>

    </ul>
    <ul class="list-unstyled">
      <li class="nav-item"><a href="<?=site_url('auth/Auth')?>" class="nav-link logout"> <i class="fa fa-sign-out">Logout</i></a></li>
    </ul>
  </nav>
  <div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
      <div class="container-fluid">
        <h3 class="h4" class="no-margin-bottom">Data Nilai Kriteria pada Sie-Kepanitiaan
        <strong style="color: #0090d2;"><?php foreach ($sie->result() as $ambilnama) {
        ?>
        <?= $ambilnama->nama_kegiatan?>
        <?php  } ?> </strong>
        </h3>
      </div>
    </header>
    <br>
    <!-- informasi Kriteria -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7">
          <div class="card"> 
           <div class="card-header d-flex align-items-center">
              <h3 class="h4">Ubah Nilai Kriteria Pada <strong style="color: #0090d2;">
              <?php foreach ($sie->result() as $ambilnama) { ?>
                <?= $ambilnama->nama_sie?>
              <?php  } ?> </strong></h3>
            </div>
            <div class="card-body">
              <form method="post" action="<?= site_url('admin/DataKriteria/KriteriaPosisi/DetailPosisi/doEditDetailPos/'.$select['id_kriteria_posisi'])?>">

                <div class="form-group" <?php  echo "hidden"; ?>>
                  <label class="form-control-label">Kepanitiaan</label>
                  <div>

                    <input type="text" class="form-control" name="id_kegiatan" value="<?= set_value('id_kegiatan', $select['id_kegiatan']) ?>" >
                  </div>
                </div>
                <div class="form-group" <?php  echo "hidden"; ?>>
                  <label class="form-control-label">Nama Sie-Panitia</label>
                  <div>
                    <input type="text" class="form-control" name="id_sie" value="<?= set_value('nama_sie', $select['id_sie']) ?>" >
                  </div>
                </div>

                <div class="form-group">
                 <label class="form-control-label">Pilih Kriteria</label>
                 <div>
                  <select class="form-control" name="id_kriteria">
                    <option value = "kriteria"> -- Pilih Kriteria -- </option>
                    <?php foreach ($select_kriteria as $row) {
                      ?>
                      <option value="<?= $row->id_kriteria ?>"<?= ($row->id_kriteria == $select['id_kriteria'] ? 'selected="selected"' : '') ?>><?= $row->kode?> <?= $row->nama_kriteria ?> </option>

                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label class="form-control-label">Bobot</label>
                  <select class="form-control" name="bobot">
                    <option><?= set_value('bobot', $select['bobot']) ?></option>
                    <option value="">-- Pilihan Bobot Kriteria --</option>
                    <option value="1"> 1 [Sangat rendah] </option>
                    <option value="2"> 2 [Rendah] </option>
                    <option value="3"> 3 [Cukup] </option>
                    <option value="4"> 4 [Tinggi] </option>
                    <option value="5"> 5 [Sangat Tinggi] </option>
                  </select>
                </div>
              <div class="form-group">
                <div>
                  <input type="submit" name="simpan_kriteria" value="Simpan" class="btn btn-primary"/>
                </div>
              </div>
            </form>
            <div class="form-group" align="right">
               <a style="color: white;" href="<?= site_url('admin/DataKriteria/KriteriaPosisi/DetailPosisi/DetailKritPosisi/')?><?= $select['id_kegiatan']?>/<?=$select['id_sie']?>"><button class="btn btn-secondary btn-sm" style="padding: 8px;"> Kembali</button></a>
            </div>
          </div><!-- card-body -->
        </div><!-- card -->

      </div>
    </div><!-- row -->
  </div>

  <?php $this->load->view('admin/template/footer'); ?>