<?php
echo '<div id = "gallery">';
if (trim($large_thumb[0]) != 'none') {
  echo '<div id = "large-thumb">';
  foreach ($large_thumb as $key) {
    echo '<img src = "img/thumb/'.$key.'">';
  }
  echo '</div>';
}

if (trim($small_thumb[0]) != 'none') {
  echo '<div id = "small-thumb">';
  foreach ($small_thumb as $key) {
    echo '<img src = "img/thumb/'.$key.'">';
  }
  echo '</div>';
}
echo '</div>';
?>
