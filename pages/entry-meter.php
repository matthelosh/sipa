<section class="content-header" style="border-bottom: 2px solid #678979; padding-bottom: 20px;">
  <h1>
    Dashboard
    <small id="pgHeader">Entri Data Pemakaian Air</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Entri Meter</li>
  </ol>
</section>

<div class="row" style="margin-top: 20px">
  <div class="col-sm-6">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3>Form Entry Data Meter</h3>
      </div>
      <div class="box-body">
        <form class="form form-horizontal" id="entry-data-meter">
          <input type="hidden" name="mode" value="entryMeter">
          <div class="form-group">
            <label for="norek" class="col-sm-4">No. Rekening:</label>
            <div class="input-group col-sm-7 has-addon" >
              <input class="form-control" id="norek-entri-meter" placeholder="Nomor Rekening" name="norek" type="text">
              <span class="input-group-addon" id="btn-entri-meter" style="cursor:pointer"><i class="fa fa-search"></i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-4">Nama:</label>
            <div class="input-group col-sm-7">
              <input class="form-control" id="nama" placeholder="Nama Pelanggan" name="nama" type="text" >
            </div>
          </div>
          <div class="form-group">
            <label for="alamat" class="col-sm-4">Alamat:</label>
            <div class="input-group col-sm-7">
              <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" ></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="meter-lalu" class="col-sm-4">Angka Meter Bulan Lalu:</label>
            <div class="input-group col-sm-7">
              <input class="form-control" id="meter-lalu" placeholder="Meter Bulan Lalu" name="meter_lalu" type="number">
            </div>
          </div>
          <div class="form-group">
            <label for="meter-sekarang" class="col-sm-4">Angka Meter Sekarang:</label>
            <div class="input-group col-sm-7">
              <input class="form-control" id="meter-sekarang" placeholder="Meter Sekarang" name="meter_sekarang" type="number">
            </div>
          </div>
          <div class="form-group">
            <label for="jml-meter" class="col-sm-4">Jumlah Pemakaian:</label>
            <div class="input-group col-sm-7">
              <input class="form-control" id="jml-meter" placeholder="Jml Pemakaian" name="jml-meter" type="number" >
            </div>
          </div>
        </form>

      </div>
      <div class="box-footer">
        <button class="btn bg-maroon btn-flat" id="btnSaveMeter">Simpan</button>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="alert bg-maroon alert-dismissible info-check">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-exclamation-circle"></i> Info!</h4>
      <p class="info-content"></p>
    </div>
  </div>
</div>
