<section class="content-header">
  <h1>
    Dashboard
    <small id="pgHeader">Edit Pelanggan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Edit Pelanggan</li>
  </ol>
</section>

<?php
  $norek = $_REQUEST['norek'];
  $sql = "SELECT * FROM pelanggan  WHERE norek = '$norek'";
  $run = mysqli_query($con, $sql);
  $res = mysqli_fetch_assoc($run);


?>

<div class="row" style="margin-top: 20px;">
  <div class="col-sm-8 col-sm-offset-2">


    <div class="box box-primary">
      <div class="box-header with-border">
        <h1 class="box-title">Edit Data Pelanggan</h1>
      </div>
      <div class="box-body">
        <form action="ajax/customer.php" class="form" id="frm-edit-pelanggan">
          <input type="hidden" name="kode" value="<?php echo $res['kode']; ?>">
          <input type="hidden" name="mode" value="updPelanggan">
          <div class="form-group">
            <label for="norek"> NO. Rekening</label>
            <div class="input-group has-addon">
              <input type="text" name="norek" id="norek" class="form-control" placeholder="No. Rekening" value="<?php echo $res['norek']; ?>">
              <span class="input-group-addon"><i class="fa fa-qrcode"></i></span>
            </div>

          </div>
          <div class="form-group">
            <label for="norek"> Nama</label>

            <div class="input-group has-addon">
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pelanggan" value="<?php echo $res['nama']; ?>">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="norek"> Alamat</label>
            <div class="input-group has-addon">
              <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="<?php echo $res['alamat']; ?>">
              <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
            </div>

          </div>
          <div class="form-group">
            <label for="norek"> No. Telepon</label>
            <div class="input-group has-addon">
              <input type="text" name="telp" id="telp" class="form-control" placeholder="No. Telepon" value="<?php echo $res['telp']; ?>">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            </div>
          </div>

          <div class="form-group">
            <label for="tipeLangganan">Jenis Langganan</label>
            
            <div class="input-group has-addon">
              <select name="tipe" id="tipe" class="form-control">
                <?php

                  $s = "SELECT * FROM langganan";
                  $q = mysqli_query($con, $s);
                  while($r = mysqli_fetch_assoc($q)){
                    if($r['id'] == $res['tipe']){
                      echo "<option selected='selected' value='".$r['id']."'>".$r['tipe_plg']."</option>";
                    }else {
                      echo "<option value='".$r['id']."'>".$r['tipe_plg']."</option>";
                    }
                  }

                 ?>
              </select>
              <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
            </div>
          </div>


          <div class="input-group col-sm-1 col-sm-offset-5">
            <button type="submit" class="btn btn-flat bg-teal center-block">Perbarui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
