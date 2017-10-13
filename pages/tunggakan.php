<section class="content-header" >
  <h1>
    Dashboard
    <small id="pgHeader">Tunggakan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Tunggakan</li>
  </ol>
</section>

<div class="row" style="margin-top:20px">
  <div class="col-sm-12">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h1 class="box-title">Menu Tunggakan</h1>
      </div>
      <div class="box-body">
        <form class="form form-inline" action="index.php?p=tunggakan" method="post">
          <!-- <input type="hidden" name="mode" value="ceksemua"> -->

            <!-- <input type="text" name="bulan" class="form-control" id="bulan" placeholder="Pilih Bulan">
            <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Pilih Tahun"> -->
            <button type="submit" name="mode" value="ceksemua" class="btn btn-flat bg-maroon">Cek Tunggakan</button>
            <button type="submit" name="mode" value="bayarTunggakan" class="btn btn-flat bg-teal">Bayar Tunggakan</button>

        </form>
      </div>
    </div>
  </div>
</div>

<div class="box">
  <div class="box-body">

<?php
  if(isset($_REQUEST['mode'])) {
    if($_REQUEST['mode'] == 'ceksemua'){

      echo "<h4 class=\"box-title\">Data Penunggak</h4>";
      ?>
      <!-- <table class=\"table table-striped\">
        <thead>
          <tr>
            <th>Norek</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Bulan</th>
            <th>Tanggungan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody> -->




      <?php
      // $bulantgk = date("m",strtotime($_REQUEST['bulan']));
      // $tahuntgk = date("Y", strtotime($_REQUEST['tahun']));
      $bulan_ini = date("m");
      // $sqlT = "SELECT * FROM payment LEFT JOIN pelanggan ON payment.norek = pelanggan.norek WHERE month(bulan) = '$bulantgk' AND year(bulan) = '$tahuntgk' AND is_lunas='0' ORDER BY payment.norek";
      $sqlT = "SELECT *, sum(payment.jml_bayar) as 'jmltunggakan' FROM payment LEFT JOIN pelanggan ON payment.norek = pelanggan.norek WHERE month(bulan) < $bulan_ini AND is_lunas='0' GROUP BY payment.norek ";
      $run = mysqli_query($con, $sqlT);
      $rows = mysqli_num_rows($run);
      // echo $rows;
      // echo $bulan_ini;
      $namaBulan = array('01=>Januari','02'=>'Pebruari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'Nopember','12'=>'Desember');
      $no = 1;
      while($r = mysqli_fetch_assoc($run)){
        // Qry Detil
        $qryD = "SELECT * FROM payment WHERE norek = '$r[norek]' AND month(bulan) < '$bulan_ini' AND is_lunas='0'";
        $runD = mysqli_query($con, $qryD);
        $rowD = mysqli_num_rows($runD);

        echo "

        <div style=\"margin-top: 10px\"></div>
        <table class=\"table table-bordered\">
          <thead>
            <tr class=\"bg-aqua\">
              <th>No</th>
              <th>Norek</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Tunggakan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
        <tr>
        <td>$no</td>
        <td>$r[norek]</td>
        <td>$r[nama]</td>
        <td>$r[alamat]</td>


        <td>
          <table class=\"table table-bordered\" style=\"margin-bottom: 0;\">";
          while($d = mysqli_fetch_assoc($runD)){

            echo "<tr><td>Bulan: ".$namaBulan[date('m', strtotime($d['bulan']))].' - '. date('Y', strtotime($d['bulan']))."</td><td> Rp.".number_format($d['jml_bayar'],0,",",".")."</td></tr>";
          }
        echo "
          </table>
        </td>
        <td rowspan=\"3\" style=\"vertical-align: middle; \"><a href='index.php?p=tunggakan&mode=bayarTunggakan&norek=$r[norek]' style=\"color: orangered;\">Bayar?</a></td>
        </tr>
        <tr class=\"bg-red\"><td colspan=\"4\" style=\"text-align:center\"><strong>Jumlah Tunggakan</strong></td><td colspan=\"3\" style=\"text-align:center\">Rp. ". number_format($r['jmltunggakan'], 0,",",".") ."</td>
        </tr>
        </tbody>
      </table>

        ";
        $no++;
        }
    } else if($_REQUEST['mode'] == 'bayarTunggakan'){
      if(isset($_REQUEST['norek'])){
          $norek = $_REQUEST['norek'];
          $bln_ini = date("m");
          $sqlcr = "SELECT * FROM payment LEFT JOIN pelanggan ON payment.norek=pelanggan.norek WHERE payment.norek = '$norek' AND month(payment.bulan) < '$bln_ini' AND is_lunas ='0'";
          $runcr = mysqli_query($con, $sqlcr);
          $r = mysqli_fetch_assoc($runcr);
          if(mysqli_num_rows($runcr) > 0 ) {
            ?>
            <div class="col-sm-6">
              <div class="box box-warning">
                <div class="box-body">
                  <form class="form form-inline" id="frmCekTunggakan">
                    <input type="hidden" name="mode" value="cek-penunggak">
                    <div class="form-group">
                      <label for="norek">No. Rekening: </label>
                      <div class="input-group has-addon">
                        <input class="form-control" type="text" name="norek" value="<?php echo $norek;?>" placeholder="No. Rekening" id="norek-tunggak">
                        <span class="input-group-addon" id="cariPenunggak" style="cursor: pointer;"><i class="fa fa-search"></i></span>
                      </div>

                    </div>

                  </form>
                </div>

              </div>

              <div class="box box-success">
                <div class="box-body">
                  <p>Nama : <span id="namaPenunggak"></span></p>
                  <p>Alamat : <span id="alamatPenunggak"></span></p>
                  <p>No. Telp : <span id="telpPenunggak"></span></p>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="box box-primary">
                <div class="box-body">
                  <p>Rincian Tunggakan: <span id="rincian-tunggakan"></span></p>
                  <p>Jumlah Tunggakan: <span id="jml-tunggakan"></span></p>
                </div>
                <div class="box-footer">
                  <button class="btn btn-primary btn-flat btn-bayar-tunggakan" style="display:none" id="bayar-all-tunggakan" >Bayar Semua?</button>
                </div>
              </div>
            </div>

            <?php
          } else {
            $carinama = mysqli_query($con, "SELECT nama FROM pelanggan WHERE norek = '$norek'");
            $r = mysqli_fetch_assoc($carinama);
            echo "Tunggakan untuk No. Rekening: ".$norek.". Atas nama <u><b>".$r['nama']."</b></u> sudah dibayar. <a href=\"pages/struk-tunggakan.php?norek=$norek\" class=\"btn btn-flat bg-teal \">Cetak Struk?</a>";
          }
        } else {
          ?>
          <h4 class="page-header">Bayar Tunggakan</h4>
          <div class="col-sm-6">
            <div class="box box-warning">
              <div class="box-body">
                <form class="form form-inline" id="frmCekTunggakan">
                  <input type="hidden" name="mode" value="cek-penunggak">
                  <div class="form-group">
                    <label for="norek">No. Rekening: </label>
                    <div class="input-group has-addon">
                      <input class="form-control" type="text" name="norek" value="" placeholder="No. Rekening" id="norek-tunggak">
                      <span class="input-group-addon" id="cariPenunggak" style="cursor: pointer;"><i class="fa fa-search"></i></span>
                    </div>

                  </div>

                </form>
              </div>

            </div>

            <div class="box box-success">
              <div class="box-body">
                <p>Nama : <span id="namaPenunggak"></span></p>
                <p>Alamat : <span id="alamatPenunggak"></span></p>
                <p>No. Telp : <span id="telpPenunggak"></span></p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="box box-primary">
              <div class="box-body">
                <p>Rincian Tunggakan: <span id="rincian-tunggakan"></span></p>
                <p>Jumlah Tunggakan: <span id="jml-tunggakan"></span></p>
              </div>
              <div class="box-footer">
                <button class="btn btn-primary btn-flat btn-bayar-tunggakan" style="display:none" id="bayar-all-tunggakan" >Bayar Semua?</button>
              </div>
            </div>
          </div>

          <?php
        }

    }
    ?>
     </div>
    </div>
    <!-- // <td>".date("d-M-Y", strtotime($r['bulan & ']))."</td> -->
    <?php
  } else {
    echo "<div class=\"box box-info\">

    ";
  }
?>
