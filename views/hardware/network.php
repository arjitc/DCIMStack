<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DCIMStack</title>
    <?php 
    include 'libraries/css.php'; 
    include 'libraries/general.php';
    //error_reporting(-1);
    //ini_set('display_errors', 'On');
    ?>
  </head>

  <body>

    <?php include 'libraries/header.php'; ?>

    <div class="container">
          <h1 class="page-header">Network Devices <div class='pull-right'><button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_hdd"><img src='assets/img/add.png'> Add</a></button></div></h1>
          <?php
            include 'config/db.php';
            $sql = "SELECT * FROM `devices` WHERE `device_type`='SSD' OR `device_type`='SATA' OR `device_type`='SAS'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table class='table' id='search_table'>";
                echo "<thead>";
                echo "<tr>";
                	echo "<th>Location</th>";
                  	echo "<th>Vendor</th>";
                  	echo "<th>Type</th>";
                  	echo "<th>Physical Label</th>";
                  	echo "<th>Capacity</th>";
                  	echo "<th>Serial #</th>";
                  	echo "<th><center>Manage</center></th>";
                echo "</tr>";
                echo "</thead>";
                while($row = $result->fetch_assoc()) {
                	echo "<tr>";
                  		echo "<td>". get_rack_name($row['rackid']) ."</td>";
                    	echo "<td>". $row["device_brand"]."</td>";
                     	echo "<td>". $row["device_type"]."</td>";
                      	echo "<td>". $row["device_label"]."</td>";
                      	echo "<td>". $row["device_capacity"]."</td>";
                      	echo "<td>". $row["device_serial"]."</td>";
                      	echo "<td><center>Manage</center></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
          ?>
        </div>
    <!-- Add HDD Modal -->
	<div id="add_hdd" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	    	<div class="modal-header">
	    		<button type="button" class="close" data-dismiss="modal">&times;</button>
	    		<h4 class="modal-title">Add HDDs</h4>
	    	</div>
		    <div class="modal-body">
		    	<form action="add_device_db.php" id="add_hdds" method="post">
		    		<input type="hidden" name="page_referrer" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
		    		<label>Device Type</label>
		    		<select class="form-control" name="device_type">
					  <option value="SSD">SSD</option>
					  <option value="HDD">HDD</option>
					  <option value="SAS">SAS</option>
					</select>
					<label>Device Vendor</label>
		    		<select class="form-control" name="device_brand">
					  <option value="Hitachi">Hitachi</option>
					  <option value="Seagate">Seagate</option>
					  <option value="WD">WD</option>
					  <option value="Samsung">Samsung</option>
					  <option value="Toshiba">Toshiba</option>
					</select>
					<label>Device Location</label>
					<?php
					include 'config/db.php';
					$sql = "SELECT * FROM `rackspace`";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						echo "<select class='form-control' name='device_location'>";
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					    	$rackid = $row["rackid"];
					        echo "<option value='$rackid'>".get_rack_name($rackid)."</option>";
					    }
					} else {
					    echo "0 results";
					}
					?>
					<br>
					<label>Device Label</label>
					<input type="text" class="form-control" name="device_label">
					<label>Device Serial</label>
					<input type="text" class="form-control" name="device_serial">
					<label>Device Capacity</label>
					<input type="text" class="form-control" name="device_capacity"><br>
				</form>
		    </div>
		    <div class="modal-footer">
		    	<input type="submit" form="add_hdds" class="btn btn-primary">
		    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </div>
	    </div>
	  </div>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
  </body>
</html>


