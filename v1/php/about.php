<?php
	$file = fopen("../Modules/about.txt", "r");
	echo fread($file, filesize("../Modules/about.txt"));
	fclose($file);
?>