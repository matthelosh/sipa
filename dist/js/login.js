$(document).ready(function() {
  // $("#woro").text() ="Halo";
  $("#loginBtn").click(function(){
    if($("#username").val()==""){
      $("#inpo").text("Username kosong");
      $("#username").focus();
      return false;
    }else if($("#password").val()==""){
      $("#inpo").text("Password masih Kososng");
      $("#password").focus();
      return false;
    }else{
      var data = $("#form-login").serialize();
      $.ajax({
        method: 'POST',
        url: 'ajax/loginCall.php',
        data: data,
        beforeSend: function(){

            $("#inpo").html('Mohon Tunggu. Username sedang diperiksa');



        },
        success: function(msg){
          if(msg == "ok") {
            $("#inpo").html('Monggo, Silahkan Masuk!');
            window.location.href="index.php";
          } else {
            $("#inpo").html('Username atau Password tidak sesuai. Mohon dicek kembali');
            $("#username").focus();
          }

        }
      })
    }
    return false;
  });
});
