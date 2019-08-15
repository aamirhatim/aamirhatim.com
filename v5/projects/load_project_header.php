<?php
// echo '<div id = "project-title">';
// echo '<h3>'.$title.'</h3>';
// echo '<h4>'.$proj_desc.'</h4>';
// echo '</div>';
// if (trim($video) != "none") {
//   echo '<iframe class = "header-video" src = "'.$video.'"></iframe>';
// }
if (trim($color_scheme[0]) != "none") {
  echo ' &nbsp; style="background: linear-gradient(to right,'.$color_scheme[0].','.$color_scheme[1].');"';
}
else {
  echo ' &nbsp; style="background: linear-gradient(to left, #8400FF, #B600FF);"';
}
?>
