<?php
$project_info = file('project_info.txt');
$title = $project_info[1];
$proj_tile = $project_info[4];
$tile_loc = $project_info[7];
$tile_desc = $project_info[10];
$tile_extra = $project_info[13];
$proj_desc = $project_info[16];
$video = trim($project_info[19]);
$skills = explode(',', $project_info[22]);
$concepts = explode(',', $project_info[25]);
$github = trim($project_info[28]);
$small_thumb = explode(',', $project_info[31]);
$large_thumb = explode(',', $project_info[34]);
$color_scheme = explode(',', $project_info[40]);
?>
