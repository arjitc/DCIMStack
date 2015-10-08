<?php
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

	$sql = "SELECT SUM(rack_size_used) AS rack_used_sum FROM `rackspace`";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $rack_used_sum = $row["rack_used_sum"];
	    }
	} else {
	    $rack_used_sum = "0";
	}

	$rackspace_available = $rack_size_sum - $rack_used_sum;
	return $rackspace_available;
} 

function rackspace_used() {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$sql = "SELECT SUM(rack_size_used) AS rack_used_sum FROM `rackspace`";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $rack_used_sum = $row["rack_used_sum"];
	    }
	} else {
	    $rack_used_sum = "0";
	}
	$conn->close();
	return $rack_used_sum;
} 

function rackspace_used_rack($rackid) { //for grabbing stats of each individual rack
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$rackid    = mysqli_real_escape_string($conn, $rackid);
	$sql = "SELECT SUM(rack_size_used) AS rack_used_sum FROM `rackspace` WHERE `rackid`='$rackid'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $rack_used_sum = $row["rack_used_sum"];
	    }
	} else {
	    $rack_used_sum = "0";
	}
	$conn->close();
	return $rack_used_sum;
}

function rackspace_available_rack($rackid) { //for grabbing stats of each individual rack
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$rackid    = mysqli_real_escape_string($conn, $rackid);
	$sql = "SELECT SUM(rack_size) AS rack_size_sum FROM `rackspace` WHERE `rackid`='$rackid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $rack_size_sum = $row["rack_size_sum"];
	    }
	} else {
	    $rack_size_sum = "0";
	}

	$sql = "SELECT SUM(rack_size_used) AS rack_used_sum FROM `rackspace` WHERE `rackid`='$rackid'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $rack_used_sum = $row["rack_used_sum"];
	    }
	} else {
	    $rack_used_sum = "0";
	}

	$rackspace_available = $rack_size_sum - $rack_used_sum;
	return $rackspace_available;
} 

function rackspace_server_count($rackid) { //for grabbing stats of each individual rack
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$rackid    = mysqli_real_escape_string($conn, $rackid);
	$sql = "SELECT * FROM `servers` WHERE `rackid`='$rackid'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	    return $result->num_rows;
	} else {
	    return 0;
	}
	$conn->close();
}

function hardware_used() {
	include '../config/db.php';

}

function hardware_available() {
	include '../config/db.php';

} 
?>