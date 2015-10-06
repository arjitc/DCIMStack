<?php
include_once 'libraries/general.php';
include_once 'config/db.php';
//error_reporting(-1);
//ini_set('display_errors', 'On');
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
		  	    	echo "<div class='well'>";
		  	    	$id = $row["server_id"];
		  	    	echo "<tr>";
		                echo "<center><h4>".$row["feed_type"]."</h4></center>";
		  	            echo "<center><p>Power ".$row["feed_power"]."A</center></p>";
		  	            echo "<center><p>Voltage ".$row["feed_voltage"]."V</center></p>";
		             echo "</div>";
		  	    }
		  	    
		  	} else {
		  	    echo "<center>No servers found</center>";
		  	}     
		  	?>
  </div>
  <div class="col-md-4">
  	<h4><center>Usage</center></h4>
  	<hr>
  </div>
  <div class="col-md-4">
  	<h4><center>Remaining</center></h4>
  	<hr>
  </div>
</div>