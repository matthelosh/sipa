<section class="content-header">
  <h1>
    Dashboard
    <small id="pgHeader">Rekapitulasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Rekap Pembayaran</li>
  </ol>
</section>

<div class="row" style="margin-top: 20px;">
  <div class="col-sm-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h1 class="box-title"><i class="fa fa-line-chart"></i> Rekapitulasi

        </h1>
      </div>
      <div class="box-body">
        <form action="index.php?p=rekap" method="post" class="form form-inline">
          <input type="text" name="bulan" class="form-control" id="bulan" placeholder="Pilih Bulan">
          <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Pilih Tahun">
          <button type="submit" name="button" class="btn btn-flat bg-navy">Rekap</button>
        </form>

        <?php
        include_once 'cfg/function.php';
          // $bulan = (isset($_REQUEST['bulan']))?$_REQUEST['bulan']: null;
          // $tahun = (isset($_REQUEST['tahun']))?$_REQUEST['tahun']: null;
          $tes = false;
          if(isset($_REQUEST['bulan'])){
            $bulan = date("m", strtotime($_REQUEST['bulan']));
            $tahun = date("Y", strtotime($_REQUEST['tahun']));
            $namaBulan = ['Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];
            $sql = "SELECT sum(meter_selisih) as jml_meter, sum(jml_bayar) as jmlIncome, bulan FROM payment WHERE month(bulan) = '$bulan' AND year(bulan) = '$tahun' AND is_lunas ='1'";
            $cekLunas = "SELECT * FROM payment WHERE month(bulan) = '$bulan' AND year(bulan) = '$tahun' AND is_lunas = '1'";
            $cekSemua = "SELECT sum(meter_selisih) as jml_meter, sum(jml_bayar) as jmlTagihan, bulan FROM payment WHERE month(bulan) = '$bulan' AND year(bulan)='$tahun'";
            $qTotal = "SELECT * FROM payment WHERE month(bulan) = '$bulan' AND year(bulan) = '$tahun'";
            $rTotal = mysqli_query($con, $qTotal);
            $runSemua = mysqli_query($con, $cekSemua);
            $runLunas = mysqli_query($con, $cekLunas);
            $run = mysqli_query($con, $sql);
            $jmlSemua = mysqli_num_rows($rTotal);
            $jmlLunas = mysqli_num_rows($runLunas);
            $all = mysqli_fetch_assoc($runSemua);
            $res = mysqli_fetch_assoc($run);
            $bulan = $namaBulan[$bulan-1];
            $terbilang = Terbilang($res['jmlIncome']);
            $bilangTagihan = Terbilang($all['jmlTagihan']);
            $bilangSemua = Terbilang($jmlSemua);
            $lunasTerbilang = Terbilang($jmlLunas);
            $tes = true;
          } 

        ?>

      </div>
    </div>
  </div>
</div>

<?php

  if($tes == true){
  echo "
  <div class=\"row\">
    <div class=\"col-sm-4\">

              <div class=\"small-box bg-aqua\" style=\"margin-top: 20px\">
                <div class=\"box-header\">
                  <h4 class=\"box-title text-center\" style=\"color: #efefef \">Jumlah  Air Terbayar selama bulan: ". $bulan ." - ".$tahun."</h4>
                </div>
                <div class=\"inner\">
                  <h3>".$res['jml_meter']."m<sup>3</sup></h3>

                  <p>Jumlah Pemakaian Air Terbayar</p>
                </div>
                <div class=\"icon\">
                  <i class=\"fa fa-shopping-cart\"></i>
                </div>

              </div>


    </div>
    <div class=\"col-sm-4\">

          <div class=\"small-box bg-maroon\" style=\"margin-top: 20px\">
          <div class=\"box-header\">
            <h1 class=\"box-title text-center\" style=\"color: #efefef \">Jumlah uang masuk bulan: ". $bulan ." - ".$tahun."</h1>
          </div>
            <div class=\"inner\">
              <h3>Rp. ".number_format($res['jmlIncome'],0,",",".").",-</h3>

              <p style=\"text-transform: capitalize; \">Terbilang: ".$terbilang." Rupiah</p>
            </div>
            <div class=\"icon\">
              <i class=\"fa fa-money\"></i>
            </div>

          </div>
    </div>
    <div class=\"col-sm-4\">
          <div class=\"small-box bg-purple\" style=\"margin-top: 20px\">
          <div class=\"box-header\">
            <h1 class=\"box-title text-center\" style=\"color: #efefef \">Jumlah Rekening yang Lunas Bulan: ". $bulan ." - ".$tahun."</h1>
          </div>
            <div class=\"inner\">
              <h3>".$jmlLunas."</h3>

              <p style=\"text-transform: capitalize; \">Total: ".$lunasTerbilang."</p>
            </div>
            <div class=\"icon\">
              <i class=\"fa fa-check\"></i>
            </div>

          </div>
    </div>
  </div>
<!-- End Row -->
  <div class=\"row\" >
    <div class=\"col-sm-4\">

              <div class=\"small-box bg-red\" style=\"margin-top: 20px\">
                <div class=\"box-header\">
                  <h1 class=\"box-title text-center\" style=\"color: #efefef \">Jumlah  Pemakaian Air selama bulan: ". $bulan ." - ".$tahun."</h1>
                </div>
                <div class=\"inner\">
                  <h3>".$all['jml_meter']."m<sup>3</sup></h3>

                  <p>Jumlah Pemakaian Air</p>
                </div>
                <div class=\"icon\">
                  <i class=\"fa fa-shopping-cart\"></i>
                </div>

              </div>


    </div>
    <div class=\"col-sm-4\">

          <div class=\"small-box bg-orange\" style=\"margin-top: 20px\">
          <div class=\"box-header\">
            <h1 class=\"box-title text-center\" style=\"color: #efefef \">Jumlah seharusnya uang masuk bulan: ". $bulan ." - ".$tahun."</h1>
          </div>
            <div class=\"inner\">
              <h3>Rp. ".number_format($all['jmlTagihan'],0,",",".").",-</h3>

              <p style=\"text-transform: capitalize; \">Terbilang: ".$bilangTagihan." Rupiah</p>
            </div>
            <div class=\"icon\">
              <i class=\"fa fa-money\"></i>
            </div>

          </div>
    </div>
    <div class=\"col-sm-4\">
          <div class=\"small-box bg-navy\" style=\"margin-top: 20px\">
          <div class=\"box-header\">
            <h1 class=\"box-title text-center\" style=\"color: #efefef \">Jumlah Rekening yang Tercatat Bulan: ". $bulan ." - ".$tahun."</h1>
          </div>
            <div class=\"inner\">
              <h3>".$jmlSemua."</h3>

              <p style=\"text-transform: capitalize; \">Total: ".$bilangSemua."</p>
            </div>
            <div class=\"icon\">
              <i class=\"fa fa-ban\"></i>
            </div>

          </div>
    </div>
  </div>


  ";

} else {
  ;
    ?>
    <div class="box box-danger">
      <div class="box-header with-border">
        <h4>Pilih Bulan dan Tahun</h4>
      </div>
    </div>
    <?php

}

?>
