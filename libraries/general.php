<?php
function display($value) {
    return htmlentities(stripslashes(strip_tags($value)));
}
function get_filename_from_url() {
	$filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
	return $filename;
}
function get_rack_name($id) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$id  = mysqli_real_escape_string($conn, $id);
	$sql = "SELECT * FROM `rackspace` WHERE `rackid`='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			return $row["rack_name"];
		}
	} else {
		return 0;
	}
}
function get_rack_location($id) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$id  = mysqli_real_escape_string($conn, $id);
	$sql = "SELECT * FROM `rackspace` WHERE `rackid`='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			return $row["rack_city"] .", ". $row["rack_country"];
		}
	} else {
		return 0;
	}
}
function get_customer_name_from_id($id) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$id  = mysqli_real_escape_string($conn, $id);
	$sql = "SELECT * FROM `customers` WHERE `id`='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			return $row["customer_name"];
		}
	} else {
		return 0;
	}
}
function check_if_rack_exists($id) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$id  = mysqli_real_escape_string($conn, $id);
	$sql = "SELECT * FROM `rackspace` WHERE `rackid`='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		header('Location: index.php');
		exit();
	}
}
function check_if_feed_exists($feedid) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$feedid  = mysqli_real_escape_string($conn, $feedid);
	$sql = "SELECT * FROM `power_feeds` WHERE `feed_id`='$feedid'";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		header('Location: index.php');
	}
}
function get_device_label_from_id($device_id) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$id  = mysqli_real_escape_string($conn, $id);
	$sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			return $row["device_label"];
		}
	} else {
		return "None";
	}
	$conn->close();
}
function get_tracking_from_id($shipping_id) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$shipping_id  = mysqli_real_escape_string($conn, $shipping_id);
	$sql = "SELECT * FROM `shipments` WHERE `id`='$shipping_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			return $row["shipment_tracking_id"];
		}
	} else {
		return "None";
	}
	$conn->close();
}

function rackspace_available() {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$sql = "SELECT SUM(rack_size) AS rack_size_sum FROM `rackspace`";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$rack_size_sum = $row["rack_size_sum"];
		}
	} else {
		$rack_size_sum = "0";
	}

	$sql = "SELECT * FROM `devices` WHERE `device_type`='server' OR `device_type`='router' OR `device_type`='switch' OR `device_type`='PDU'";
	$result = $conn->query($sql);
	$rack_used_sum = $result->num_rows;

	$rackspace_available = $rack_size_sum - $rack_used_sum;
	return $rackspace_available;
	$conn->close();
}

function rackspace_used() {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$sql = "SELECT * FROM `devices` WHERE `device_type`='server' OR `device_type`='router' OR `device_type`='switch' OR `device_type`='PDU'";
	$result = $conn->query($sql);
	return $result->num_rows;
	$conn->close();
}

function hardware_used() {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$sql = "SELECT * FROM `devices` WHERE `device_type`!='server' OR `device_type`!='router' OR `device_type`!='switch' OR `device_type`!='PDU'";
	$result = $conn->query($sql);
	return $result->num_rows;
	$conn->close();
}

function shipments_inbound() {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$sql = "SELECT * FROM `shipments` WHERE `shipment_status`!='Delivered'";
	$result = $conn->query($sql);
	return $result->num_rows;
	$conn->close();
}
function check_if_shipment_in_db($shipment_tracking_id) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$shipment_tracking_id  = mysqli_real_escape_string($conn, $shipment_tracking_id);
	$sql = "SELECT * FROM `devices` WHERE `device_tracking_id`='$shipment_tracking_id'";
	$result = $conn->query($sql);
	return $result->num_rows;
	$conn->close();
}
function print_tracking_url($shipment_tracking_id, $shipment_courier) {
	switch ($shipment_courier) {
		case 'USPS':
		return "<a href='http://track.aftership.com/usps/$shipment_tracking_id' target='_blank'>$shipment_tracking_id</a>";
		break;
		
		case 'FedEX':
		return "<a href='http://track.aftership.com/fedex/$shipment_tracking_id' target='_blank'>$shipment_tracking_id</a>";
		break;

		default:
		return "<a href='https://track.aftership.com/$shipment_tracking_id' target='_blank'>$shipment_tracking_id</a>";
		break;
	}
}

function get_rack_name_from_device_id($device_id) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$rackid = $row["rackid"];
		}
	} else {
		$rackid = "0";
	}

	$sql = "SELECT * FROM `rackspace` WHERE `rackid`='$rackid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$rack_name = $row["rack_name"];
		}
	} else {
		$rack_name = "0";
	}
	return $rack_name;
	$conn->close();
}
function device_cpu_count($device_cpu, $device_cpu_count) {
  if($device_cpu_count>1) {
    return $device_cpu_count."x".$device_cpu;
  } else {
    return $device_cpu;
  }
}
function get_feed_incoming($feedid) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$feedid = mysqli_real_escape_string($conn, $feedid);
	$sql = "SELECT * FROM `power_feeds` WHERE `feed_id`='$feedid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			return $row["feed_power"];
		}
	} else {
		return 0;
	}
}
?>