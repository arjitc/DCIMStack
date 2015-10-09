<?php
include_once 'libraries/general.php';
include_once 'config/db.php';
include_once 'libraries/power.php';
check_if_rack_exists($_GET['rackid']); //this checks if the rack exists, if the rack does not exist it redirects the user back to index.php
?>

<div class="row">
  <div class="col-md-4">
  	<h4><center>Incoming feeds</center></h4>
  	<hr>
  	<?php
		include realpath(dirname(__FILE__)).'/../config/db.php';
		$rackid  = mysqli_real_escape_string($conn, (int)$_GET['rackid']);
		$sql = "SELECT * FROM `power_feeds` WHERE `rackid`='$rackid'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
		  	while($row = $result->fetch_assoc()) {
		  	    echo "<div class='panel panel-default'>";
		  	    	echo "<div class='panel-heading'>";
		            	echo "<center><h4>".$row["feed_type"]."</h4></center>";
		            echo "</div>";
		            echo "<div class='panel-body'>";
				  	    echo "<center><p>Power ".$row["feed_power"]."A</center></p>";
				  	    echo "<center><p>Voltage ".$row["feed_voltage"]."V</center></p>";
				  	echo "</div>";
				echo "</div>";
		  	}
		} else {
			echo "<center>No power feeds found</center>";
	}     
	?>
  </div>
  <div class="col-md-4">
  	<h4><center>Usage</center></h4>
  	<hr>
  	<?php
		include realpath(dirname(__FILE__)).'/../config/db.php';
		$rackid  = mysqli_real_escape_string($conn, (int)$_GET['rackid']);
		$sql = "SELECT * FROM `power_feeds` WHERE `rackid`='$rackid'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
		  	while($row = $result->fetch_assoc()) {
		  	    echo "<div class='panel panel-default'>";
		  	    	echo "<div class='panel-heading'>";
		            	echo "<center><h4>".$row["feed_type"]."</h4></center>";
		            echo "</div>";
		            echo "<div class='panel-body'>";
		            	if($row["feed_type"]=="A") {
		            		echo "<center><p>Power ".power_usage_A()."A</center></p>";
		            	} else {
		            		echo "<center><p>Power ".power_usage_B()."A</center></p>";
		            	}
				  	    echo "<center><p>Voltage ".$row["feed_voltage"]."V</center></p>";
				  	echo "</div>";
				echo "</div>";
		  	}
		} else {
			echo "<center>No power feeds found</center>";
	}     
	?>
  </div>
  <div class="col-md-4">
  	<h4><center>Remaining</center></h4>
  	<hr>
  	<?php
		include realpath(dirname(__FILE__)).'/../config/db.php';
		$rackid  = mysqli_real_escape_string($conn, (int)$_GET['rackid']);
		$sql = "SELECT * FROM `power_feeds` WHERE `rackid`='$rackid'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
		  	while($row = $result->fetch_assoc()) {
		  	    echo "<div class='panel panel-default'>";
		  	    	echo "<div class='panel-heading'>";
		            	echo "<center><h4>".$row["feed_type"]."</h4></center>";
		            echo "</div>";
		            echo "<div class='panel-body'>";
		            	if($row["feed_type"]=="A") {
		            		$power_remaining_A = $row["feed_power"]-power_usage_A();
		            		echo "<center><p>Power ".$power_remaining_A."A</center></p>";
		            	} else {
		            		$power_remaining_B = $row["feed_power"]-power_usage_B();
		            		echo "<center><p>Power ".$power_remaining_B."A</center></p>";
		            	}
				  	    echo "<center><p>Voltage ".$row["feed_voltage"]."V</center></p>";
				  	echo "</div>";
				echo "</div>";
		  	}
		} else {
			echo "<center>No power feeds found</center>";
	}     
	?>
  </div>
</div>