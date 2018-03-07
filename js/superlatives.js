$(document).ready(function(){
  $("#title-name").hide();
  $("#superlative").hide();

  var superlatives = ["engineer",
                      "problem solver",
                      "programmer",
                      "3D designer",
                      "snowboarder",
                      "cyclist",
                      "photographer",
                      "creative thinker",
                      "explorer",
                      "graphic designer",
                      "weekend adventurer",
                      "obsessive flosser",
                      "freelancer",
                      "cooking enthusiast",
                      "artist",
                      "developer",
                      "team player",
                      "consultant"];

  var spans = "<span>";
  for (var i = 0; i < superlatives.length; i++) {
    spans = spans + superlatives[i] + " </span><span>";
  }
  spans = spans + "</span>";

  $("#title-name").fadeIn({queue: false, duration: 1000, complete: function() {
    $(spans).hide().appendTo("#superlatives").each(function(i) {
        $(this).delay(100 * i).fadeIn(1000);
    });
  }});

});
