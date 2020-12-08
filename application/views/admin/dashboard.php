  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6">
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>
                    <?php
                      $totalpemasukan = $this->db->query("SELECT sum(jumlah) AS total FROM tb_pemasukan_uang ")->result();
                      foreach ($totalpemasukan as $totaluang) {
                        $totalpemasukanuang = $totaluang->total;
                        echo "Rp. ". number_format($totaluang->total,0,',','.');
                      }
                    ?>
                  </h3>
                  <p>Total Pemasukan Uang</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="<?php echo base_url('index.php/admin/pengeluaran_uang') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>
                    <?php
                      $totalpengeluaran = $this->db->query("SELECT sum(jumlah) AS total FROM tb_pengeluaran_uang ")->result();
                      foreach ($totalpengeluaran as $totaluang) {
                        $totalpengeluaranuang = $totaluang->total;
                        echo "Rp. ". number_format($totaluang->total,0,',','.');
                      }
                    ?>
                  </h3>
                  <p>Total Pengeluaran Uang</p>
                </div>
                <div class="icon">
                  <i class="fa fa-money"></i>
                </div>
                <a href="<?php echo base_url('index.php/admin/pemasukan_uang') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>
                    <?php
                        echo "Rp. ". number_format($totalpemasukanuang - $totalpengeluaranuang,0,',','.');
                    ?>
                  </h3>
                  <p>Total Saldo Uang</p>
                </div>
                <div class="icon">
                  <i class="fa fa-columns"></i>
                </div>
                <a href="<?php echo base_url() ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
                    <?php
                      $jumlahdonatur = $this->db->query("SELECT donatur FROM tb_pemasukan_uang ")->num_rows();
                      echo $jumlahdonatur;
                    ?>
                    Donatur
                  </h3>
                  <p>Total Donatur Uang</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-blue">
                <div class="widget-user-image">
                  <img class="img-circle" src="<?php echo base_url('assets') ?>/dist/img/avatar4.png" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?php echo $this->session->userdata('nama'); ?></h3>
                <h5 class="widget-user-desc">Terdaftar Pada <?php echo date('d-M-Y H:i:s', strtotime($this->session->userdata('createDate'))); ?></h5>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a>Nama Lengkap <span class="pull-right badge bg-blue"><?php echo $this->session->userdata('nama'); ?></span></a></li>
                  <li><a>Username <span class="pull-right badge bg-blue"><?php echo $this->session->userdata('username'); ?></span></a></li>
                  <li><a>Password <span class="pull-right badge bg-blue">Disembunyikan</span></a></li>
                  <li><a>Terdaftar Pada <span class="pull-right badge bg-blue"><?php echo date('d-M-Y H:i:s', strtotime($this->session->userdata('createDate'))); ?></span></a></li>
                </ul>
              </div>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->