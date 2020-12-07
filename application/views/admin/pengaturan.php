  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengaturan
        <small>Pengaturan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengaturan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Alert -->
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

      <!-- Box Data -->
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">Edit Pengaturan</h3>
        </div>

        <form action="<?php echo base_url('index.php/admin/pengaturan/update') ?>" method="POST">
            <?php foreach ($pengaturan as $prn) { ?>
                <div class="box-body">
                    <div class="form-group">
                    <label>Nama Musholla</label>
                    <input type="hidden" value="<?php echo $prn->id; ?>" name="id">
                    <input type="text" name="namaMusholla" class="form-control" value="<?php echo $prn->namaMusholla; ?>" placeholder="Nama Musholla">
                    </div>

                    <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $prn->alamat; ?>" placeholder="Alamat">
                    </div>
                    
                    <div class="form-group">
                    <label>Telp</label>
                    <input type="number" name="telp" class="form-control" value="<?php echo $prn->telp; ?>" placeholder="Telp">
                    </div>
                </div>
            <?php } ?>

            <div class="box-footer">
                <div class="pull-right">
                <button type="reset" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update
                </button>
                </div>
            </div>
        </form>
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->