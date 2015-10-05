<?php
include_once 'libraries/general.php';
include_once 'config/db.php';
//error_reporting(-1);
//ini_set('display_errors', 'On');
check_if_rack_exists($_GET['id']); //this checks if the rack exists, if the rack does not exist it redirects the user back to index.php
?>

<div class="row">
  <div class="col-md-8">
  	<h4>Servers</h4>
  	<?php
  	include realpath(dirname(__FILE__)).'/../config/db.php';
  	$id  = mysqli_real_escape_string($conn, (int)$_GET['id']);
	$sql = "SELECT * FROM `servers` WHERE `rackid`='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    echo "<div class='table-responsive'>
            <table class='table table-striped'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Type</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Timestamp</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>";
	    while($row = $result->fetch_assoc()) {
	    	$id = $row["id"];
	    	echo "<tr>";
	            echo "<td>".$row["id"]."</td>";
	            echo "<td>".$row["event_type"]."</td>";
	            echo "<td>".$row["event_message"]."</td>";
	            echo "<td>".$row["event_status"]."</td>";
	            echo "<td>".$row["event_timestamp"]."</td>";
	            echo "<td><a href='delete_event.php?id=$id&token=$token' class='confirmation'><i class='fa fa-times'></i></a></td>";
            echo "</tr>";
	    }
	    echo "</tbody>
            </table>
          </div>";
	} else {
	    echo "<center>No events found</center>";
	}     
	?>
  </div>
  <div class="col-md-4">
  	<h4>Current feeds</h4>
  </div>
</div>