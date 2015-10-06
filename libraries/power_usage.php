<?php
function server_power_feed_count($server_id) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$feed_count = 0;
	$server_id    = mysqli_real_escape_string($conn, $server_id);
	$sql = "SELECT * FROM `servers` WHERE `server_id`='$server_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $server_power_feed1 = $row["server_power_feed1"];
	        $server_power_feed2 = $row["server_power_feed2"];
	    }
	    if(!empty($server_power_feed1)) {
	    	$feed_count = 1;
	    }
	    if(!empty($server_power_feed2)) {
	    	$feed_count = $feed_count+1;
	    }
	    return $feed_count;
	} else {
	    return $feed_count;
	}     
}
function server_power_feed_check_A($server_id) { //check if server has power feed A
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$server_id    = mysqli_real_escape_string($conn, $server_id);
	$has_A = 0;
	$sql = "SELECT * FROM `servers` WHERE `server_id`='$server_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $server_power_feed1 = $row["server_power_feed1"];
	        $server_power_feed2 = $row["server_power_feed2"];
	    }
	    if(!empty($server_power_feed1) && $server_power_feed1=="A") {
	    	$has_A = 1;
	    }
	    if(!empty($server_power_feed2) && $server_power_feed2=="A") {
	    	$has_A = 1;
	    }
	    return $has_A;
	} else {
	    return $has_A;
	}     
}
function server_power_feed_check_B($server_id) { //check if server has power feed B
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$server_id    = mysqli_real_escape_string($conn, $server_id);
	$has_B = 0;
	$sql = "SELECT * FROM `servers` WHERE `server_id`='$server_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $server_power_feed1 = $row["server_power_feed1"];
	        $server_power_feed2 = $row["server_power_feed2"];
	    }
	    if(!empty($server_power_feed1) && $server_power_feed1=="B") {
	    	$has_B = 1;
	    }
	    if(!empty($server_power_feed2) && $server_power_feed2=="B") {
	    	$has_B = 1;
	    }
	    return $has_B;
	} else {
	    return $has_B;
	}     
}
function server_power_usage($server_id) { 
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$server_power_usage = 0;
	$server_id    = mysqli_real_escape_string($conn, $server_id);
	$sql = "SELECT * FROM `servers` WHERE `server_id`='$server_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	            $server_power_usage = $row["server_power_usage"];
	    }
	    if(server_power_feed_check_B($server_id) && server_power_feed_check_A($server_id)) {
	    	$server_power_usage = $server_power_usage*2;
	    	return $server_power_usage;
	    } else {
	    	return $server_power_usage;
	    }
	} else {
	    $server_power_usage;
	}     
}
?>