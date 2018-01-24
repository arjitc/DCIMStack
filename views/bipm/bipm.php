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
		<h1 class="page-header">Basic IP Manager
			<div class='pull-right'>
				<button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_ip_range">
					<img src='assets/img/add.png'> Add</a>
				</button>
			</div>
		</h1>
		<?php include 'libraries/alerts.php'; ?>
		<?php
		include_once('config/db.php');
		$sql = "SELECT * FROM `bipm` ORDER BY ID ASC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

                // output data of each row
			echo "<table class='table' id='search_table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>IP Address</th>";
			echo "<th>IP Gateway</th>";
			echo "<th>IP Subnet</th>";
			echo "<th>Notes</th>";
			echo "<th>Manage</th>";
			echo "<th>Edit</th>";
			echo "<th>Mass Check</th>";
			echo "</tr>";
			echo "</thead>";
			while ($row = $result->fetch_assoc()) {
		$ip_range_node = $row['ip_range_node'];
				echo "<tr>";
				echo "<td>".htmlspecialchars($row['ip_range'])."</td>";
				echo "<td>".htmlspecialchars($row["ip_address_gateway"])."</td>";
				echo "<td>".htmlspecialchars($row["ip_address_subnet"])."</td>";
				echo "<td>".htmlspecialchars($row["ip_notes"])."</td>";
				echo "<td><center><a href=manage_ip.php?ip_range=".$row['ip_range_node'].">Manage</a></center></td>";
				echo "<td><center><a href='ip_manage.php?ip_range_node=".$row['ip_range_node']."' data-remote='false' data-toggle='ajaxModal' data-target='#myModal'>Edit</a></center></td>";
				echo "<td><center><a href=dnsbl_mass.php?ip_range_node=".$row['ip_range_node'].">Mass Check</a></center></td>";

	
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
	</div>

	<!-- Add IP Range -->
	<div id="add_ip_range" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><img src='assets/img/lorry_add.png'> Add IP Range</h4>
				</div>
				<div class="modal-body">
					<form action="add_ip_db.php" id="add_ips" method="post">
						<label>IP Range</label>
						<input type="text" class="form-control" name="ip_range" placeholder="192.168.0.0/24" required>
						<label>IP Gateway</label>
						<input type="text" class="form-control" name="ip_address_gateway" placeholder="192.168.0.1" required>
						<label>IP Subnet</label>
						<input type="text" class="form-control" name="ip_address_subnet" placeholder="255.255.255.0" required>
						<label>IP Pool</label>
						<input type="text" class="form-control" name="ip_address_first" placeholder="1" required>
						<input type="text" class="form-control" name="ip_address_last" placeholder="255" required>
						<label>IP Notes</label>
						<textarea class="form-control" name="ip_notes"></textarea>
					</form>
				</div>
				<div class="modal-footer">
					<input type="submit" form="add_ips" class="btn btn-primary">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
</body>
</html>
