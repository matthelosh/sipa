<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="viewContent" style="padding: 0 20px;">
        <?php
          $page = (isset($_GET['p']))?$_GET['p']:null;
          switch($page){
            case "pelanggan":
              include "pages/pelanggan.php";
            break;
            case "entry-meter":
              include "pages/entry-meter.php";
            break;
            case "pembayaran":
              include "pages/payment.php";
            break;
            case "laporan":
              include "pages/report.php";
            break;
            case "*":
              echo "404";
            break;
            default:
              include "pages/dashboard.php";
            break;
          }
        ?>
      </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
