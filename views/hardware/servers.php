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
		$sql = "SELECT * FROM `devices` WHERE `device_type`='server'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
        // output data of each row
			echo "<table class='table' id='search_table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Location</th>";
			echo "<th>Vendor</th>";
			echo "<th>Physical Label</th>";
			echo "<th>MAC Address</th>";
			echo "<th>MGMT IP</th>";
			echo "<th>MGMT MAC</th>";
			echo "<th>Serial #</th>";
			echo "<th>Purchased on</th>";
			echo "<th>Warranty till</th>";
			echo "<th><center>Manage</center></th>";
			echo "</tr>";
			echo "</thead>";
			while ($row = $result->fetch_assoc()) {
				$device_id = $row["device_id"];
				echo "<tr>";
				echo "<td>".get_rack_name($row['rackid'])."</td>";
				echo "<td>".$row["device_brand"]."</td>";
				echo "<td>".$row["device_label"]."</td>";
				echo "<td>".$row["device_mac"]."</td>";
				echo "<td>".$row["device_mgmt_ip"]."</td>";
				echo "<td>".$row["device_mgmt_mac"]."</td>";
				echo "<td>".$row["device_serial"]."</td>";
				echo "<td>"; if (empty($row["device_dop"])) { echo "0000-00-00"; } else { echo $row["device_dop"]; } echo "</td>";
				echo "<td>"; if (empty($row["device_warranty"])) { echo "0000-00-00"; } else { echo $row["device_warranty"]; }  echo "</td>";
				echo "<td><center><a href='manage_server.php?device_id=$device_id' data-remote='false' data-toggle='ajaxModal' data-target='#myModal'>Manage</a></center></td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
	</div>
	<!-- Add HDD Modal -->
	<div id="add_hdd" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><img src="assets/img/computer_add.png"> Add Server</h4>
				</div>
				<div class="modal-body">
					<form action="add_device_db.php" id="add_hdds" method="post">
						<input type="hidden" name="page_referrer" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
						<input type="hidden" class="form-control" name="device_type" value="server">
						<label>Server CPU</label>
						<input type="text" class="form-control" name="device_cpu">
						<label>CPU Count</label>
						<select class="form-control" name="device_cpu_count">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
						<label>RAM</label>
						<div class="input-group">
							<input type="text" class="form-control" name="device_ram_total">
							<div class="input-group-addon">GB</div>
						</div>
						<label>Server Size</label>
						<select class="form-control" name="device_size">
							<option value="1U">1U</option>
							<option value="2U">2U</option>
							<option value="3U">3U</option>
							<option value="4U">4U</option>
						</select>
						<label>Server Vendor</label>
						<select class="form-control" name="device_brand">
							<option value="HP">HP</option>
							<option value="Dell">Dell</option>
							<option value="Supermicro">Supermicro</option>
							<option value="IBM">IBM</option>
						</select>
						<label>Device Location</label>
						<?php
						include 'config/db.php';
						$sql = "SELECT * FROM `rackspace`";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							echo "<select class='form-control' name='device_location'>";
                        // output data of each row
							while ($row = $result->fetch_assoc()) {
								$rackid = $row["rackid"];
								echo "<option value='$rackid'>".get_rack_name($rackid)."</option>";
							}
							echo "</select>";
						} else {
							echo "0 results";
						}
						?>
						<label>Management/IPMI IP</label>
						<input type="text" class="form-control" name="device_mgmt_ip">
						<label>Management/IPMI MAC Address</label>
						<input type="text" class="form-control" name="device_mgmt_mac">
						<label>Date Of Purchase</label>
						<input type="date" class="form-control" name="device_dop" required>
						<label>Warranty valid til</label>
						<input type="date" class="form-control" name="device_warranty" required>
						<label>Physical Label</label>
						<input type="text" class="form-control" name="device_label" required>
						<label>Serial #</label>
						<input type="text" class="form-control" name="device_serial" required>
					</form>
				</div>
				<div class="modal-footer">
					<input type="submit" form="add_hdds" class="btn btn-primary">
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
