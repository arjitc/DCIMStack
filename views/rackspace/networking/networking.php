<?php
	include 'views/rackspace/networking/networking_functions.php'; 
	include 'config/db.php';
	$sql = "SELECT * FROM `devices` WHERE `rackid`='$rackid' AND `device_type`='switch' OR `device_type`='router'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $physical_label = $row["device_label"];
	        $device_id = $row["device_id"];
	        $port_count = $row["device_port_count"]/4;
	        print_ports($physical_label, $port_count, $device_id);
	    }
	} else {
	    echo "0 results";
	}
?>