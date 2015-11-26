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

    <div class="container-fluid">
      <div class="row">
        <?php include 'libraries/sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">RAM <div class='pull-right'><button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_hdd"><img src='assets/img/add.png'> Add</a></button></div></h1>
          <?php
            include 'config/db.php';
            $sql = "SELECT * FROM `devices` WHERE `device_type`='RAM'";
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
      </div>
    </div>
    <!-- Add HDD Modal -->
	<div id="add_hdd" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	    	<div class="modal-header">
	    		<button type="button" class="close" data-dismiss="modal">&times;</button>
	    		<h4 class="modal-title">Add RAM</h4>
	    	</div>
		    <div class="modal-body">
		    	<form action="add_device_db.php" id="add_hdds" method="post">
		    		<input type="hidden" name="page_referrer" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
		    		<label>Device Type</label>
		    		<input type="text" class="form-control" name="device_type" value="RAM" readonly>
					<label for="device_brand">Device Vendor</label>
		    		<select class="form-control" id="device_brand" name="device_brand">
					  <option value="Samsung">Samsung</option>
					  <option value="Transcend">Transcend</option>
					</select>
					<label for="device_location">Device Location</label>
					<?php
					include 'config/db.php';
					$sql = "SELECT * FROM `rackspace`";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						echo "<select class='form-control' id='device_location' name='device_location'>";
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					    	$rackid = $row["rackid"];
					        echo "<option value='$rackid'>".get_rack_name($rackid)."</option>";
					    }
					    echo "</select>";
					} else {
					    echo "0 results";
					}
					?>
					<label for="device_label">Device Label</label>
					<input type="text" class="form-control" id="device_label" name="device_label">
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


