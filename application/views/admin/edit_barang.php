  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data
        <small>Tambah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Alert -->
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

      <div class="box box-primary" style="margin-top: 15px;">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit Data</h3>
          <!-- Tombol Kembali -->
          <a href="<?php echo base_url('index.php/admin/pemasukan_barang') ?>" class="btn btn-primary btn-sm pull-right tombol-yakin" data-isiData="Ingin meninggalkan form edit data ini?">
              <div class="fa fa-arrow-left"></div> Kembali
          </a>
        </div>

        <form action="<?= base_url('index.php/admin/pemasukan_barang/update') ?>" method="post">

          <?php foreach ($pemasukan_barang as $pbarang) { ?>
            <div class="box-body">
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="hidden" class="form-control" name="id" value="<?= $id ?>" required>
                <textarea name="namaBarang" class="form-control" rows="5"><?php echo $pbarang->namaBarang; ?></textarea>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Donatur</label>
                    <input type="text" class="form-control" name="donatur" value="<?= $pbarang->donatur ?>" placeholder="Donatur" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" value="<?= $pbarang->tanggal ?>" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="pull-right">
                <button type="reset" class="btn btn-danger">
                  <div class="fa fa-trash"></div> Reset
                </button>
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-save"></i> Update
                </button>
              </div>
            </div>
          <?php } ?>
        </form>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->