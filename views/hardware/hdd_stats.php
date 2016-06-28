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
		<h1 class="page-header">HDD Stats</h1>
		<h2>Usage by brand</h2>
		<hr>
		<?php
		include 'config/db.php';
		$sql = "SELECT `device_brand`, count(*) as `count` from `devices` WHERE `device_type` in ('SSD','HDD','SAS') group by `device_brand`";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
      	// output data of each row
			echo "<table class='table table-hover'>";
			echo "<tr>";
				echo "<th>Brand</th>";
				echo "<th>Drive Count</th>";
			echo "</tr>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
					echo "<td>".$row["device_brand"]."</td>";
					echo "<td>".$row["count"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
		<h2>Usage by capacity</h2>
		<hr>
		<?php
		include 'config/db.php';
		$sql = "SELECT `device_capacity`, count(*) as `count` from `devices` WHERE `device_type` in ('SSD','HDD','SAS') group by `device_capacity`";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
      	// output data of each row
			echo "<table class='table table-hover'>";
			echo "<tr>";
				echo "<th>Capacity</th>";
				echo "<th>Drive Count</th>";
			echo "</tr>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
					echo "<td>".$row["device_capacity"]."</td>";
					echo "<td>".$row["count"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
	</div>
            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <?php include 'libraries/js.php'; ?>
        </body>
        </html>
