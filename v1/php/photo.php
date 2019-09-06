<?php
	$file = fopen("../Modules/photo.txt", "r");
	echo fread($file, filesize("../Modules/photo.txt"));
	fclose($file);
?>