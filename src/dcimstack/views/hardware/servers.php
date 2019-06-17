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
	?>
</head>

<body>

	<?php include 'libraries/header2.php'; ?>

	<div class="container-fluid">
		<h1 class="page-header">
			Servers
			<div class='float-right'>
				<button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_hdd"><img src='assets/img/add.png'> Add</a></button>
			</div>
		</h1>
		<hr>
		<?php include 'libraries/alerts.php'; ?>

		<!--one click dropdown location select -->

		<div>
			<?php
			if(isset($_GET['rackid']) && !empty($_GET['rackid'])) {
				$curr_rackid = $_GET['rackid'];

				$query1 = "SELECT rackid, rack_name FROM rackspace WHERE rackid = $curr_rackid";
				$q1res = $conn->query($query1);
				$res1 = $q1res->fetch_assoc();
			}
			?>
			<div class="form-group">
				<form>
					<label>Select Location</label>

					<select class="form-control select2" style="width: 100%;" id="get_location">
						<option value="servers.php?rackid=<?php echo $res1['rackid'] ?>"> <?php if(isset($_GET['rackid'])){ echo $res1['rack_name']; } else{ echo "Showing ALL location"; } ?> </option>

						<?php
						$sql = "SELECT rackid, rack_name FROM rackspace";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo "<option value='servers.php?rackid=" . $row['rackid'] . "&Filter=Submit+Query'>" . $row['rack_name'] . "</option>";
							}
						} else {
							echo "<option>0 results</option>";
						}
						?>
					</select>
				</form>
			</div>
		</div>

		<br>
		<?php
		if(isset($_GET['rackid'])) {
			$var = 'server';
			$rackid = $_GET['rackid'];
			$sql = "SELECT * FROM `devices` WHERE `device_type`= '$var' AND `rackid`= '$rackid'";
		} else {
			$sql = "SELECT * FROM `devices` WHERE `device_type` = 'server'";
		}

		$result = $conn->query($sql);
		if ($result->num_rows > 0) { // output data of each row
			echo "<table class='table' id='search_table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Location</th>";
			echo "<th>Device Name</th>";
			echo "<th>Hosting Pyshical Name</th>";
			echo "<th>Customer</th>";
			echo "<th>IP Address</th>";
			echo "<th><center>Manage</center></th>";
			echo "</tr>";
			echo "</thead>";
			while ($row = $result->fetch_assoc()) {
				$device_id = $row["device_id"];
				echo "<tr>";
				echo "<td>".get_rack_name($row['rackid'])."</td>";
				echo "<td>".$row["device_label"]."</td>";
				echo "<td>".$row["device_hostingname"]."</td>";

				if(empty(get_customer_name_from_id($row["device_customer"]))) {
					echo "<td></td>";
				} else {
					$device_customer = $row["device_customer"];
					echo "<td><a href='customer_manage.php?customer_id=$device_customer'>".get_customer_name_from_id($row["device_customer"])."</a></td>";
				}
				echo "<td>".$row["device_ipaddress"]."</td>";
				echo"<td><center>";
				echo"<div class='btn-group'>";
				echo"<a href='manage_server.php?device_id=$device_id' class='btn btn-primary' role='button'>Manage</a>";
				echo"<button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
				echo"<span class='caret'></span>";
				echo"<span class='sr-only'>Toggle Dropdown</span>";
				echo"</button>";
				echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
				echo "<a class='dropdown-item confirmation' href='delete_device.php?device_id=$device_id'><img src='assets/img/bin_closed.png'> Delete</a>";
				echo "</div>";
				echo"</div>";
				echo"</center>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No Rackspace Found.";
		}
		$conn->close();
		?>
	</div>


	<!-- Add Server Modal -->
	<div id="add_hdd" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><img src="assets/img/computer_add.png"> Add Server</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
					<form action="add_device_db.php" id="add_hdds" method="post">
						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
								<input type="hidden" name="page_referrer" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
								<input type="hidden" class="form-control" name="device_type" value="server">
								<label>Server CPU</label>
								<input type="text" class="form-control" name="device_cpu">
							</div>
							<div class="form-group">
								<label>CPU Count</label>
								<select class="form-control" name="device_cpu_count">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</div>
						<div class="form-group">
								<label>RAM</label>
								<div class="input-group">
									<input type="text" class="form-control" name="device_ram_total">
									<div class="input-group-addon">GB</div>
								</div>
							</div>
						<div class="form-group">
								<label>Server Size</label><br>
								<select data-live-search="true" class="selectpicker" name="device_size">
									<option value="1U">1U</option>
									<option value="2U">2U</option>
									<option value="3U">3U</option>
									<option value="4U">4U</option>
								</select>
							</div>

						<div class="form-group">
								<label>Server Vendor</label>
								<select class="form-control" name="device_brand">
									<option value="HP">HP</option>
									<option value="Dell">Dell</option>
									<option value="Supermicro">Supermicro</option>
									<option value="IBM">IBM</option>
								</select>
							</div>

						<div class="form-group">
								<label>Device Location</label>
								<?php
								include 'config/db.php';
								$sql = "SELECT * FROM `rackspace`";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) { // output data of each row
									echo "<select class='form-control' name='device_location'>";
									while ($row = $result->fetch_assoc()) {
										$rackid = $row["rackid"];
										echo "<option value='$rackid'>".get_rack_name($rackid)."</option>";
									}
									echo "</select>";
								} else {
									echo "No rackspace found. You'll need to <a href='add_rackspace.php'>add some first</a>.";
								}
								?>
							</div>
						</div>

						<div class="col-md-6">
						<div class="form-group">
								<label>Management/IPMI IP</label>
								<input type="text" class="form-control" name="device_mgmt_ip">
							</div>
						<div class="form-group">
								<label>IP Address</label>
								<input type="text" class="form-control" name="device_ipaddress">
							</div>

						<div class="form-group">
								<label>Date Of Purchase</label>
								<input type="date" class="form-control" name="device_dop">
							</div>
						<div class="form-group">
								<label>Warranty valid til</label>
								<input type="date" class="form-control" name="device_warranty">
							</div>
						<div class="form-group">
								<label>Node Name</label>
								<input type="text" class="form-control" name="device_label" required>
							</div>
						<div class="form-group">
								<label>Hosting Pyshical Name</label>
								<input type="text" class="form-control" name="device_hostingname" required>
							</div>
						<div class="form-group">
								<label>Serial #</label>
								<input type="text" class="form-control" name="device_serial">
							</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" form="add_hdds" class="btn btn-primary">
				</div>
			</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php include 'libraries/js2.php'; ?>

	<!--Script for location dropdown -->
	<script>
		document.getElementById("get_location").onchange = function() {
			var externalLinkCheck = this.options[this.selectedIndex].value;
			if (this.selectedIndex!==0 && externalLinkCheck.substring(0,4) == "http") {
				window.open(this.value, '_blank');
			} else {
				window.location.href = this.value;
			}
		};
	</script>

</body>
</html>
