<section class="content-header">
  <h1>
    Dashboard
    <small id="pgHeader">Pembayaran</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Pembayaran</li>
  </ol>
</section>



<div class="row" style="margin-top: 50px">

    <div class="norekBox col-sm-6">
      <div class="box box-primary">
        <div class="box-header with-border box-primary">
          <i class="fa fa-qrcode"></i>
          <h3 class="box-title">No. Rekening</h3>
        </div>
        <form action='./'>
          <div class="box-body">
            <form class="form form-vertical" id="frm-cek-bayar">
              <input type="hidden" name="mode" value="cek">
              <div class="form-group">
                <!-- <label for="norek" class="control-label">No. Rekening/ID Pelanggan</label> -->
                <div class="input-group has-addon">
                  <input class="form-control" id="norek-bayar" placeholder="Nomor Rekening" name="norek" type="text">
                  <span class="input-group-addon" style="cursor:pointer" title="Cek Tagihan" id="btn-cek-bayar"><i class="fa fa-binoculars" ></i></span>
                </div>
              </div>
            </form>
          </div>
        </form>
        <div class="alert">
          <div class="inner">
            <p>No. Rekening: ___<b><span id="rekPelanggan"></span></b>___</p>
            <p>Nama Pelanggan: ___<b><span id="namaPelanggan"></span></b>___</p>
            <p>Alamat: ___<b><span id="alamatPelanggan"></span></b>___</p>
            <p>No. Telp: ___<b><span id="telpPelanggan"></span></b>___</p>
          </div>

        </div>
      </div>


    </div>
    <div class="col-sm-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <i class="fa fa-money"></i>
          <h3 class="box-title">Informasi Tagihan</h3>
        </div>
        <div class="box-body">
          <div class="hidden" id="idBayar"></div>
          <p>Status Pembayaran: <span id="status"></span></p>
          <p>Meter Bulan Lalu: <span id="meter-lalu"></span></p>
          <p>Meter Bulan Sekarang: <span id="meter-sekarang"></span></p>
          <p>Pemakaian Bulan Sekarang: <span id="jml-meter"></span></p>
          <p>Tunggakan Bulan Sebelumnya: <span id="tunggakan" style="color:red"></span> <a href="#" id="gotoPay" class="btn btn-flat bg-maroon btn-sm" style="display:none;">Bayar?</a></p>
          <p>Jumlah Tagihan: <strong><span id="jml-tagihan"></span></strong></p>
        </div>
        <div class="box-footer">
          <button class="btn btn-primary btn-flat" id="save-pay">
            <span class="fa fa-check"></span> Bayar
          </button>
          <input type="hidden" name="mode" value="single">
          <input type="hidden" name="norek-print" value="">
          <button class="btn btn-info btn-flat cetakStruk" disabled>
            <span class="fa fa-print"></span> Cetak Struk
          </button>
        </div>
      </div>

    </div>
  </div>



<div class="row">
  <div class="container">

  </div>

</div>
