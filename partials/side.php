<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/<?php echo $user['pas_foto']; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['real_name']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU:</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class=""><a href="index.php?p=settings" id="btnAtur"><i class="fa fa-cogs"></i> <span>Pengaturan</span></a></li>
          <li class="treeview">
            <a href="index.php?p=pelanggan" id="btnPelanggan">
              <i class="fa fa-users"></i> <span>Pelanggan</span>
            </a>
          </li>
          <!-- <li><a href="index.php?p=backup-db" id="btnBackup"><i class="fa fa-database"></i> Backup Database</a></li> -->
        </ul>
      </li>
      <li class="treeview">
        <a href="index.php?p=entry-meter" id="btnUsers"><i class="fa fa-cube"></i> <span>Entri Meter</span></a>
      </li>
      <li class="treeview">
        <a href="index.php?p=pembayaran" id="btnPayment">
          <i class="fa fa-money"></i> <span>Pembayaran</span>
        </a>
      </li>
      <li class="treeview">
        <a href="index.php?p=tunggakan" id="btnTunggakan">
          <i class="fa fa-calendar-times-o"></i> <span>Tunggakan</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-text"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#" id="btnStrukBulan"><i class="fa fa-calendar"></i> Struk Bulanan</a></li>
          <li><a href="index.php?p=payStory" id="btnHistory"><i class="fa fa-history"></i> Riwayat Pembayaran</a></li>
          <li><a href="index.php?p=rekap" id="btnRekap"><i class="fa fa-bar-chart"></i> Rekapitulasi</a></li>
          <!-- <li><a href="javascript:void(0);" id="btnReport"><i class="fa fa-print"></i> Laporan Custom</a></li> -->
        </ul>
      </li>
      <li class="treeview">
        <a href="logout.php" style="color: #ee5688; font-weight: 400">
          <i class="fa fa-sign-out"></i> <span>Keluar</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
