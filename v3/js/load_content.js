$(document).ready(function(){
  var id;
  var path;

  // document.getElementById("about").innerHTML = "hi";

  $(".load").each(function() {
    id = this.id;
    path = "html/" + id + ".html";

    $(this).load(path);
    // document.getElementById("about").innerHTML = path;
  });
});
