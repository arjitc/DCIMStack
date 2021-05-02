<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DCIMStack</title>
	<?php 
	include 'libraries/css2.php';
	include 'libraries/general.php'; 
	$id = (int)$_GET['id'];
	?>
</head>

<body>

	<?php include 'libraries/header2.php'; ?>

	<div class="container-fluid">
		<h1 class="page-header">Customer Devices</h1>
		<?php include 'libraries/alerts.php'; ?>
		<?php
		include 'config/db.php';
		$sql = "SELECT * FROM `devices` WHERE `device_customer`='$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { // output data of each row
			echo "<table class='table' id='search_table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Location</th>";
			echo "<th>Vendor</th>";
			echo "<th>Device Type</th>";
			echo "<th>Physical Label</th>";
			echo "<th><center>Manage</center></th>";
			echo "</tr>";
			echo "</thead>";
			while ($row = $result->fetch_assoc()) {
				$device_id = $row["device_id"];
				echo "<tr>";
				echo "<td>".get_rack_name($row['rackid'])."</td>";
				echo "<td>".$row["device_brand"]."</td>";
				echo "<td>".$row["device_type"]."</td>";
				echo "<td>".$row["device_label"]."</td>";
				echo "<td><center><a href='manage_server.php?device_id=$device_id'>Manage</a></center></td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No devices found.";
		}
		$conn->close();
		?>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js2.php'; ?>
</body>
</html>
