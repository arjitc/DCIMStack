<?php
function port_status($port_number, $device_id) {
	include 'config/db.php';
	$sql = "SELECT * FROM `networking` WHERE `device_id`='$device_id' AND `port_number`='$port_number'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        return $row["port_status"];
	    }
	} else {
	    return 0;
	}
}
function port_label($port_number, $device_id) {
	include 'config/db.php';
	$sql = "SELECT * FROM `networking` WHERE `device_id`='$device_id' AND `port_number`='$port_number'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	return $row["port_label"];
	    }
	} else {
	    return "Port";
	}
}
function port_name($port_number, $device_id) {
	include 'config/db.php';
	$sql = "SELECT * FROM `networking` WHERE `device_id`='$device_id' AND `port_number`='$port_number'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	return $row["port_name"];
	    }
	} else {
	    return "undefined";
	}
}
function print_ports($physical_label, $port_count, $device_id) {
	$port_number = 1;
	echo "<h4>$physical_label</h4>";
	echo "<hr>";
	for($i=0; $i<4; $i++) {
		echo "<div class='row'>";
		for($j=0; $j<$port_count; $j++) {
			echo "<div class='col-md-2'>";
			if(port_status($port_number,$device_id) == 0) {
				echo "<div class='panel panel-warning'>";
			} else {
				echo "<div class='panel panel-success'>";
			}
				$port_label = port_label($port_number, $device_id);
				echo"<div class='panel-heading' href='view_port.php?port_number=$port_number&device_id=$device_id' data-remote='false' data-toggle='ajaxModal'>
				    <h3 class='panel-title' ><center><small>$port_label</small><br> $port_number</center></h3>
				  </div>
				  <div class='panel-body'>";
				  echo "<center>";
				  echo "<img src='assets/img/arrow_up.png'> 5 MB/s";
				  echo "<img src='assets/img/arrow_down.png'> 4 MB/s";
				  echo "</center>";
				echo"</div>
				</div>";
			echo "</div>";
			$port_number++;
		}
		echo "</div>";
	}
}
?>