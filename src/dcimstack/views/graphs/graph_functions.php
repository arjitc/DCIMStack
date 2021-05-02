<?php
function librenms_api_key() {
	include 'config/db.php';
	$sql = "SELECT `value` FROM `settings` WHERE `setting`='librenms_api_key'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) { // output data of each row
	        return $row["value"];
	    }
	}
}
function lirenms_api_endpoint() {
	include 'config/db.php';
	$sql = "SELECT `value` FROM `settings` WHERE `setting`='librenms_api_endpoint'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) { // output data of each row
	        return $row["value"];
	    }
	}
}
function port_name($port_number) {
	include 'config/db.php';
	$port_number  = mysqli_real_escape_string($conn, $port_number);
	$sql = "SELECT `port_name` FROM `networking` WHERE `port_number`='$port_number'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) { // output data of each row
	        return $row["port_name"];
	    }
	}
}
?>