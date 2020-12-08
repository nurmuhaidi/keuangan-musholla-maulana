  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pemasukan Uang
        <small>Pemasukan Uang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pemasukan Uang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Alert -->
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

      <!-- Button input -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah Data</button>
      <a href="<?php echo base_url('index.php/admin/pemasukan_uang/print') ?>" class="btn btn-success">
          <div class="fa fa-print"></div> Cetak Data
      </a>
      <!-- data informasi -->
      <table style="margin-top: 15px;">
        <tr>
          <td width="120px">Jumlah Donatur</td>
          <td width="15px"> : </td>
          <td>
            <?php
              $jumlahdonatur = $this->db->query("SELECT donatur FROM tb_pemasukan_uang ")->num_rows();
              echo $jumlahdonatur;
            ?>
            Donatur
          </td>
        </tr>
        <tr>
          <td>Total Pemasukan</td>
          <td> : </td>
          <td>
            <?php
            $totalpemasukan = $this->db->query("SELECT sum(jumlah) AS total FROM tb_pemasukan_uang ")->result();
            foreach ($totalpemasukan as $totaluang) {
              echo "Rp. ". number_format($totaluang->total,0,',','.');
            }
            ?>
          </td>
        </tr>
      </table>

      <div class="box box-primary" style="margin-top: 15px;">
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" id="example1">
              <thead>
                <tr>
                  <th width="5px">No.</th>
                  <th>Jumlah</th>
                  <th>Donatur</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                  $no = 1;
                  foreach ($pemasukan_uang as $puang) {
                ?>

                <tr>
                  <td><?= $no++; ?>.</td>
                  <td><?= "Rp. ". number_format($puang->jumlah,0,',','.') ?></td>
                  <td><?= $puang->donatur ?></td>
                  <td><?= date('d-M-Y', strtotime($puang->tanggal)) ?></td>
                  <td>
                    <!-- Tombol Edit -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $puang->id ?>">
                      <i class="fa fa-edit"></i> Edit
                    </button>
                    <!-- Tombol Delete -->
                    <a href="<?php echo base_url('index.php/admin/pemasukan_uang/delete/'.$puang->id ) ?>" class="btn btn-danger btn-sm tombol-yakin" data-isiData="Ingin menghapus data pemasukan ini?">
                      <i class="fa fa-trash"></i> Delete
                    </a>
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

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><div class="fa fa-plus"></div> Tambah Data</h4>
        </div>
        <form action="<?php echo base_url('index.php/admin/pemasukan_uang/insert') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" placeholder="1000000" required>
            </div>
            <div class="form-group">
                <label>Donatur</label>
                <input type="text" class="form-control" name="donatur" placeholder="Donatur" required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
            <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Data -->
  <?php foreach ($pemasukan_uang as $puang) {?>
    <div class="modal fade" id="edit<?php echo $puang->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><div class="fa fa-plus"></div> Edit Data</h4>
          </div>
          <form action="<?php echo base_url('index.php/admin/pemasukan_uang/update') ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                  <label>Jumlah</label>
                  <input type="hidden" class="form-control" name="id" value="<?php echo $puang->id ?>" placeholder="Rp xxx.xxx" required>
                  <input type="number" class="form-control" name="jumlah" value="<?php echo $puang->jumlah ?>" placeholder="Rp xxx.xxx" required>
              </div>
              <div class="form-group">
                  <label>Donatur</label>
                  <input type="text" class="form-control" name="donatur" value="<?php echo $puang->donatur ?>" placeholder="Donatur" required>
              </div>
              <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control" name="tanggal" value="<?php echo $puang->tanggal ?>" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
              <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
