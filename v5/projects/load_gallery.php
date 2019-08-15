<?php
echo '<div id = "gallery">';
if (trim($video) != "none") {
  echo '<style>#gallery{background-color: rgba(255,255,255,.9); box-shadow: 0 0 20px rgba(0,0,0,.2);}</style>';
  echo '<iframe class = "header-video" src = "'.$video.'" allow = "autoplay; encrypted-media" allowfullscreen></iframe>';
}

echo '<div id = "pics">';
if (trim($large_thumb[0]) != 'none') {
  echo '<style>#gallery{background-color: rgba(255,255,255,.9); box-shadow: 0 0 20px rgba(0,0,0,.2);}</style>';
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
echo '</div></div>';
?>
