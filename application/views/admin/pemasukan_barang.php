  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pemasukan Barang
        <small>Pemasukan Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pemasukan Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Alert -->
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

      <!-- Button input -->
      <a href="<?php echo base_url('index.php/admin/pemasukan_barang/tambahData') ?>" class="btn btn-primary">
          <div class="fa fa-plus"></div> Tambah Data
      </a>

     <!-- Button Cetak -->
     <button class="btn btn-success" data-toggle="modal" data-target="#cetakData">
        <div class="fa fa-print"></div> Cetak Data
     </button>
      <!-- data informasi -->
      <table style="margin-top: 15px;">
        <tr>
          <td width="120px">Jumlah Donatur</td>
          <td width="5%"> : </td>
          <td>
            <?php
              $jumlahdonatur = $this->db->query("SELECT donatur FROM tb_pemasukan_barang ")->num_rows();
              echo $jumlahdonatur;
            ?>
            Donatur
          </td>
        </tr>
      </table>

      <div class="box box-primary" style="margin-top: 15px;">
        <div class="box-body">
          <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered table-sm" id="example1">
              <thead>
                <tr>
                  <th width="5px">No.</th>
                  <th>Nama Barang</th>
                  <th>Donatur</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                $no = 1;
                foreach ($pemasukan_barang as $puang) {
                ?>
                <tr>
                  <td><?= $no++; ?>.</td>
                  <td><?= $puang->namaBarang ?></td>
                  <td><?= $puang->donatur ?></td>
                  <td><?= date('d-M-Y', strtotime($puang->tanggal)) ?></td>
                  <td>
                    <a href="<?php echo base_url('index.php/admin/pemasukan_barang/edit/'.$puang->id ) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>

                    <a href="<?php echo base_url('index.php/admin/pemasukan_barang/delete/'.$puang->id ) ?>" class="btn btn-danger btn-sm tombol-yakin" data-isiData="Ingin menghapus data pemasukan barang ini ?"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal Cetak Data -->
  <div class="modal fade" id="cetakData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><div class="fa fa-print"></div> Cetak Data</h4>
        </div>
        <form action="<?php echo base_url('index.php/admin/pemasukan_barang/print') ?>" method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Dari Tanggal</label>
                  <input type="date" class="form-control" name="tgl_awal" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sampai Tanggal</label>
                  <input type="date" class="form-control" name="tgl_akhir" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
            <button type="submit" class="btn btn-primary"><div class="fa fa-print"></div> Print</button>
          </div>
        </form>
      </div>
    </div>
  </div>