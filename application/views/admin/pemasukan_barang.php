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

      <a href="<?php echo base_url('index.php/admin/pemasukan_barang/print') ?>" class="btn btn-success">
          <div class="fa fa-print"></div> Cetak Data
      </a>

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

                    <a href="<?php echo base_url('index.php/admin/pemasukan_barang/delete/'.$puang->id ) ?>" class="btn btn-danger btn-sm tombol-yakin"><i class="fa fa-trash"></i> Delete</a>
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