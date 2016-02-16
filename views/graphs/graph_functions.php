<?php
function librenms_api_key() {
	include 'config/db.php';
	$sql = "SELECT * FROM `settings` WHERE `setting`='librenms_api_key'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while ($row = $result->fetch_assoc()) {
	        return $row["value"];
	    }
	} else {
	    //echo "0 results";
	}
}
function lirenms_api_endpoint() {
	include 'config/db.php';
	$sql = "SELECT * FROM `settings` WHERE `setting`='librenms_api_endpoint'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while ($row = $result->fetch_assoc()) {
	        return $row["value"];
	    }
	} else {
	    //echo "0 results";
	}
}
function port_name($port_number) {
	include 'config/db.php';
	$sql = "SELECT * FROM `networking` WHERE `port_number`='$port_number'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while ($row = $result->fetch_assoc()) {
	        return $row["port_name"];
	    }
	} else {
	    //echo "0 results";
	}
}
?>