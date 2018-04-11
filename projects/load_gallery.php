<?php
echo '<div id = "gallery">';
echo '<div id = "large-thumb">';
foreach ($large_thumb as $key) {
  echo '<img src = "img/thumb/'.$key.'">';
}
echo '</div>';
echo '<div id = "small-thumb">';
foreach ($small_thumb as $key) {
  echo '<img src = "img/thumb/'.$key.'">';
}
echo '</div></div>';
?>
