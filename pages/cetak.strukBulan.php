<?php
  session_start();

  include_once '../plugins/mpdf/mpdf.php';
  include_once '../cfg/db.php';

  $username = $_SESSION['user'];
  $qryUser = "SELECT * FROM users WHERE username = '$username'";
  $run = mysqli_query($con, $qryUser);
  $resUser = mysqli_fetch_assoc($run);

  $cek_bulan = date('m');
  $cek_tahun = date("Y");
  $strhtml = "<div style='text-center'></div>";

  $sql = "SELECT * , pelanggan.nama FROM payment LEFT JOIN pelanggan ON payment.norek = pelanggan.norek WHERE month(payment.bulan) = '$cek_bulan' AND year(payment.bulan) = '$cek_tahun' AND is_lunas = '1'";
  $run = mysqli_query($con, $sql);
  $rows = mysqli_num_rows($run);
  if($rows > 0){
    echo 'hi';
    $i = 1;
    while($res = mysqli_fetch_assoc($run)){
      $strhtml .= "<table style=\"border-collapse: collapse;\" border=\"1\">";
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
            $strhtml .= "Nama: ".$res['nama'];
          $strhtml .= "</td>";
          $strhtml .= "<td colspan=\"5\" style=\"font-size: 8pt\">
            Bulan/Thn:".date('m', strtotime($res['bulan']))." / ". date('Y', strtotime($res['bulan']));
          $strhtml .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tgl Bayar: ".$res['tgl_bayar']."</td>";
        $strhtml .= "</tr>";
        $strhtml .= "<tr>";
          $strhtml .= "<td colspan=\"4\" style=\"font-size: 8pt\">";
            $strhtml .= "No. Rekening: ".$res['norek'];
          $strhtml .= "</td>";
          $strhtml .= "<td colspan=\"5\" style=\"font-size: 8pt\">";
            $strhtml .= "Kode Pembayaran: ". $res['id_bayar'];
          $strhtml .= "</td>";
        $strhtml .= "</tr>";
        $strhtml .= "<tr>";
          $strhtml .= "<td colspan=\"4\" style=\"font-size: 8pt\">Alamat: ". $res['alamat']."</td>";
          $strhtml .= "<td colspan=\"5\" rowspan=\"2\" style=\"font-size: 8pt\">Terbilang: <span style=\"text-transform: capitalize; font-weight: 600;\">". $res['terbilang']."</span> Rupiah</td>";
        $strhtml .= "</tr>";
        $strhtml .= "<tr>";
          $strhtml .= "<td colspan=\"4\" style=\"font-size: 8pt\">No. Telp: ". $res['telp']."</td>";
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
          $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">". $res['meter_lalu']."</td>";
          $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">". $res['meter_sekarang']."</td>";
          $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">". $res['meter_selisih']."</td>";
          $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">2000</td>";
          $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">2000</td>";
          $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">2000</td>";
          $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">2000</td>";
          $strhtml .= "<td style=\"text-align: center;font-size: 8pt\"> --- </td>";
          $strhtml .= "<td style=\"text-align: center;font-size: 8pt\">". $res['jml_bayar']."</td>";
        $strhtml .= "</tr>";
      $strhtml .= "</table>";
      $strhtml .= "<p style=\"font-size: 8pt;margin:5px;\">KELUHAN PELANGGAN: 085102860798/ 085104610016/ 082244703779</p>";
      $strhtml .= "<p style=\"margin-left: 75%;margin-top: 2px; font-size: 8pt;\">Operator,</p>";

      $strhtml .= "<p style=\"margin-left: 75%;font-size: 8pt;\">".$resUser['real_name']."</p>";
    }
    $i++;
  }
  $strhtml .= "";
  $mpdf = new mPDF('utf-8', array(216, 68), 0, '',30, 10, 4,3, 'P');
  // $mpdf = new mPDF('utf-8', array(216, 68), 0, '', 8,8,5,1,1,1,'P');
  $css = file_get_contents('../dist/css/strukBulan.css');
  $mpdf->WriteHTML($css,1);
  $mpdf->WriteHTML($strhtml);
  $mpdf->Output();
?>
