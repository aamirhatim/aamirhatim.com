$(document).ready(function(){
  $("nav").hide();
  $("nav").fadeIn("slow");
  var delay_time = 200;

  $(".project").each(function() {
    if ($(this).hasClass('highlight')) {
      $(this).delay(delay_time)
      .animate({opacity: [1, "swing"]}, 500);
      delay_time += 60;
    }
    else {
      $(this).hide();
    };
  });

});
