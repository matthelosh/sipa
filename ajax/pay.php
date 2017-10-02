<?php
session_start();
include_once '../cfg/db.php';
$mode = (isset($_REQUEST['mode']))?$_REQUEST['mode']:null;

switch ($mode) {

  case 'cek':
    $norek = $_POST['norek'];
    $qryCek = "SELECT *, langganan.permeter FROM pelanggan INNER JOIN langganan ON pelanggan.tipe=langganan.id WHERE norek = '$norek'";
    $run = mysqli_query($con, $qryCek);

    if(mysqli_num_rows($run)>0){
      $result = mysqli_fetch_assoc($run);
      echo json_encode($result);
    } else {
      print(json_encode(['success' => false, 'msg'=>'Tidak ada data. Cek ulang no. rekening']));
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
      $qrySvMeter = "INSERT INTO payment (id_bayar, norek, bulan, meter_lalu, meter_sekarang, meter_selisih, operator) VALUES('', '$norek', '$bln_ini', '$meter_lalu', '$meter_sekarang', '$selisih', '$operator')";

      $run = mysqli_query($con, $qrySvMeter);
      if ($run) {
        print(json_encode(['success'=> true, 'msg' => 'Data Meter berhasil disimpan. Untuk pembayaran, pilih menu pembayaran di samping', 'kodeErr' => '0'])) ;
      } else {
        echo "Error ". mysqli_error($con);
      }
    }
  break;
  case "pay":
    echo "Bayar Tagihan";
  break;
  default:
    echo "Payment";
    break;
}
?>
