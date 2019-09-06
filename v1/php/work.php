<?php
	$file = fopen("../Modules/work.txt", "r");
	echo fread($file, filesize("../Modules/work.txt"));
	fclose($file);
?>