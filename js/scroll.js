$(document).ready(function(){
  // $("#test").html();

  var scrollPos = $(document).scrollTop();
  var contactDim = $("#email").position();
  var skillHeight = $("#skills").outerHeight(true);

  //initial positions
  setLineHeight(scrollPos);
  checkHeight(scrollPos, contactDim.top);
  animateSkill(scrollPos, 200);

  //animate on scroll
  $(document).scroll(function() {
    scrollPos = $(document).scrollTop();
    if (scrollPos < 500) {
      setLineHeight(scrollPos);
    }
    checkHeight(scrollPos, contactDim.top);
    animateSkill(scrollPos, 200);
  });

  function setLineHeight(scroll) {
    $("#superlative-container").css("top", .5*scroll + "px");
    $("#superlative-container").css("opacity", 1-(scroll/500));
    $("#title-name").css("opacity", 1-(scroll/500));
  };

  function checkHeight(scroll, height) {
    if (scroll >= height-700) {
      $("#email").animate({width: "50%"});
    }
  };

  function animateSkill(scroll, base) {
    if (scroll > 0) {
      var diff = 120*(skillHeight-scroll)/skillHeight;
      $("#skills").css("top", (-1)*(diff+base) + "px");
    }
  };

});
