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
        success: function(msg){
          setTimeout(function(){
            $("#inpo").txt("Anda akan masuk sebentar lagi. Mohon Tunggu..");
          }, 2000);
          window.location.href="index.php";
        }
      })
    }
    return false;
  });
});
