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
      <li><a href="<?=site_url('admin/Beranda')?>"> <i class="icon-home"></i>Beranda </a></li>

      <li><a href="<?=site_url('admin/DataPendaftar/Pendaftar')?>"> <i class="icon-user"></i>Data Pendaftar </a></li>

      <li><a href="<?=site_url('admin/DataKriteria/Kriteria/Kriteria')?>"> <i class="icon-interface-windows"></i>Data Kriteria </a>
      </li>

      <li class="active"><a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"> <i class="icon-interface-windows"></i>Himpunan Kriteria </a>
      </li>

      <li><a href="<?=site_url('admin/DataPerhitungan/Perhitungan')?>"> <i class="icon-padnote"></i>Perhitungan </a></li>

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
        <h2 class="no-margin-bottom">Data Himpunan Kriteria</h2>
      </div>
    </header>
    <br>
    <!-- informasi Kriteria -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <br>
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Ubah Nilai Sub-Kriteria</h3>
            </div>
            <div class="card-body">
            <form method="post" action="<?= site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria/doEditHimpunan/'.$detail['id_himp'])?>">
            <div class="form-group row">
             <label class="col-sm-3 form-control-label">Pilih Kriteria</label>
              <div class="col-sm-4">
                <select class="form-control" name="id_kriteria">
                  <option value = "kriteria"> -- Pilih Kriteria -- </option>
                  <?php foreach ($select_option->result() as $row) {
                  ?>
                      <option value="<?= $row->id_kriteria ?>"<?= ($row->id_kriteria == $detail['id_kriteria'] ? 'selected="selected"' : '') ?>><?= $row->nama_kriteria?> </option>

                  <?php
                    }
                  ?>
                </select>
              </div>
            </div>
             <div class="form-group row">
              <label class="col-sm-3 form-control-label">Nilai</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="nilai_himpunan" value="<?= set_value('nilai_himpunan', $detail['nilai_himpunan']) ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Bobot</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="bobot_himpunan" value="<?= set_value('bobot_himpunan', $detail['bobot']) ?>" >
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Keterangan</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="ket_himpunan" value="<?= set_value('ket_himpunan', $detail['keterangan']) ?>" >
              </div>
            </div>
            <br>
            <div class="form-group row">
              <div class="col-sm-4 offset-sm-3">
                <a href="<?=site_url('admin/DataKriteria/HimpKriteria/Himp_Kriteria')?>"><button type="submit" class="btn btn-primary">Simpan</button></a>
              </div>
            </div>
            </form>
          </div><!-- card-body -->
        </div><!-- card -->

      </div>
    </div><!-- row -->
  </div>

  <?php $this->load->view('admin/template/footer'); ?>