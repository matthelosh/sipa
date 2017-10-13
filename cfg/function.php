<?php
include_once 'db.php';
function Terbilang($x)
{
  if(empty($x)){
    $x = 0;
  }
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . " belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
}

// CekTunggakan
// function cekTunggakan($con){
//   $bulan_ini = date('m');
//   $sql  = "SELECT * FROM payment WHERE month(bulan) < '$bulan_ini' AND is_lunas='0'";
//   $run  = mysqli_query($con, $sql);
//   $rows = mysqli_num_rows($run);
//
//   while($r=mysqli_fetch_assoc($run)){
//     echo "<li>".$r['norek']."</li>";
//   }
// }
// echo "<ul>"
//       .cekTunggakan($con).
//       "</ul>";
?>
