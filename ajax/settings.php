<?php
  include_once '../cfg/db.php';
  // echo "Update Setting";
  $id = $_POST['id'];
  $sql = "UPDATE settings
              SET range1 = '$_POST[range1]',
                  range2 = '$_POST[range2]',
                  range3 = '$_POST[range3]',
                  standar = '$_POST[standar]',
                  abonemen = '$_POST[abonemen]',
                  skala1 = '$_POST[skala1]',
                  skala2 = '$_POST[skala2]',
                  skala3 = '$_POST[skala3]',
                  admin = '$_POST[admin]'
            WHERE id = '$id';
          ";
  $run = mysqli_query($con, $sql);
  if($run) {
    print(json_encode(['success' => true, 'kodeErr' => '0', 'msg' => 'Data Pengaturan berhasil diperbarui']));
  } else {
    print(json_encode(['success' => false, 'kodeErr' => mysqli_errno($con), 'msg' => mysqli_error($con)]));
  }
?>
