$(document).ready(function(){
  var anchor;
  var pos;

  anchor = $(".title_img").position();

  $(".title_img .block").each(function() {
    pos = $(this).position();
    xPos = anchor.left - pos.left;
    yPos = anchor.top - pos.top;

    $(this).css("background-image", "url('img/titleBG.jpg')");
    $(this).css("background-position-x", xPos);
    $(this).css("background-position-y", yPos);
  });
});
