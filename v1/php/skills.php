<?php
	$db = mysqli_connect("localhost", "aamixvks_aamirhatim", "Mega00sh!", "aamixvks_Data");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query = "SELECT * FROM tblSkills";
	$result = mysqli_query($db, $query);

	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<th class = 'tableCategory'>".$row[strLevel]."</th>";
		echo "<td class = 'tableSkill'>".$row[strSkill]."</td>";
		echo "</tr>";
	}
	mysqli_close($db);
?>