<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DCIMStack</title>
	<?php
	include 'libraries/css.php';
	include 'libraries/general.php';
	?>
</head>

<body>

	<?php include 'libraries/header.php'; ?>

	<div class="container">
		<h1 class="page-header">Servers <div class='pull-right'><button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_hdd"><img src='assets/img/add.png'> Add</a></button></div></h1>
		<?php include 'libraries/alerts.php'; ?>
		<?php
		include 'config/db.php';

		$search=$_POST["search"];
		$searchwhat=$_POST["searchwhat"];
		$search = str_replace(' ', '', $search);

		$sql = "SELECT * FROM `devices` WHERE $search LIKE '$searchwhat'" or die(mysql_error());

		//$sql = "SELECT * FROM `devices` WHERE `device_type`='server'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
        // output data of each row
			echo "<table class='table' id='search_table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Location</th>";
			echo "<th>Vendor</th>";
			echo "<th>Physical Label</th>";
			echo "<th>Customer</th>";
			echo "<th>IP Address</th>";
			echo "<th>MAC Address</th>";
			echo "<th>Serial #</th>";
			echo "<th><center>Manage</center></th>";
			echo "</tr>";
			echo "</thead>";
			while ($row = $result->fetch_assoc()) {
				$device_id = $row["device_id"];
				echo "<tr>";
				echo "<td>".get_rack_name($row['rackid'])."</td>";
				echo "<td>".$row["device_brand"]."</td>";
				echo "<td>".$row["device_label"]."</td>";
				if(empty(get_customer_name_from_id($row["device_customer"]))) {
					echo "<td></td>";
				} else {
					$device_customer = $row["device_customer"];
					echo "<td><a href='customer_manage.php?customer_id=$device_customer'>".get_customer_name_from_id($row["device_customer"])."</a></td>";
				}
				echo "<td>".$row["device_ipaddress"]."</td>";
				echo "<td>".$row["device_mac"]."</td>";
				echo "<td>".$row["device_serial"]."</td>";
				echo "<td><center><a href='manage_server.php?device_id=$device_id'>Manage</a></center></td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
	</div>
	<?php include 'libraries/js.php'; ?>
</body>
</html>
