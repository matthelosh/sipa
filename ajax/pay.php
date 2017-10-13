<?php
date_default_timezone_set("Asia/jakarta");
session_start();
include_once '../cfg/db.php';
include_once '../cfg/function.php';
$mode = (isset($_REQUEST['mode']))?$_REQUEST['mode']:null;

switch ($mode) {

  case 'cek':
    $norek = $_POST['norek'];
    $bln_ini = date('m');
    $th_ini = date('Y');
    $qryCek = "SELECT payment.id_bayar, payment.norek, pelanggan.nama, pelanggan.alamat, payment.bulan, payment.meter_lalu, payment.meter_sekarang, payment.meter_selisih, payment.abonemen,payment.admin, payment.terbilang, payment.jml_bayar, payment.is_lunas FROM payment LEFT JOIN pelanggan ON payment.norek = pelanggan.norek WHERE payment.norek = '$norek' AND month(payment.bulan) = '$bln_ini'";
    $run = mysqli_query($con, $qryCek);

    if(mysqli_num_rows($run)>0){
      // Cek TUnggakan
      $cekTunggakan = "SELECT SUM(jml_bayar) as jml_bayar FROM payment WHERE norek = '$norek' AND month(bulan) < '$bln_ini' AND is_lunas = '0'";
      $runCek = mysqli_query($con, $cekTunggakan);
      $blnTunggak = mysqli_query($con, "SELECT * FROM payment WHERE norek = '$norek' AND month(bulan) < '$bln_ini' AND is_lunas = '0'");
      $rows = mysqli_num_rows($blnTunggak);
      $tunggak = mysqli_fetch_assoc($runCek);

        $result = mysqli_fetch_assoc($run);
        $tunggak = array('tunggakan' => $tunggak['jml_bayar'], 'blnTunggak' => $rows);

        $result = array_merge($result, $tunggak);
        print_r(json_encode($result));
      // }



    } else {
      print(json_encode(['success' => false, 'msg'=>'Pemakaian air Rekening: '.$norek.' belum diisi. Isikan data meteran di menu Entry Meter!']));
    }
  break;

  case "cekEntryMeter":
  $norek = $_POST['norek'];
  $bln_ini=date("Y-m-d");
  $thn_lalu = date("Y") - 1;
  $bln_lalu = date("m") - 1;
  // Query AMbil data pelanggan, langganan, PEmbayaran bulan lalu
  $qry = "SELECT pelanggan.norek, pelanggan.nama, pelanggan.alamat, payment.bulan, payment.meter_sekarang FROM pelanggan LEFT JOIN payment ON pelanggan.norek = payment.norek WHERE pelanggan.norek = '$norek' ORDER BY payment.meter_sekarang DESC LIMIT 1";
  $run = mysqli_query($con, $qry);
  if(mysqli_num_rows($run) > 0) {

      $result = mysqli_fetch_assoc($run);
      // $cek_bulan = date('M');
      // if($result['bulan'] = $bln_ini ){
      //   print(json_encode(['msg'=> 'Bulan ini sudah bayar']));
        // $result1 = array(['bayar'=>'sudah']);
        print(json_encode($result));
      // }
    } else {
      print(json_encode(['success'=> false, 'kodeErr' => 'norekErr', 'msg' => 'No. Rekening salah atau belum terdaftar']));
    }
  break;
  case "entryMeter":
    $norek = $_POST['norek'];
    $bln_ini = date("Y-m-d");
    $cek_bulan = date('m');
    $cek_tahun = date('Y');
    $meter_lalu = $_POST['meter_lalu'];
    $meter_sekarang = $_POST['meter_sekarang'];
    $selisih = $_POST['jml-meter'];
    $operator = $_SESSION['user'];

    $qryCekBayar = "SELECT * FROM payment WHERE norek = '$norek' AND month(bulan) = '$cek_bulan' AND year(bulan) = '$cek_tahun'";
    $runCheck = mysqli_query($con, $qryCekBayar);
    $cek_bayar = mysqli_num_rows($runCheck);
    $data = mysqli_fetch_assoc($runCheck);
    if ($cek_bayar>0){
      print(json_encode(['success'=> false, 'msg' => "Data Meteran anggota:<b>".$data['norek']."</b> Bulan ini sudah diisi dengan jumlah pemakaian air: <b>" .$data['meter_selisih']." m<sup>3</sup></b>", 'kodeErr'=>'sudbay'])) ;
    } else {
      // Cek Musollah Masjid Madrasah
      $qryMsj = "SELECT * FROM pelanggan WHERE norek = '$norek' AND tipe = 'msj'";
      $runMsj = mysqli_query($con, $qryMsj);
      $msj = mysqli_num_rows($runMsj);
      $tgl_input_meter = date("Y-m-d h:i:s");
      if($msj > 0 ){
        // echo $msj;
        $total_bayar = 0;
        // $total_bayar = $hitung1;
        $terbilang = (Terbilang($total_bayar));

        $qrySvMeter = "INSERT INTO payment (id_bayar, norek, bulan, meter_lalu, meter_sekarang, meter_selisih, abonemen, admin, terbilang, operator, tgl_input_meter, jml_bayar) VALUES('', '$norek', '$bln_ini', '$meter_lalu', '$meter_sekarang', '$selisih', '0','0', '$terbilang', '$operator', '$tgl_input_meter','$total_bayar')";

        $run = mysqli_query($con, $qrySvMeter);
        if ($run) {
          print(json_encode(['success'=> true, 'msg' => 'Data Meter berhasil disimpan. Untuk pembayaran, pilih menu pembayaran di samping', 'kodeErr' => '0'])) ;
        } else {
          print(json_encode(['success' => false, 'kodeErr' => mysqli_errno($con), 'msg' => mysqli_err($con)]));
        }
      } else {

      // Ambil data dari tabel langganan
        $qrySet = "SELECT * FROM settings";
        $runSet = mysqli_query($con, $qrySet);
        $res = mysqli_fetch_assoc($runSet);

        //Penghitungan
        if($selisih > 0){
          if($selisih < 1){
            $hitung = $res['abonemen'];
          } else if( $selisih <= $res['skala1']){
            $hitung = $selisih * $res['range1'];
          } else if($selisih <= $res['skala2']){
            $jmlLebih = $selisih - $res['skala1'];
            $hrgLebih = $jmlLebih * $res['range2'];
            $hrgMin = $res['range1'] * $res['skala1'];
            $hitung = $hrgLebih + $hrgMin;
          } else if($selisih <= $res['skala3']){
            $jmlLebih = $selisih - $res['skala1'];
            $hrgLebih = $jmlLebih * $res['range3'];
            $hrgMin = $res['range1'] * $res['skala1'];
            $hitung = $hrgLebih + $hrgMin;
          } else if($selisih > $res['skala3']){
            $jmlLebih = $selisih - $res['skala1'];
            $hrgLebih = $jmlLebih * 2500;
            $hrgMin = $res['range1'] * $res['skala1'];
            $hitung = $hrgLebih + $hrgMin;
          }

        }

        $total_bayar = $hitung+$res['abonemen'];
        // $total_bayar = $hitung1;
        $terbilang = (Terbilang($total_bayar));

        $qrySvMeter = "INSERT INTO payment (id_bayar, norek, bulan, meter_lalu, meter_sekarang, meter_selisih, abonemen, admin, terbilang, operator, tgl_input_meter, jml_bayar) VALUES('', '$norek', '$bln_ini', '$meter_lalu', '$meter_sekarang', '$selisih', '$res[abonemen]','$res[admin]', '$terbilang', '$operator', '$tgl_input_meter', '$total_bayar')";

        $run = mysqli_query($con, $qrySvMeter);
        if ($run) {
          print(json_encode(['success'=> true, 'msg' => 'Data Meter berhasil disimpan. Untuk pembayaran, pilih menu pembayaran di samping', 'kodeErr' => '0'])) ;
        } else {
          print(json_encode(['success' => false, 'kodeErr' => mysqli_errno($con), 'msg' => mysqli_err($con)]));
        }
      }
    }
  break;
  case "pay":
    $id_bayar = $_POST['idBayar'];
    $norek = $_POST['norek'];
    $tgl_bayar = date('Y-m-d H:i:s');
    $sql = "UPDATE payment
                  SET is_lunas = '1',
                      tgl_bayar = '$tgl_bayar'
                  WHERE id_bayar='$id_bayar' AND norek = '$_POST[norek]'";
    $save = mysqli_query($con, $sql);
    if($save){
      print(json_encode(['success'=> true, 'kodeErr'=>'0', 'msg'=>'Pembayaran rekening '.$norek.' resmi disimpan. Kode Pembyaran :'.$id_bayar]));
    } else {
      print(json_encode(['success' => false, 'kodeErr' => mysqli_errno($con), 'msg'=>mysqli_error($con)]));
    }
  break;
  default:
    echo "Payment";
    break;
}
?>
