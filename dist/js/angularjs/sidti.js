$(document).ready(function(){
//    $("#sideToggle").click(function(){
//        var sideWidth = $(".side").width();
//        console.log(sideWidth);
//        $(this).find('i').toggleClass('fa-toggle-on fa-toggle-off');
//        $(".side").toggleClass('sideHide');
//        $(".main").toggleClass("mainSlide");
//    });

   if($(window).width() < 768){
       $(".side").addClass("sideHide");
    //    $("#sideToggle").find('i').toggleClass('fa-toggle-on fa-toggle-off');
       $(".main").addClass("mainSlide");
   }

  
});