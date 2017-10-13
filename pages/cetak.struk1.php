<?php
  session_start();
  include_once '../cfg/db.php';
  include_once '../plugins/mpdf/mpdf.php';

  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak Struk</title>
    <style media="screen">
    td{
      vertical-align: middle;
      padding: 5px 8pt;
      /*min-height: 20px;*/
      height: 15px;
      font-size: small!important;
    }
    </style>
    <style media="print">
    @page{
      size: 21.6cm 6.8cm;
      margin: 0.2cm 2.2cm;
      font-size: .5em;



    .box-struk{
      height: 6.6cm;
      width: 19.4cm;
      border: 1px solid gray;

    }
    table{
      font-family: cursive;
      width: 19.4cm ;

    }
    h5, h1{
      margin: 0;
    }
    tr{

    }
    p{
      margin: 0;
    }
      td{
        vertical-align: middle;
        padding: 5px 8pt;
        /*min-height: 20px;*/
        height: 15px;
        font-size: small!important;
      }
    .kotak{
      /*border: 1px solid black;*/

    }
  }
    </style>
  </head>
  <body>
    <?php
  $username =  $_SESSION['user'];

  $sql = "SELECT * FROM users WHERE username = '$username'";
  $run = mysqli_query($con, $sql);
  $resUser = mysqli_fetch_assoc($run);
  // echo $res['real_name'];

  $id_bayar= $_REQUEST['id_bayar'];
  // echo $id_bayar;

  $qryPay = "SELECT *, pelanggan.nama, pelanggan.alamat FROM payment LEFT JOIN pelanggan ON payment.norek = pelanggan.norek WHERE id_bayar = '$id_bayar'";
  $runPay = mysqli_query($con, $qryPay);
  $rows = mysqli_num_rows($runPay);
  if($rows > 0 ){
    $res = mysqli_fetch_assoc($runPay);
    ?>
<!-- //Table Struk -->
    <div class="box-struk">
      <table style="border-collapse: collapse;" border="1">
        <tr>
          <td colspan="9">
            <div class="kotak" style="width:50%" >
              <p style="text-align: center; float: left; border: 1px solid black;padding: 0 10px; margin-left: 10px; font-size: 8pt">
                PAGUYUBAN PELANGGAN AIR MINUM DESA <br>
                DUSUN PAKEL DESA BATURENO <br>
                KECAMATAN SINGOSARI KAB. MALANG
              </p>
            </div>
            <div class="kotak" style="font-size: 8pt">
              <h1 style="text-align: center; width: 40%; float: right; border: 1px solid black;padding: 0 8pt; margin-right: 8pt;">PAMDES</h1>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="4" style="font-size: 8pt">
            Nama: <?php echo $res['nama'];?>
          </td>
          <td colspan="5" style="font-size: 8pt">
            Bulan/Thn: <?php echo date("m", strtotime($res['bulan']))." / ". date("Y", strtotime($res['bulan'])); ?>
          </td>
        </tr>
        <tr>
          <td colspan="4" style="font-size: 8pt">
            No. Rekening: <?php echo $res['norek']; ?>
          </td>
          <td colspan="5" style="font-size: 8pt">
            Kode Pembayaran: <?php echo $res['id_bayar'] ?>
          </td>
        </tr>
        <tr>
          <td colspan="4" style="font-size: 8pt">Alamat: <?php echo $res['alamat']; ?></td>
          <td colspan="5" rowspan="2" style="font-size: 8pt">Operator: <?php echo $resUser['real_name']; ?></td>
        </tr>
        <tr>
          <td colspan="4" style="font-size: 8pt">No. Telp: <?php echo $res['telp']; ?></td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center; font-size: 8pt">Angka Meter</td>
          <td rowspan="2" style="text-align: center; font-size: 8pt">Pemakaian</td>
          <td rowspan="2" style="text-align: center; font-size: 8pt">Tarif 0-10 m<sup>3</sup></td>
          <td rowspan="2" style="text-align: center;font-size: 8pt">Tarif II 11-20 m<sup>3</sup></td>
          <td rowspan="2" style="text-align: center;font-size: 8pt">Tarif III 21-..  m<sup>3</sup></td>
          <td rowspan="2" style="text-align: center;font-size: 8pt">Beban Dasar</td>
          <td rowspan="2" style="text-align: center;font-size: 8pt">Denda</td>
          <td rowspan="2" style="text-align: center;font-size: 8pt">Jumlah Tagihan</td>
        </tr>
        <tr>
          <td style="text-align: center;font-size: 8pt">Bulan Lalu</td>
          <td style="text-align: center;font-size: 8pt">Bulan Ini</td>
        </tr>
        <tr>
          <td style="text-align: center;font-size: 8pt"><?php echo $res['meter_lalu']; ?></td>
          <td style="text-align: center;font-size: 8pt"><?php echo $res['meter_sekarang']; ?></td>
          <td style="text-align: center;font-size: 8pt"><?php echo $res['meter_selisih']; ?></td>
          <td style="text-align: center;font-size: 8pt">2000</td>
          <td style="text-align: center;font-size: 8pt">2000</td>
          <td style="text-align: center;font-size: 8pt">2000</td>
          <td style="text-align: center;font-size: 8pt">2000</td>
          <td style="text-align: center;font-size: 8pt"> --- </td>
          <td style="text-align: center;font-size: 8pt"><?php echo $res['jml_bayar'];?></td>
        </tr>
      </table>
      <p style="font-size: 8pt;margin:5px;">KELUHAN PELANGGAN: 085102860798/ 085104610016/ 082244703779</p>
    </div>


  </body>
</html>


    <?php
  }

?>
