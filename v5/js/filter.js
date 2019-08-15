$(document).ready(function(){
  var delay_time = 100;

  $("#filter-choice").click(function() {
    $("#filters").toggleClass("dropdown-show");
  });

  $("#filters").click(function(event) {
    var choice = $(event.target).text();
    var id = $(event.target).attr('id');
    $("#filter-choice").html(choice+'<img src = "/img/dropdown.svg">');
    $("#filters").toggleClass("dropdown-show");
    delay_time = 100;
    show_projects(id);
  });

  function show_projects(filter) {
    if (filter == 'all') {
      $(".project").each(function() {
        show_tile(this);
      })
    }
    else {
      $(".project").each(function() {
        if ($(this).hasClass(filter)) {
          show_tile(this);
        }
        else {
          $(this).hide();
        };
      })
    }
  };

  function show_tile(obj) {
    $(obj).css('opacity', '0');
    $(obj).show();
    $(obj).delay(delay_time)
    .animate({opacity: [1, "swing"]}, 1500);
    delay_time += 100;
  }

});
