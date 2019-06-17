<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>DCIMStack</title>
	<?php
	include      'libraries/css2.php';
	include_once 'libraries/general.php';
	include_once 'libraries/events.php';
	?>
</head>

<body>
	<?php include 'libraries/header2.php'; ?>
	<div class="container-fluid">
		<h1 class="display-4">Dashboard</h1>
		<?php include 'libraries/alerts.php'; ?>
		<div class="row">
			<div class="col-3">
				<h3><?php echo rackspace_available(); ?>U</h3>
				<h4>Rackspace available</h4>
				<span class="text-muted">Individual U's of rackspace available</span>
			</div>
			<div class="col-3">
				<h3><?php echo rackspace_used(); ?>U</h3>
				<h4>Rackspace used</h4>
				<span class="text-muted">Individual U's of rackspace used</span>
			</div>
			<div class="col-3">
				<h3><?php echo hardware_used(); ?></h3>
				<h4>Total Hardware</h4>
				<span class="text-muted">Individual hardware in DCIMStack</span>
			</div>
			<div class="col-3">
				<h3><?php echo shipments_inbound(); ?></h3>
				<h4><?php if(shipments_inbound()>1) { echo "Shipments"; } else { echo "Shipment"; } ?></h4>
				<span class="text-muted">Individual shipments in-transit</span>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-3">
				<h3><?php echo available_disk(); ?></h3>
				<h4>Disk available</h4>
				<span class="text-muted">Total disk available</span>
			</div>
		</div>
		<?php
		if (file_exists("install.php")) {
			echo "<div class='alert alert-danger' role='alert'>";
			echo "<strong>Warning!</strong>";
			echo " The DCIMStack installer (install.php) still exists! Anyone can overwrite your install by accessing this file! Delete this file right away!";
			echo "</div>";
		}
		?>
		<hr>
		<h2 class="font-weight-normal">Events</h2>
		<?php
		$sql = "SELECT * FROM `events` ORDER BY `id` DESC LIMIT 10";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { // output data of each row
			echo "<div class='table-responsive'>
			<table class='table'>
			<thead>
			<tr>
			<th>#</th>
			<th>Type</th>
			<th>Message</th>
			<th>Status</th>
			<th>Timestamp</th>
			</tr>
			</thead>
			<tbody>";
			while($row = $result->fetch_assoc()) {
				$id = $row["id"];
				echo "<tr>";
				echo "<td>".$row["id"]."</td>";
				echo "<td>".display($row["event_type"])."</td>";
				echo "<td>".display($row["event_message"])."</td>";
				echo "<td>".display($row["event_status"])."</td>";
				echo "<td>".display($row["event_timestamp"])."</td>";
				echo "</tr>";
			}
			echo "</tbody>
			</table>";
			echo "</div>";
		} else {
			echo "<center>No events found</center>";
		}
		?>
		<?php include 'libraries/footer.php'; ?>
	</div>

	<!-- Bootstrap core JavaScript -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php include 'libraries/js2.php'; ?>
</body>
</html>
