
<section class="content-header" >
  <h1>
    Dashboard
    <small id="pgHeader">Pelanggan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">pelanggan</li>
  </ol>
</section>

 <div class="row hidden-print" style="margin-top: 20px">
   <div class="col-sm-4">
     <div class="btn-group">
       <button type="button" name="button" id="showCustomer" class="btn btn-primary btn-flat"><i class="fa fa-table"></i> Lihat Pelanggan</button>
       <button class="btn btn-info btn-flat" data-toggle="modal" data-target="#addCustomer"><i class="fa fa-asterisk"></i> Tambah Pelanggan</button>
     </div>

   </div>
   <div class="col-sm-6">
     <form class="form form-horizontal" method="post" id="frm-cari-pelanggan">
       <input type="hidden" name="mode" value="getNama">
       <div class="col-sm-8 has-addon">
         <label for="search-pelanggan" class="col-sm-2">Cari: </label>
         <div class="input-group">
             <input type="text" name="search-pelanggan" value="" class="form-control" id="search-pelanggan" placeholder="Masukkan Nama Pelanggan">
             <span class="input-group-addon" id="btn-search-pelanggan" type="submit"><i class="fa fa-search"></i></span>
         </div>

       </div>
     </form>


   </div>
 </div>

<div class="row">

</div>

<div class="row">
  <div class="show">

  </div>
</div>

<div class="modal modal-primary fade" id="addCustomer">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Pelanggan</h4>
      </div>
      <div class="modal-body">
        <form class="form frm-add-customer" method="post" id="add-pelanggan">
          <input type="hidden" name="mode" value="add">
          <div class="form-group">
            <label for="norek">No. Rekening:</label>
            <input type="text" class="form-control" name="norek" value="" placeholder="No. Rekening">
          </div>
          <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" name="nama" value="" placeholder="Nama Pelanggan">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea type="text" class="form-control" name="alamat" value="" placeholder="Alamat"></textarea>
          </div>
          <div class="form-group">
            <label for="tipe_plg">Tipe Langganan</label>
            <select  class="form-control" name="tipe_plg">
              <option value="0">Tipe Langganan</option>
              <option value="rum">Rumah</option>
              <option value="mas">Masjid/Mushola</option>
              <option value="pab">Pabrik</option>
              <option value="lau">Loundry/Pencucian</option>
              <option value="sek">Sekolah/Madrasah</option>
              <option value="swa">Swalayan</option>
              <option value="tok">Toko</option>
              <option value="war">Warung</option>
            </select>
          </div>
          <div class="form-group">
            <label for="telp">No. Telp:</label>
            <input type="text" class="form-control" name="telp" value="" placeholder="No. Telepon / HP">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-outline" id="btn-add-pelanggan">Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
