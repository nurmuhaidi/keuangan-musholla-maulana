  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets') ?>/dist/img/avatar4.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">
          <a href="<?php echo base_url('index.php/admin/dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Pemasukan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/admin/pemasukan_uang') ?>"><i class="fa fa-circle-o"></i> Pemasukan Uang</a></li>
            <li><a href="<?php echo base_url('index.php/admin/pemasukan_barang') ?>"><i class="fa fa-circle-o"></i> Pemasukan Barang</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Pengeluaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/admin/pengeluaran_uang') ?>"><i class="fa fa-circle-o"></i> Pengeluaran Uang</a></li>
            <!-- <li><a href="<?php echo base_url('index.php/admin/pengeluaran_barang') ?>"><i class="fa fa-circle-o"></i> Pengeluaran Barang</a></li> -->
          </ul>
        </li>

        <li class="treeview">
          <a href="<?php echo base_url('index.php/admin/manajemen_user') ?>">
            <i class="fa fa-group"></i> <span>Manajemen User</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">
                <?php
                  $jumlahUser = $this->db->query('SELECT id FROM tb_user')->num_rows();
                  echo $jumlahUser . " User";
                ?>
              </span>
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="<?php echo base_url('index.php/admin/pengaturan') ?>">
            <i class="fa fa-cog"></i> <span>Pengaturan</span>
          </a>
        </li>

        <li class="treeview">
          <a href="<?php echo base_url('index.php/admin/profile') ?>">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li>

        <li class="treeview">
          <a href="<?php echo base_url('index.php/welcome/logout') ?>" class="tombol-yakin" data-isiData="Ingin keluar dari sistem ini!">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>