<?php
session_start();
include_once '../cfg/db.php';



$mode =$_GET['mode'];
switch ($mode) {
  case 'getAll':
    $qryA = "SELECT * FROM pelanggan";
    $run = mysqli_query($con, $qryA);
    if(mysqli_num_rows($run) > 0) {
      $i =1;
     ?>
       <div class="box-body table-responsive">
      <div class="container">
        <div class="col-sm-6">
          <h1>Data Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <a href="javascript:void(0);" class="btn btn-danger">Tambah Pelanggan</a>
        </div>
      </div>
       <table class="table">
         <thead>
           <th>No</th>
           <th>Kode</th>
           <th>No. Rekening</th>
           <th>Nama</th>
           <th>Alamat</th>
           <th>No. Telp.</th>
         </thead>
         <tbody id="tblPelanggan">
           <?php
           while($result = mysqli_fetch_array($run)){

           echo "<tr>
                 <td>$i</td><td>$result[kode]</td><td>$result[norek]</td><td>$result[nama]</td><td>$result[alamat]</td><td>$result[telp]</td>

                </tr>";
               $i++;
              }


              ?>
         </tbody>
       </table>
     </div>
  <?php



    }else{
      echo "Mboh";
    }

    // echo 'Data PElanggan';
    break;

  default:
      echo "<h1>data Pelanggan</h1>";
    break;
}
?>
