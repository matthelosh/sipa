<?php
session_start();
include_once '../cfg/db.php';



$mode =(isset($_REQUEST['mode']))?$_REQUEST['mode']:null;
switch ($mode) {
  case 'getAll':
    // $qryA = "SELECT * FROM pelanggan WHERE norek='1234'";
    $qryA = "SELECT *, langganan.tipe_plg FROM pelanggan INNER JOIN langganan ON pelanggan.tipe = langganan.id WHERE aktif='y'";
    $run = mysqli_query($con, $qryA);
    if(mysqli_num_rows($run) > 0) {
      $i =1;
     ?>
      <div class="col-sm-12" style="margin-top: 20px;">
        <div class="box box-info">
          <div class="box-header with-border">
            <h1 class="box-title">DATA <small>Pelanggan</small></h1>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
           <thead>
             <th>No</th>
             <th>Kode</th>
             <th>No. Rekening</th>
             <th>Nama</th>
             <th>Alamat</th>
             <th>No. Telp.</th>
             <th>Tipe Langganan</th>
             <th>Aktif</th>
             <th class="hidden-print">Aksi</th>
           </thead>
           <tbody id="tblPelanggan">
             <?php
             while($result = mysqli_fetch_array($run)){

             echo "<tr>
                   <td>$i</td><td>$result[kode]</td><td>$result[norek]</td><td>$result[nama]</td><td>$result[alamat]</td><td>$result[telp]</td><td>$result[tipe_plg]</td><td>$result[aktif]</td><td class='hidden-print'><a href='ajax/customer.php?mode=hapus&norek=$result[norek]'  class='hapusNama' title='Hapus data $result[nama] ?' style=\"color:red \"><i class='fa fa-trash'></i></a>&nbsp;&nbsp;<a href=\"index.php?p=editPelanggan&norek=$result[norek]\" title=\"Edit Data $result[nama]\" style=\"color:orange \"><i class='fa fa-pencil-square-o'></i></a></td>

                  </tr>";
                 $i++;
                }


                ?>
           </tbody>
         </table>
          </div>
        </div>
      </div>
  <?php

// href='ajax/customer.php?mode=hapus&nama=$result[nama]'

    }else{
      echo "Mboh";
    }

    // echo 'Data PElanggan';
    break;
    case "add":
      $cekNorek = "SELECT norek FROM pelanggan WHERE norek = '$_POST[norek]'";
      $cekRun = mysqli_query($con, $cekNorek);
      if (mysqli_fetch_row($cekRun)>0){
        print(json_encode(['success' => false, 'kodeError'=>'dupRek', 'msg' => 'No. Rekening sudah dipakai.']));
      } else {
        $sql_add = "INSERT INTO pelanggan (norek, nama, alamat, telp, tipe) VALUES('$_POST[norek]', '$_POST[nama]', '$_POST[alamat]', '$_POST[telp]', '$_POST[tipe_plg]')";
        $run = mysqli_query($con, $sql_add);
        if(!$run){
          print(json_Encode(['success' => false, 'kodeErr'=>mysqli_errno($con), 'msg' => mysqli_error($con)]));
        }else {
          print(json_encode(['success'=> true, 'kodeErr' => '0', 'msh' => 'Data Pelanggan Berhasil disimpan' ]));
        }
      }
    break;
    case "getNama":
    $nama  =$_POST['search-pelanggan'];
      $qryA = "SELECT *, langganan.tipe_plg FROM pelanggan INNER JOIN langganan ON pelanggan.tipe = langganan.id WHERE nama LIKE '$nama%'";
      // $qryA = "SELECT * FROM pelanggan WHERE nama LIKE '$nama%'";
      $run = mysqli_query($con, $qryA);
      if(mysqli_num_rows($run) > 0) {
        $i =1;
        ?>
        <div class="col-sm-12" style="margin-top:20px">
          <div class="box box-info">
           <div class="box-header with-border">
             <h1>Data Pelanggan</h1>
           </div>
            <div class="box-body">
              <table class="table">
                <thead>
                  <th>No</th>
                  <th>Kode</th>
                  <th>No. Rekening</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No. Telp.</th>
                  <th>Tipe Langganan</th>
                  <th>Aksi</th>
                </thead>
                <tbody id="tblPelanggan">
                <?php
                while($result = mysqli_fetch_array($run)){

                echo "<tr>
                      <td>$i</td><td>$result[kode]</td><td>$result[norek]</td><td>$result[nama]</td><td>$result[alamat]</td><td>$result[telp]</td><td>$result[tipe_plg]</td><td><a href='ajax/customer.php?mode=hapus&norek=$result[norek]'  class='hapusNama' title='Hapus data $result[nama]?' style=\"color:red \"><i class='fa fa-trash'></i></a>&nbsp;&nbsp;<a href=\"index.php?p=editPelanggan&norek=$result[norek]\" title=\"Edit Data $result[nama]\" style=\"color:orange \"><i class='fa fa-pencil-square-o'></i></a></td>

                     </tr>";
                    $i++;
                   }


                   ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
 <?php
      } else {
        ?>
        <div class="col-md-6 col-sm-offset-3" style="margin-top: 50px">
          <div class="box with-border box-danger">
            <div class="box-header">
              <h1 class="page-header">Error!</h1>
            </div>
            <div class="box-body">
              <h5>Pelanggan dengan nama: <b> <?php echo $nama; ?> </b>, belum terdaftar.</h35
            </div>
          </div>
        </div>


        <?php
      }
      // echo $nama;
    break;
    case "hapus":
      $norek = $_REQUEST['norek'];
      $qryDel = "DELETE FROM pelanggan WHERE norek='$norek'";
      $run = mysqli_query($con, $qryDel);
      if($run) {
        echo  'Data pelanggan '.$norek .' berhasil dihapus';
      } else {
        echo 'Gagal menghapus '. mysqli_error($con);
      }
    break;
    case "updPelanggan":
      $kode = $_REQUEST['kode'];
      $supd = "UPDATE pelanggan SET
                                norek = '$_POST[norek]',
                                nama = '$_POST[nama]',
                                alamat = '$_POST[alamat]',
                                telp = '$_POST[telp]',
                                tipe = '$_POST[tipe]'
                WHERE kode = $kode;
      ";
      $doUpd = mysqli_query($con, $supd);
      if($doUpd){
        print(json_encode(['success' => True, 'kodeErr'=>'0', 'msg'=>'Perubahan Data Tersimpan']));
      } else {
        print(json_encode(['success' => false, 'kodeErr' => mysqli_errno($con), 'msg' => 'Data Gagal diperbarui. Karena :'.mysqli_error($con)]));
      }
    break;
  default:
      echo 'Data Pelanggan';
    break;
}
?>
