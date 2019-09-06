<?php
	$db = mysqli_connect("localhost", "aamixvks_aamirhatim", "Mega00sh!", "aamixvks_Data");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query = "SELECT * FROM tblExperiences WHERE strWorkType = 'JOB' ORDER BY intId";
	$result = mysqli_query($db, $query);

	while($row = mysqli_fetch_assoc($result)) {
		echo "<svg class = 'workCircle' id = '" . $row["strId"] . "'>";
		echo "<circle cx = '50%' cy = '50%' r = '50%'/>";
		echo "<image href = 'projectIcons/" . $row["strImage"] . "' cx = '50%' cy = '50%'/>";
		echo "</svg>";
	}
	mysqli_close($db);
?>