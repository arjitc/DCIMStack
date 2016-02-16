<?php
function list_ports($rackid) {
	include 'config/db.php';
	$sql = "SELECT * FROM `devices` WHERE `rackid`='$rackid' AND `device_type`='switch' OR `device_type`='router'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $physical_label = $row["device_label"];
	        $port_count = $row["device_port_count"]/4;
	    }
	} else {
	    echo "0 results";
	}
	$count = 1;
	echo "<h4>$physical_label</h4>";
	echo "<hr>";
	for($i=0; $i<4; $i++) {
		echo "<div class='row'>";
		for($j=0; $j<$port_count; $j++) {
			echo "<div class='col-md-2'>";
			echo "<div class='panel panel-success'>
				  <div class='panel-heading'>
				    <h3 class='panel-title'><center><small>Port</small><br> $count</center></h3>
				  </div>
				  <div class='panel-body'>
				    Panel content
				  </div>
				</div>";
			echo "</div>";
			$count++;
		}
		echo "</div>";
	}
}
?>