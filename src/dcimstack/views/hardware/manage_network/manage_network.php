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
		include 'libraries/css2.php';
		include 'libraries/general.php';
		include 'config/db.php';
	    $device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
	    $_SESSION['referrer'] = "manage_network.php?device_id=$device_id"; //manually set it here.
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
	    		$device_mac       = $row["device_mac"];
	    		$device_ipaddress = $row["device_ipaddress"];
	    		$device_rack	  = $row["rackid"];
	    		$device_notes	  = $row["device_notes"];
	    		$device_size	  = $row["device_size"];
                $device_rma = $row["device_rma"];
        	    $device_rma_notes = $row["device_rma_notes"];
	            $device_rma_date = $row["device_rma_date"];
	    	}
	    }
	}
	?>
</head>

<body>
	<?php include 'libraries/header2.php'; ?>

	<div class="container-fluid">
		<h1 class="page-header"><?php echo $device_label; ?></h1>
		<ol class="breadcrumb">
			<li><a class="breadcrumb-item" href="manage_rackspace.php"><?php echo get_rack_location($device_rack); ?></a></li>
			<li><a class="breadcrumb-item" href="rackspace.php?rackid=<?php echo $device_rack; ?>"><?php echo get_rack_name_from_device_id($device_id); ?></a></li>
			<li class="breadcrumb-item active"><?php echo $device_label; ?></li>
		</ol>
		<?php include 'libraries/alerts.php'; ?>
		<div id="content">
			<ul id="mytabs" class="nav nav-tabs" data-tabs="tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true"><img src="assets/img/application_side_list.png"> Overview</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="cpu_ram-tab" href="#cpu_ram" data-toggle="tab" role="tab" aria-controls="cpu_ram" aria-selected="false"><img src="assets/img/calculator.png"> CPU / RAM</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="network-tab" href="#network" data-toggle="tab" role="tab" aria-controls="network" aria-selected="false"><img src="assets/img/calculator.png"> Network</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="server_information-tab" href="#server_information" data-toggle="tab" role="tab" aria-controls="server_information" aria-selected="flase"><img src="assets/img/layout_content.png"> Network information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="notes-tab" href="#notes" data-toggle="tab" aria-controls="notes" aria-selected="false"><img src="assets/img/user_suit.png"> Notes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="customer-tab" href="#customer" data-toggle="tab" aria-controls="customer" aria-selected="false"><img src="assets/img/user_suit.png"> Customer</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="rma-tab" href="#rma" data-toggle="tab" aria-controls="rma" aria-selected="false"><img src="assets/img/drive.png"> RMA</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="delete_device-tab" href="#delete_device" data-toggle="tab" aria-controls="delete_device" aria-selected="false"><img src="assets/img/delete.png"> Delete Device</a>
				</li>
			</ul>
			<div id="my-tab-content" class="tab-content">
				<div class="tab-pane fade active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
					<?php include 'tab_overview.php'; ?>
				</div>
				<div class="tab-pane fade" id="cpu_ram" role="tabpanel" aria-labelledby="cpu_ram-tab">
					<?php include 'tab_cpu_ram.php'; ?>
				</div>
				<div class="tab-pane fade" id="network" role="tabpanel" aria-labelledby="network-tab">
					<?php include 'tab_network.php'; ?>
				</div>
				<div class="tab-pane fade" id="server_information" role="tabpanel" aria-labelledby="server_information-tab">
					<?php include 'tab_network_information.php'; ?>
				</div>
				<div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
					<?php include 'tab_notes.php'; ?>
				</div>
				<div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="customer-tab">
					<?php include 'tab_customer.php'; ?>
				</div>
				<div class="tab-pane fade" id="rma" role="tabpanel" aria-labelledby="rma-tab">
					<?php include 'tab_rma.php'; ?>
				</div>
				<div class="tab-pane fade" id="delete_device" role="tabpanel" aria-labelledby="delete_device-tab">
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
	<?php include 'libraries/js2.php'; ?>
</body>
</html>
