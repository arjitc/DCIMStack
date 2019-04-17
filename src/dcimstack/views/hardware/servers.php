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
		<h1 class="page-header">
			Servers 
			<div class='pull-right'>
				<button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_hdd"><img src='assets/img/add.png'> Add</a></button>
			</div>
		</h1>
		<?php include 'libraries/alerts.php'; ?>
		<form action='servers.php' method='GET'>
		<?php
		include 'config/db.php';
		$sql = "SELECT rackid, rack_name FROM rackspace";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo"Select rack to view<br>";
			echo "<select name='rackid' class='form-control'>";
			while ($row = $result->fetch_assoc()) {
				echo "<option value='" . $row['rackid'] . "'>" . $row['rack_name'] . "</option>";
			}
			echo "</select>";
			echo "<input class='btn btn-primary btn-block' role='button' type='submit'>";
		}
		?>
		</form>
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
		if ($result->num_rows > 0) {
        // output data of each row
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
				#echo "<td><center><a href='manage_server.php?device_id=$device_id'>Manage</a></center></td>";


				echo"<td><center>";
				echo"<div class='btn-group'>";
				echo"<a href='manage_server.php?device_id=$device_id' class='btn btn-primary' role='button'>Manage</a>";
				echo"<button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
				echo"<span class='caret'></span>";
				echo"<span class='sr-only'>Toggle Dropdown</span>";
				echo"</button>";
				echo"<ul class='dropdown-menu'>";
				echo"<li><a href='manage_server.php?device_id=$device_id' data-remote='false' data-toggle='ajaxModal' data-target='#myModal'><img src='assets/img/layout_edit.png'> Modify</a></li>";
				echo"<li role='separator' class='divider'></li>";
				echo"<li><a href='delete_device.php?device_id=$device_id' class='confirmation'><img src='assets/img/bin_closed.png'> Delete</a></li>";
				echo"</ul>";
				echo"</div>";
				echo"</center>";


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
		<div class="modal-dialog" style="width: 1200px">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><img src="assets/img/computer_add.png"> Add Server</h4>
				</div>
				<div class="modal-body">
					<form action="add_device_db.php" id="add_hdds" method="post">
						<div class="row">
							<div class="col-md-6">
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
									echo "No rackspace found. You'll need to <a href='add_rackspace.php'>add some first</a>.";
								}
								?>
							</div>
							<div class="col-md-6">
								<label>Management/IPMI IP</label>
								<input type="text" class="form-control" name="device_mgmt_ip">
								<label>IP Address</label>
								<input type="text" class="form-control" name="device_ipaddress">
								<label>Date Of Purchase</label>
								<input type="date" class="form-control" name="device_dop">
								<label>Warranty valid til</label>
								<input type="date" class="form-control" name="device_warranty">
								<label>Node Name</label>
								<input type="text" class="form-control" name="device_label" required>
								<label>Hosting Pyshical Name</label>
								<input type="text" class="form-control" name="device_hostingname" required>
								<label>Serial #</label>
								<input type="text" class="form-control" name="device_serial">
							</div>
						</div>
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
