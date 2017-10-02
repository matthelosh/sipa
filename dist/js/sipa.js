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
      success: function(msg){
        $(".modal").modal("hide");
        showAllPelanggan();
      }
    });
  });
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


  })
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
          $("#rekPelanggan").html(res.norek);
          $("#namaPelanggan").html(res.nama);
          $("#alamatPelanggan").html(res.alamat);
          $("#telpPelanggan").html(res.telp);
          $("#permeter").html("<strong>"+res.permeter+"</strong>");
        }

      }

    });
  }

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
    } else if(Number($("#meter-lalu").val()) >= Number($("#meter-sekarang").val())){
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
            setTimeout(function(){
              $(".info-content").html("");
            },4000);
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


  
  function resetForm(){
    $(":not([name=mode])").val("");
  }
});
