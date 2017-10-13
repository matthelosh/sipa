<section class="content-header">
  <h1>
    Dashboard
    <small id="pgHeader">Data Pembayaran</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Riwayat Pembayaran</li>
  </ol>
</section>
<div class="row" style="margin-top: 20px">
  <div class="col-sm-12">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h1 class="box-title"><i class="fa fa-history"></i> Riwayat Tagihan</h1>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dataTable" role="grid">
          <thead>
            <tr>
              <th>Kd bayar</th>
              <th>No. Rek.</th>
              <th>Nama Pelanggan</th>
              <th>Bulan</th>
              <th>Jml M<sup>3</sup></th>
              <th>Jml Tagihan</th>
              <th>Tgl Bayar</th>
              <th>Lunas</th>
            </tr>
            <tbody>
              <?php
                $sql = "SELECT *, pelanggan.nama FROM payment LEFT JOIN pelanggan ON payment.norek = pelanggan.norek ORDER BY id_bayar ASC";
                $run = mysqli_query($con, $sql);
                while($res = mysqli_fetch_array($run)){
                  // $isLunas = '';
                  if($res['is_lunas'] == '1'){
                    $isLunas = 'Lunas';
                  } else {
                    $isLunas = 'Belum Dibayar';
                  }
                  echo "<tr>
                  <td>$res[id_bayar]</td><td>$res[norek]</td><td>$res[nama]</td><td>$res[bulan]</td><td>$res[meter_selisih]</td><td>Rp. $res[jml_bayar]</td><td>$res[tgl_bayar]</td><td>$isLunas</td>

                  </tr>";
                }
              ?>
            </tbody>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
