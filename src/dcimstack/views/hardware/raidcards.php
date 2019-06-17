<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DCIMStack</title>
	<?php
	include_once 'libraries/css2.php';
	include_once 'libraries/general.php';
	?>
</head>

<body>

	<?php include_once 'libraries/header2.php'; ?>

	<div class="container-fluid">
		<h1 class="page-header">Raid Cards
			<div class='pull-right'>
				<button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_hdd"><img src='assets/img/add.png'> Add</button>
				<a class='btn btn-primary' href="raidcards.php?var=raidcard&filter=inuse"><img src='assets/img/chart_bar.png'> Inuse</a>
				<a class='btn btn-primary' href="raidcards.php"><img src='assets/img/chart_bar.png'> Clear filter</a>
			</div>
		</h1>
		<?php include 'libraries/alerts.php'; ?>
		<?php
		include_once 'config/db.php';
		if(isset($_GET['filter']) && isset($_GET['var'])) {
			if($_GET['filter']=="inuse" && $_GET['var']=="raidcard") {
				$sql = "SELECT * FROM `devices` WHERE `device_type`='raidcard' AND `device_inuse`=1";
			}
		} else {
			$sql = "SELECT * FROM `devices` WHERE `device_type` = 'raidcard'";
		}
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
      		// output data of each row
			echo "<table class='table' id='search_table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Server</th>";
			echo "<th>Name</th>";
			echo "<th><center>Manage</center></th>";
			echo "</tr>";
			echo "</thead>";
			while ($row = $result->fetch_assoc()) {
				$device_id = $row["device_id"];
				$first_echo = '';
				if($row["device_parent"]!=0 || $row["device_inuse"]==1) {
					$first_echo = "<tr class='info'>";
				}

				if($row["device_failed"]=='YES') {
					$first_echo = "<tr class='bg-danger'>";
				}

				if ($first_echo == 'NULL' && $row["device_inuse"]!=1) {
					$first_echo = "<tr>";
				}

				echo $first_echo;
				if(get_device_label_from_id($row['device_parent']) == "None") {
					$device_location = get_server_name($row["rackid"]);
				} else {
					$device_location = get_device_label_from_id($row["device_parent"]);
				}
				echo "<td>$device_location</td>";
				echo "<td>".$row["device_label"]."</td>";
				echo "<td><center><a href='manage_raidcard.php?device_id=$device_id'>Manage</a></center></td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
		<div class="pull-right">
			<small><i>Blue indicates the drive in use, Red indicates a failed drive</i></small>
		</div>
	</div>
	<!-- Add HDD Modal -->
	<div id="add_hdd" class="modal fade" role="dialog">
		<div class="modal-dialog" style="width: 1200px">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><img src="assets/img/computer_add.png"> Add </h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
					<form action="add_device_db.php" id="add_hdds" method="post">
						<div class="row">
							<div class="col-md-6">
								<input type="hidden" name="page_referrer" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
								<input type="hidden" name="device_type" value="raidcard">

								<label>Device Name</label>
								<input type="text" class="form-control" name="device_label" value="eg LSI Logic / Symbios Logic MegaRAID SAS 2208"required>
							</div>
							<div class="col-md-6">
								<label>Device Installed To</label>
								<?php
								include 'config/db.php';
								$sql = "SELECT * FROM `devices` WHERE device_type='server'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									echo "<select class='form-control' name='device_location'>";
                  					// output data of each row
									while ($row = $result->fetch_assoc()) {
										$serverid = $row["device_id"];
										$server_label = $row["device_label"];
										echo "<option value='$serverid'>$server_label</option>";
									}
									echo "</select>";
								} else {
									echo "0 results";
								}
								?>
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

	<?php include 'libraries/js2.php'; ?>
</body>
</html>
