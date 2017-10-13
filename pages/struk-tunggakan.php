<?php
session_start();
include_once '../cfg/db.php';
$username = $_SESSION['user'];
$qryUser = "SELECT * FROM users WHERE username = '$username'";
$run = mysqli_query($con, $qryUser);
$resUser = mysqli_fetch_assoc($run);

?>
<style media="print">
  .top-bar{
    display: none;
  }

</style>
<style media="screen">
  .top-bar button{
    height: auto;
    background: rgb(255, 105, 66);
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    margin-left: 50%;
  }
</style>
<div class="top-bar" style="margin: 20px">
  <button type="button" name="button" onclick="window.print()">Cetak</button>
</div>
<?php
$norek  =$_REQUEST['norek'];
$bln_ini = date("m");
$sqT = "SELECT * FROM `payment` LEFT JOIN `pelanggan` ON payment.norek=pelanggan.norek WHERE month(payment.bulan) < '$bln_ini' AND month(payment.bulan) < month(payment.tgl_bayar) AND payment.norek='$norek' AND payment.is_lunas='1'";
$qryT = mysqli_query($con, $sqT);
$strhtml = '';
$i=0;
  while($r = mysqli_fetch_assoc($qryT)){
    $strhtml .= "<div class=\"struk-box\" style=\"width=80%;border:0 dashed #333; margin: 0 auto 20px auto;padding: 10px;\">";
    $strhtml .= "<table style=\"border-collapse: collapse; width: 90%; margin: 0 auto;\" border=\"1\">";
      $strhtml .= "<tr>";
        $strhtml .= "<td colspan=\"5\" class=\"kop\">";
          $strhtml .= "<div style=\"width:50%\" >";
            $strhtml .= "<p class=\"kop-kiri\" style=\"text-align: center; padding: 0 10px;font-size: 8pt\">";
              $strhtml .= "PAGUYUBAN PELANGGAN AIR MINUM DESA <br>DUSUN PAKEL DESA BATURETNO <br>KECAMATAN SINGOSARI KAB. MALANG";
            $strhtml .= "</p>";
          $strhtml .= "</div>";
        $strhtml .= "</td>";
        $strhtml .= "<td colspan =\"4\" class=\"kop\">";
          $strhtml .= "<div class=\"kotak\" style=\"font-size: 8pt\">";
            $strhtml .= "<h1 style=\"width: 40%; border: 1px solid black;padding: 0 8pt; margin-right: 8pt;\">-PAMDES-</h1>";
          $strhtml .= "</div>";
        $strhtml .= "</td>";
      $strhtml .= "</tr>";
      $strhtml .= "<tr>";
        $strhtml .= "<td colspan=\"4\" style=\"font-size: 8pt\">";
          $strhtml .= "Nama: ".$r['nama'];
        $strhtml .= "</td>";
        $strhtml .= "<td colspan=\"5\" style=\"font-size: 8pt\">
          Bulan/Thn:".date('m', strtotime($r['bulan']))." / ". date('Y', strtotime($r['bulan']));
        $strhtml .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tgl Bayar: ".$r['tgl_bayar']."</td>";
      $strhtml .= "</tr>";
      $strhtml .= "<tr>";
        $strhtml .= "<td colspan=\"4\" style=\"font-size: 8pt\">";
          $strhtml .= "No. Rekening: ".$r['norek'];
        $strhtml .= "</td>";
        $strhtml .= "<td colspan=\"5\" style=\"font-size: 8pt\">";
          $strhtml .= "Kode Pembayaran: ". $r['id_bayar'];
        $strhtml .= "</td>";
      $strhtml .= "</tr>";
      $strhtml .= "<tr>";
        $strhtml .= "<td colspan=\"4\" style=\"font-size: 8pt\">Alamat: ". $r['alamat']."</td>";
        $strhtml .= "<td colspan=\"5\" rowspan=\"2\" style=\"font-size: 8pt\">Terbilang: <span style=\"text-transform: capitalize; font-weight: 600;\">". $r['terbilang']."</span> Rupiah</td>";
      $strhtml .= "</tr>";
      $strhtml .= "<tr>";
        $strhtml .= "<td colspan=\"4\" style=\"font-size: 8pt\">No. Telp: ". $r['telp']."</td>";
      $strhtml .= "</tr>";
      $strhtml .= "<tr>";
        $strhtml .= "<td colspan=\"2\" style=\"text-align: center; font-size: 8pt\">Angka Meter</td>";
        $strhtml .= "<td rowspan=\"2\" style=\"text-align: center; font-size: 8pt\">Pemakaian</td>";
        $strhtml .= "<td rowspan=\"2\" style=\"text-align: center; font-size: 8pt\">Tarif 0-10 m<sup>3</sup></td>";
        $strhtml .= "<td rowspan=\"2\" style=\"text-align: center;font-size: 8pt\">Tarif II 11-20 m<sup>3</sup></td>";
        $strhtml .= "<td rowspan=\"2\" style=\"text-align: center;font-size: 8pt\">Tarif III 21-..  m<sup>3</sup></td>";
        $strhtml .= "<td rowspan=\"2\" style=\"text-align: center;font-size: 8pt\">Beban Dasar</td>";
        $strhtml .= "<td rowspan=\"2\" style=\"text-align: center;font-size: 8pt\">Denda</td>";
        $strhtml .= "<td rowspan=\"2\" style=\"text-align: center;font-size: 8pt\">Jumlah Tagihan</td>";
      $strhtml .= "</tr>";
      $strhtml .= "<tr>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">Bulan Lalu</td>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">Bulan Ini</td>";
      $strhtml .= "</tr>";
      $strhtml .= "<tr>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">". $r['meter_lalu']."</td>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">". $r['meter_sekarang']."</td>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">". $r['meter_selisih']."</td>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">2000</td>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">2000</td>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">2000</td>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">2000</td>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\"> --- </td>";
        $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">". $r['jml_bayar']."</td>";
      $strhtml .= "</tr>";
    $strhtml .= "</table>";
    $strhtml .= "<p style=\"font-size: 8pt; margin-left:5%;\">KELUHAN PELANGGAN: 085102860798/ 085104610016/ 082244703779</p>";
    $strhtml .= "<p style=\"margin-left: 75%;margin-top: 2px; font-size: 8pt;\">Operator,</p>";

    $strhtml .= "<p style=\"margin-left: 75%;font-size: 8pt;\">".$resUser['real_name']."</p>";
    $strhtml .= "</div>";
  }
  $i++;

$strhtml .= "";
echo $strhtml;
?>
