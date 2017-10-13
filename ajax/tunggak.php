<?php
  include_once '../cfg/db.php';
  $mode = isset($_REQUEST['mode'])?$_REQUEST['mode']:null;
  switch($mode) {
    case "cek-penunggak":
      $bln_ini = date("m");
      $norek = $_POST['norek'];
      $sqlC = "SELECT * FROM payment LEFT JOIN pelanggan ON payment.norek = pelanggan.norek WHERE payment.norek = '$norek' AND month(bulan) < '$bln_ini' AND is_lunas = '0'";
      $runC = mysqli_query($con, $sqlC);
      $rowsC = mysqli_num_rows($runC);
      if($rowsC > 0 ){
        $sumQ = mysqli_query($con, "SELECT sum(jml_bayar) as jml_byr FROM payment WHERE norek = '$norek' AND month(bulan) < 10 AND is_lunas = '0'");
        $sumR = mysqli_fetch_assoc($sumQ);
        $data = array();
        while($resC = mysqli_fetch_array($runC)) {
          array_push($data, $resC);
        }

            print_r(json_encode(['success'=>true, 'kodeErr' => '0', 'data'=>$data, 'jml_byr' => $sumR['jml_byr']]));

        // print_r(array($resC));

      }else {
        print(json_encode(['success'=>false, 'kodeErr' => 'zonk', 'msg' =>'Tidak ada data tunggakan untuk rekening '.$norek]));
      }


    break;
    case "bayarAll":
      $norek = $_REQUEST['norek'];
      $bln_ini = date("m");
      $qT = mysqli_query($con,"SELECT id_bayar FROM payment WHERE month(bulan) < '$bln_ini' AND norek = '$norek' AND is_lunas='0'");
      // $idBayar = array();
      while($T = mysqli_fetch_array($qT)){
        $idBayar = $T['id_bayar'];
        $tgl_bayar = date("Y-m'd h:i:s");
        $qUpdate = "UPDATE payment SET
                                  tgl_bayar = '$tgl_bayar',
                                  is_lunas = '1'
                    WHERE id_bayar = '$idBayar'";
        $update = mysqli_query($con, $qUpdate);



      }
      echo "Pembayaran tunggakan untuk Rekening: " .$norek ." telah tersimpan";
    break;
    case "bayarCicil":
      $idBayar = $_REQUEST['idBayar'];
      $tgl_bayar = date("Y-m-d h:i:s");
      $qbc = mysqli_query($con, "UPDATE payment SET tgl_bayar = '$tgl_bayar', is_lunas = '1' WHERE id_bayar = '$idBayar'");
      if($qbc) {
        echo "Pembayaran tunggakan tersimpan";
      }
    break;

    default:
      print(json_encode(['success'=>true, 'kodeErr' => '0', 'msg' => 'Tunggakan']));
    break;
  }
?>
