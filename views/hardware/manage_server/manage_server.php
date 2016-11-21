<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DCIMStack</title>
	<?php
	if (!ctype_digit($_GET['device_id'])) {
		header('Location: index.php');
		exit();
	} else {
		include 'libraries/css.php';
		include 'libraries/general.php';
		include 'config/db.php';  
	    $device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
	    $_SESSION['referrer'] = "manage_server.php?device_id=$device_id"; //manually set it here.
	    $sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
	    $result = $conn->query($sql);
	    if ($result->num_rows > 0) {
	    	while ($row = $result->fetch_assoc()) {
	    		$device_id        = $row["device_id"];
	    		$device_label     = $row["device_label"];
	    		$device_brand     = $row["device_brand"];
	    		$device_type      = $row["device_type"];
	    		$device_serial    = $row["device_serial"];
	    		$device_capacity  = $row["device_capacity"];
	    		$device_cpu       = $row["device_cpu"];
	    		$device_cpu_count = $row["device_cpu_count"];
	    		$device_ram_total = $row["device_ram_total"];
	    		$device_mgmt_ip   = $row["device_mgmt_ip"];
	    		$device_mgmt_mac  = $row["device_mgmt_mac"];
	    		$device_mac       = $row["device_mac"];
	    		$device_ipaddress = $row["device_ipaddress"];
	    		$device_customer  = $row["device_customer"];
	    		$device_rack	  = $row["rackid"];
	    		$device_notes	  = $row["device_notes"];
	    		$device_size	  = $row["device_size"];
	    	}
	    }
	}
	?>
</head>

<body>
	<?php include 'libraries/header.php'; ?>
	
	<div class="container">
		<h1 class="page-header"><?php echo $device_label; ?></h1>
		<ol class="breadcrumb">
			<li><a href="manage_rackspace.php"><?php echo get_rack_location($device_rack); ?></a></li>
			<li><a href="rackspace.php?rackid=<?php echo $device_rack; ?>"><?php echo get_rack_name_from_device_id($device_id); ?></a></li>
			<li class="active"><?php echo $device_label; ?></li>
		</ol>
		<?php include 'libraries/alerts.php'; ?>
		<div id="content">
			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
				<li class="active"><a href="#overview" data-toggle="tab"><img src="assets/img/calculator.png"> Overview</a></li>
				<li><a href="#cpu_ram" data-toggle="tab"><img src="assets/img/calculator.png"> CPU / RAM</a></li>
				<li><a href="#ram_sticks" data-toggle="tab"><img src="assets/img/calculator.png"> RAM Sticks</a></li>
				<li><a href="#network" data-toggle="tab"><img src="assets/img/calculator.png"> Network</a></li>
				<li><a href="#disks" data-toggle="tab"><img src="assets/img/drive.png"> Disks</a></li>
				<li><a href="#server_information" data-toggle="tab"><img src="assets/img/layout_content.png"> Server information</a></li>
				<li><a href="#notes" data-toggle="tab"><img src="assets/img/user_suit.png"> Notes</a></li>
				<li><a href="#customer" data-toggle="tab"><img src="assets/img/user_suit.png"> Customer</a></li>
				<li><a href="#delete_device" data-toggle="tab"><img src="assets/img/delete.png"> Delete Device</a></li>
			</ul>
			<div id="my-tab-content" class="tab-content">
				<div class="tab-pane active" id="overview">
					<?php include 'tab_overview.php'; ?>
				</div>
				<div class="tab-pane" id="cpu_ram">
					<?php include 'tab_cpu_ram.php'; ?>
				</div>
				<div class="tab-pane" id="ram_sticks">
					<?php include 'tab_ram.php'; ?>
				</div>
				<div class="tab-pane" id="network">
					<?php include 'tab_network.php'; ?>
				</div>
				<div class="tab-pane" id="disks">
					<?php include 'tab_disks.php'; ?>
				</div>
				<div class="tab-pane" id="server_information">
					<?php include 'tab_server_information.php'; ?>
				</div>
				<div class="tab-pane" id="notes">
					<?php include 'tab_notes.php'; ?>
				</div>
				<div class="tab-pane" id="customer">
					<?php include 'tab_customer.php'; ?>
				</div>
				<div class="tab-pane" id="delete_device">
					<br>
					<div class="alert alert-danger" role="alert">
						<b>Warning</b>
						<br>
						Once this device is deleted/removed it cannot be restored back into DCIMStack, any associated data is deleted once the device is removed from DCIMStack. The device & it's associated information will need to be re-added manually later if needed.
					</div>
					<a href="delete_device.php?device_id=<?php echo $device_id; ?>" class="btn btn-danger confirmation">Remove Device</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php include 'libraries/js.php'; ?>
</body>
</html>