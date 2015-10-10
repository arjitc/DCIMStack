<?php
function rackspace_used_rack($rackid) { //for grabbing stats of each individual rack
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$rackid    = mysqli_real_escape_string($conn, $rackid);
	$sql = "SELECT * FROM `servers` WHERE `rackid`='$rackid'";
	$result = $conn->query($sql);
	$conn->close();
	return $result->num_rows;
}

function rackspace_size_rack($rackid) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$rackid    = mysqli_real_escape_string($conn, $rackid);
	$sql = "SELECT * FROM `rackspace` WHERE `rackid`='$rackid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $rackspace_size = $row["rack_size"];
	    }
	} else {
	    $rackspace_size = "0";
	}
	return $rackspace_size;
}

function rackspace_available_rack($rackid) { //for grabbing stats of each individual rack
	$rackspace_available = rackspace_size_rack($rackid) - rackspace_used_rack($rackid);
	return $rackspace_available;
} 

function rackspace_server_count_rack($rackid) { //for grabbing stats of each individual rack
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

?>