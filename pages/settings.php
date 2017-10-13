<?php
  // session_start();
  // include_once('cfg/db.php');
?>
<section class="content-header" style="border-bottom: 2px solid #678979; padding-bottom: 20px;">
  <h1>
    Dashboard
    <small id="pgHeader">Pengaturan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Entri Meter</li>
  </ol>
</section>
<?php
  $sql = "SELECT * FROM settings LIMIT 1";
  $run = mysqli_query($con, $sql);
  $setting = mysqli_fetch_assoc($run);

?>

<div class="row">
  <div class="col-sm-10 col-sm-offset-1">
    <!-- <div class="box box-primary"> -->
      <div class="box-header with-border">
        <h1 class="box-title">Pengaturan Dasar</h1>
      </div>
      <div class="box-body">
        <form action="ajax/settings.php" class="form-vertical" id="form-settings">
          <input type="hidden" name="id" value="<?php echo $setting['id']; ?>">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="range1">Tarif Pemakaian Minimum</label>

              <div class="input-group has-addon">
                <input type="text" name="range1" class="form-control" value="<?php echo $setting['range1']; ?>" disabled>
                <span class="input-group-addon edit-input"><i class="fa fa-pencil"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label for="range1">Tarif Pemakaian Menengah</label>

              <div class="input-group has-addon">
                <input type="text" name="range2" class="form-control" value="<?php echo $setting['range2']; ?>" disabled>
                <span class="input-group-addon edit-input"><i class="fa fa-pencil"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label for="range1">Tarif Pemakaian Maximum</label>
              <div class="input-group has-addon">
                <input type="text" name="range3" class="form-control" value="<?php echo $setting['range3']; ?>" disabled>
                <span class="input-group-addon edit-input"><i class="fa fa-pencil"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label for="range1">Tagihan Standar</label>
              <div class="input-group has-addon">
                <input type="text" name="standar" class="form-control" value="<?php echo $setting['standar']; ?>" disabled>
                <span class="input-group-addon edit-input"><i class="fa fa-pencil"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label for="range1">Beban Dasar</label>
              <div class="input-group has-addon">
                <input type="text" name="abonemen" class="form-control" value="<?php echo $setting['abonemen']; ?>" disabled>
                <span class="input-group-addon edit-input"><i class="fa fa-pencil"></i></span>
              </div>
            </div>

          </div><!--End Column 1 -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="range1">Skala Penghitungan Minimum</label>
              <div class="input-group has-addon">
                <input type="text" name="skala1" class="form-control" value="<?php echo $setting['skala1']; ?>" disabled>
                <span class="input-group-addon edit-input"><i class="fa fa-pencil"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label for="range1">Skala Penghitungan Menengah</label>
              <div class="input-group has-addon">
                <input type="text" name="skala2" class="form-control" value="<?php echo $setting['skala2']; ?>" disabled>
                <span class="input-group-addon edit-input"><i class="fa fa-pencil"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label for="range1">Skala Penghitungan Maksimum</label>
              <div class="input-group has-addon">
                <input type="text" name="skala3" class="form-control" value="<?php echo $setting['skala3']; ?>" disabled>
                <span class="input-group-addon edit-input"><i class="fa fa-pencil"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label for="range1">Biaya Admin</label>
              <div class="input-group has-addon">
                <input type="text" name="admin" class="form-control" value="<?php echo $setting['admin']; ?>" disabled>
                <span class="input-group-addon edit-input"><i class="fa fa-pencil"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label for="range1">Simpan Perubahan</label>
              <div class="input-group center-block">
                <button type="submit" class="btn btn-flat bg-orange btn-save">Simpan Perubahan</button>
              </div>
            </div>
          </div><!-- End Column 2 -->

        </form>
      </div>
    </div>
  </div>

</div>
