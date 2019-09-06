<?php
	$file = fopen("../Modules/school.txt", "r");
	echo fread($file, filesize("../Modules/school.txt"));
	fclose($file);
?>