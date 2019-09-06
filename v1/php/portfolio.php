<?php
	$file = fopen("../Modules/portfolio.txt", "r");
	echo fread($file, filesize("../Modules/portfolio.txt"));
	fclose($file);
?>