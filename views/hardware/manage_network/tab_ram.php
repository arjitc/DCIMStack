<br>
<?php
include 'config/db.php';
$sql = "SELECT * FROM `devices` WHERE `device_parent`='$device_id' AND `device_type`='RAM'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$i=0;
	// output data of each row
	echo "<table class='table table-hover'>";
	echo "<tr>";
	echo "<th>#</th>";
	echo "<th>Device Vendor</th>";
	echo "<th>Device Type</th>";
	echo "<th>Device Label</th>";
	echo "<th>Device Serial</th>";
	echo "<th>Device Storage</th>";
	echo "<th>Manage</th>";
	echo "</tr>";
	while ($row = $result->fetch_assoc()) {
		$hdd_device_id = $row["device_id"];
		echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$row["device_brand"]."</td>";
		echo "<td>".$row["device_type"]."</td>";
		echo "<td>".$row["device_label"]."</td>";
		echo "<td>".$row["device_serial"]."</td>";
		echo "<td>".$row["device_capacity"]."</td>";
		echo "<td><a href='manage_disk.php?device_id=$hdd_device_id'>Manage</a></td>";
		echo "</tr>";	
		$i++;
	}
	echo "</table>";
} else {
	echo "No RAM Sticks assigned to this server.";
}
?>