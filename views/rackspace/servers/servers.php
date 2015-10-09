<?php
include_once 'libraries/general.php';
include_once 'config/db.php';
include_once 'libraries/cpu_count.php';
//error_reporting(-1);
//ini_set('display_errors', 'On');
check_if_rack_exists($_GET['rackid']); //this checks if the rack exists, if the rack does not exist it redirects the user back to index.php
?>

<?php
include realpath(dirname(__FILE__)).'/../config/db.php';
$rackid  = mysqli_real_escape_string($conn, (int)$_GET['rackid']);
$sql = "SELECT * FROM `servers` WHERE `rackid`='$rackid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  echo "<div class='table-responsive'>
          <table class='table table-striped'>
            <thead>
              <tr>
                <th>Position</th>
                <th>Brand</th>
                <th>Physical Label</th>
                <th>RAM</th>
                <th>CPU</th>
                <th>Size</th>
                <th>Serial</th>
              </tr>
            </thead>
          <tbody>";
  	    while($row = $result->fetch_assoc()) {
  	    	$id = $row["server_id"];
  	    	echo "<tr>";
                echo "<td>".$row["server_rack_position"]."</td>";
  	            echo "<td>".$row["server_brand"]."</td>";
  	            echo "<td>".$row["server_label"]."</td>";
  	            echo "<td>".$row["server_ram_total"]."</td>";
                echo "<td>".server_cpu_count($row["server_cpu"], $row["server_cpu_count"])."</td>";
  	            echo "<td>".$row["server_size"]."U</td>";
  	            echo "<td>".$row["server_serial"]."</td>";
              echo "</tr>";
  	    }
  	    echo "</tbody>
              </table>
            </div>";
  	} else {
  	    echo "<center>No servers found</center>";
  	}     
  	?>