$(document).ready(function(){
  $("#showCustomer").click(function(){
    showAllPelanggan();
  });

  function showAllPelanggan(){
    $.ajax({
      type: 'post',
      url: 'ajax/customer.php?mode=getAll',
      data: 'mode=getAll',
      // dataType: 'json',
      success: function(data){
        $(".show").html(data);
      }
    });
  }

  $("#btn-add-pelanggan").click(function(){
    var pelanggan = $("#add-pelanggan").serialize();
    $.ajax({
      type: "post",
      url: 'ajax/customer.php?',
      data: pelanggan,
      dataType: 'json',
      success: function(msg){
        if(msg.success == true) {
          $(".modal").modal("hide");
          showAllPelanggan();
        } else {
          alert(msg.msg);
          $("#norek").focus();
        }

      }
    });
  });

  $("#frm-edit-pelanggan").submit(function(e){
    e.preventDefault();
    var data = $(this).serialize();
    var link = $(this).attr('action');
    $.ajax({
      type: "post",
      url: link,
      data: data,
      dataType: 'json',
      success : function(res){
        alert(res.msg);
      }
    });
  });

  // MEnu
  $(".sidebar-menu li a").click(function(){
    var link = $(this).attr('href');
    window.location.href= link;
  });

  $("#btn-search-pelanggan").click(function(){
    showMe();
  });
  $("#search-pelanggan").keypress(function(e){
    if(e.which == 13 ){
        showMe();
        return false;
    }


  });
  function showMe(){

    var data = $("#frm-cari-pelanggan").serialize();
    $.ajax({
      method: 'POST',
      url: 'ajax/customer.php',
      data: data,
      success: function(data){
        $(".show").html(data);
      }

    });
  };

  $(document).on('click', '.hapusNama', function(){
    var url = $(this).attr('href');

    var del = confirm('Ingin Menghapus Data Pelanggan?');
    if(del){
      $.ajax({
        url: url,
        method: 'GET',
        success: function(msg){
          alert(msg);
          showAllPelanggan();
          // window.location.reload();
        }
      });
    } else {
      return false;
    }

    return false;
  });

  $("#norek-bayar").keypress(function(e) {
    if(e.which == 13){
      cekBayar();
      return false;
    }


  });
//
// Payment
  $("#btn-cek-bayar").click(function(){
    cekBayar();
  });

  function cekBayar(){
    var norek = $("#norek-bayar").val();
    var data = 'mode=cek&norek='+norek;
    if(isNaN(norek)){
      alert('Harus berupa Angka');
      $("#norek-bayar").val("").focus();
      return false;
    } else if ( norek == ""){
      alert('Isikan No. Rekening Pelanggan!');
      $("#norek-bayar").focus();
      return false;
    }
    $.ajax({
      method: 'post',
      url: 'ajax/pay.php',
      data: data,
      dataType: 'json',
      success: function(res){
        if(res.success == false){
          alert(res.msg);
          $("#norek-bayar").val("").focus();
          $("#rekPelanggan").html("");
          $("#namaPelanggan").html("");
          $("#alamatPelanggan").html("");
          $("#telpPelanggan").html("");
          $("#permeter").html("<strong>"+res.permeter+"</strong>");

          // return false;
        }else{
            if(res.is_lunas == '0'){
              $("#status").html("<b>Belum dibayar.</b>");
              $("#jml-tagihan").html("Rp. "+res.jml_bayar+" - <span style='text-transform: capitalize'>"+ res.terbilang+"</span> Rupiah");

              $("#save-pay").prop("disabled", '');
            }else{
              var d = new Date();
              var bulan = Number(d.getMonth());
              var tahun = d.getFullYear();
              $("#status").html("<b>Sudah dibayar.</b>");
              $("#jml-tagihan").html("<b>Tagihan Bulan "+ (bulan + 1) + " - "+ tahun +" Sudah dibayar</b>");
              $("#save-pay").prop("disabled", 'disabled');
            }
            $("#idBayar").html(res.id_bayar);
            $("#rekPelanggan").html(res.norek);
            $("#namaPelanggan").html(res.nama);
            $("#alamatPelanggan").html(res.alamat);
            $("#telpPelanggan").html(res.telp);
            $("#meter-lalu").html("<b>"+res.meter_lalu+"</b>");
            $("#meter-sekarang").html("<b>"+res.meter_sekarang+"</b>");
            if(res.tunggakan > 0) {
              alert('No. Rekening Memiliki tunggakan');
              $("#tunggakan").html("<b>"+res.blnTunggak +" Bulan, sebesar Rp. " + res.tunggakan +".</b>");

              $("#gotoPay").css({ 'display': 'inline', 'color': '#129947', 'text-transform': 'uppercase', 'font-weight':'600'}).prop('href','index.php?p=tunggakan&mode=bayarTunggakan&norek='+res.norek);
            } else {
              $("#tunggakan").html("<b> Tidak ada Tunggakan. </b>");
              $("#gotoPay").hide();
            }

            $("#jml-meter").html("<b>"+res.meter_selisih+"</b>");

        }

      }

    });
  }
// Save payment
  $("#save-pay").click(function(){
    var idBayar = $("#idBayar").html();
    var norek = $("#rekPelanggan").html();
    var jmlTagihan = $("#jml-tagihan").html();
    var status = $("#status").html();
    if(!jmlTagihan){
      alert('Cek dulu jumlah tagihan dengan mencari data rekening');
      $("#norek-bayar").focus();
    } else {
      var okBayar = confirm('Simpan Data Pembayaran?');
      if(okBayar){
        if(status == '<b>Belum dibayar.</b>'){
          var data = 'mode=pay&idBayar='+idBayar+'&norek='+norek;
          $.ajax({
            method: 'POST',
            url: 'ajax/pay.php',
            data: data,
            dataType: 'json',
            beforeSend: function(){
              $("#save-pay").text('Menyimpan ...')
            },
            success: function(res){
              alert(res.msg);
              $(".cetakStruk").prop('disabled', false);
            }
          });
        } else if(status == '<b>Sudah dibayar.</b>') {
          alert('Tagihan sudah dibayar.');
          $("#norek-bayar").focus();
          $(".cetakStruk").prop('disabled', false);
          return false;
        }

      } else {
        alert('Pembayaran dibatalkan. Klik bayar untuk menyimpan pembayaran!');
      }
    }
  });
  // Cetak struk
  $(".cetakStruk").click(function() {
    var idBayar = $("#idBayar").html();
    var printWindow = window.open(location.protocol+"//"+location.host+'/sipa/pages/cetak.struk.php?cetakStruk&id_bayar='+idBayar, 'Print');
    printWindow.addEventListener('load', function() {
      printWindow.print();
      printWindow.close();
    }, true);
  });

  $("#btnStrukBulan").click(function() {
    var strukBulan = window.open(location.protocol+"//"+location.host+'/sipa/pages/cetak.strukBulan.php', 'Print');
    strukBulan.addEventListener('load', function() {
      strukBulan.print();
      printBulan.close();
    });
  });

  // No Rekening form entri data Meter
  // $("#norek-entri-meter").keypress(function(e){
  //   if(e.which == 13){
  //
  //     entryMeter();
  //   }
  // });
  $("#btn-entri-meter").click(function(){

    entryMeter();
  });
  $("#norek-entri-meter").change(function(){
    entryMeter();
  });
  function entryMeter(){
    var norek = $("#norek-entri-meter").val();
    if((norek.length < 1)){
      alert('Masukkan No. Rekening');
      $("#norek-entri-meter").focus();
      return false;
    }else if(isNaN(norek)){
      alert('No. Rekening harus berupa angka');
      $("#norek-entri-meter").focus();
      return false;
    } else {
      var data = 'mode=cekEntryMeter&norek='+norek;
      $.ajax({
        url: 'ajax/pay.php',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function(res){
          if(!res.kodeErr){
            // console.log(res.msg);
            var bulanini = new Date().getMonth()+1;
            $("#nama").val(res.nama);
            $("#alamat").val(res.alamat);
            if(res.meter_sekarang == null){
              $("#meter-lalu").val(0);
              $("#meter-sekarang").val("");
              $("#jml-meter").val("");
            }else{
              $("#meter-lalu").val(res.meter_sekarang);
            }
            $(document).on('keyup', '#meter-sekarang', function(){
              var jmlMeter = $('#meter-sekarang').val() - $("#meter-lalu").val()
              $("#jml-meter").val(jmlMeter);
            });
          } else {
            alert(res.msg);
            $("#norek-entry-meter").focus()
          }
        }
      });
    }
  }

  // Simpan data meter
  $("#btnSaveMeter").click(function(){
    if($("#norek-entri-meter").val() == ""){
      alert('Entri data dahulu!');
      $("#norek-entri-meter").focus()
      return false;
    } else if($("#meter-sekarang").val() == "") {
      alert("Angka Meter Bulan ini belum dimasukkan atau berupa huruf. Cek ulang");
      $("#meter-sekarang").focus();
      return false;
    } else if(Number($("#meter-lalu").val()) > Number($("#meter-sekarang").val())){
      alert('Data meter bulan ini tidak valid. Coba cek apakah lebih kecil dari meter bublan lalu');
      $("#meter-sekarang").focus();
    } else {
      var data = $("#entry-data-meter").serialize();
      $.ajax({
        url: 'ajax/pay.php',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function(res){
          if(res.success == false && res.kodeErr == "sudbay"){
            $(".info-content").html(res.msg);
            resetForm();
            $(".info-check").removeClass("alert-success").addClass("bg-maroon");
            setTimeout(function(){
              $(".info-content").html("");
            },4500);
          } else if(res.success == true){
            $(".info-check").removeClass("bg-maroon").addClass("alert-success");
            $(".info-content").html(res.msg);
            resetForm();
            setTimeout(function(){
              $(".info-content").html("");
            },1000);
          }
          // $(".info-check").toggleClass("hidden");

          // $("#entry-data-meter").reset();
        }
      })
    }
  });

  // settings
  $(".edit-input").click(function(){
    $(this).siblings().prop('disabled', false).focus();
  });
  $("#form-settings").submit(function(e){
    e.preventDefault();
    var disabled = $(this).find(':input:disabled').removeAttr('disabled');
    var data = $(this).serialize();
    disabled.attr('disabled', 'disabled');
    var url = $(this).attr('action');
    console.log(url);
    $.ajax({
      url: url,
      data: data,
      method: 'POST',
      dataType: 'json',
      beforeSend: function(){
        $(".btn-save").text('Menyimpan ...')
      },
      success: function(res){
        if(res.success == true){
          location.reload()
        } else {
          alert(res.msg);
        }
      }
    });
  });

// Rekapitulasi Pembayaran
  $("#bulan").datepicker({
    format: 'MM',
    viewMode: "months",
    minViewMode: "months",
    autoClose: true
  });

  $("#tahun").datepicker({
    format: "yyyy",
    viewMode: 'years',
    minViewMode: 'years',
    autoClose: true
  });

// Tunggakan
$(".show-detil-tunggak").click(function(){
  $(this).siblings(".detil-tunggak").slideToggle(500);
});
$(".detil-tunggak").click(function(){
  $(this).slideUp(500);
});

$("#frmCekTunggakan").on("submit", function(){
  // var data = $(this).serialize();
  cekpenunggak();
  return false;
});
$("#cariPenunggak").click(function(){
  cekpenunggak();

});

$("#bayar-all-tunggakan").click(function(){
  var konfirm = confirm('Bayar Semua Tunggakan?');
  if(konfirm){
    var norek = $("#norek-tunggak").val();
    $.ajax({
      url: 'ajax/tunggak.php',
      data: 'mode=bayarAll&norek='+norek,
      method: 'POST',
      success: function(res){
        alert(res);
      }
    });
  } else {
    return false;
  }

});

$("#bayar-cicil-tunggakan").click(function(){
  alert("Angsur Tunggakan?");
});


function cekpenunggak(){
  var data = $("#frmCekTunggakan").serialize();
  $.ajax({
    url: 'ajax/tunggak.php',
    method: 'POST',
    data: data,
    dataType: 'json',
    success: function(res) {
      if(res.success == true) {
        var tunggakan = res.jml_byr;

        $("#namaPenunggak").text(res.data[0].nama);
        $("#alamatPenunggak").text(res.data[0].alamat);
        $("#telpPenunggak").text(res.data[0].telp);

        var rinci = "";
        var i;
        for(i=0; i < res.data.length; i++) {
          var d = new Date(res.data[i].bulan);
          var bulan = new Array();
            bulan[0] = 'Januari';
            bulan[1] = 'Pebruari';
            bulan[2] = 'Maret';
            bulan[3] = 'April';
            bulan[4] = 'Mei';
            bulan[5] = 'Juni';
            bulan[6] = 'Juli';
            bulan[7] = 'Agustus';
            bulan[8] = 'September';
            bulan[9] = 'Oktober';
            bulan[10] = 'Nopember';
            bulan[11] = 'Desember';
          var idBayar = res.data[i].id_bayar;
          var bln = bulan[d.getMonth()];
          var thn = d.getFullYear();
          // var bln = d.getMonth();
          rinci += "<br>" + bln + " - " +thn+" : "+ res.data[i].jml_bayar + " | <a href='javascript:void(0);' class='btn btn-xs btn-danger bayar-cicil-tunggakan' idBayar="+res.data[i].id_bayar+" bulan="+bln+" th="+thn+">Bayar</a>";
        }
        $("#rincian-tunggakan").html( rinci );
        $("#jml-tunggakan").text("Rp. "+ tunggakan);
        $(".btn-bayar-tunggakan").show(500);
      } else if(res.success == false && res.kodeErr == 'zonk') {
        alert( res.msg);
        $("#namaPenunggak").text('');
        $("#alamatPenunggak").text('');
        $("#telpPenunggak").text('');
        $("#jml-tunggakan").text("Rp. "+'-');
      }


    }
  });
}

$(document).on("click", ".bayar-cicil-tunggakan", function(e){
  e.preventDefault();
  var norek = $("#norek-tunggak").val();
  var idBayar = $(".bayar-cicil-tunggakan").attr('idBayar');
  var bulan = $(".bayar-cicil-tunggakan").attr('bulan');
  var th = $(".bayar-cicil-tunggakan").attr('th');
  var konfirm = confirm('Proses Pembayaran Tunggakan Bulan '+bulan+' - '+th+'?');
  if(konfirm){
    $.ajax({
      method: 'POST',
      url: 'ajax/tunggak.php',
      data: 'mode=bayarCicil&idBayar='+idBayar,
      success: function(res) {

        var c = confirm(res+'. Cetak Struk?');
        if(c){
          window.location.assign('pages/struk-tunggakan.php?norek='+norek);
        }else{
          window.location.assign('index.php?p=tunggakan&mode=bayarTunggakan&norek='+norek);
        }

      }
    })
  }
  // alert(idBayar);
  return false;
});

function bayarTunggakCicil(){
  alert('hi');
}
  function resetForm(){
    $(":not([name=mode])").val("");
  }
});
