<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DCIMStack</title>
    <?php
    include 'libraries/css2.php';
    include 'libraries/general.php';
    //error_reporting(-1);
    //ini_set('display_errors', 'On');
    ?>
  </head>

  <body>

    <?php include 'libraries/header2.php'; ?>

    <div class="container-fluid">
          <h1 class="page-header">CPUs <div class='pull-right'><button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_hdd"><img src='assets/img/add.png'> Add</a></button></div></h1>
          <?php include 'libraries/alerts.php'; ?>
          <?php
            include 'config/db.php';
            $sql = "SELECT * FROM `devices` WHERE `device_type`='CPU'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table class='table' id='search_table'>";
                echo "<thead>";
                echo "<tr>";
                  echo "<th>Location</th>";
                    echo "<th>Vendor</th>";
                    echo "<th>Device Model</th>";
                    echo "<th>Physical Label</th>";
                    echo "<th>Serial #</th>";
                    echo "<th>Purchased on</th>";
                    echo "<th>Warranty till</th>";
                    echo "<th><center>Manage</center></th>";
                echo "</tr>";
                echo "</thead>";
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                      echo "<td>".get_rack_name($row['rackid'])."</td>";
                      echo "<td>".$row["device_brand"]."</td>";
                        echo "<td>".$row["device_cpu"]."</td>";
                      echo "<td>".$row["device_label"]."</td>";
                      echo "<td>".$row["device_serial"]."</td>";
                      echo "<td>"; if (empty($row["device_dop"])) { echo "0000-00-00"; } else { echo $row["device_dop"]; } echo "</td>";
                      echo "<td>"; if (empty($row["device_warranty"])) { echo "0000-00-00"; } else { echo $row["device_warranty"]; }  echo "</td>";
                      echo "<td><center>Manage</center></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No CPUs found.";
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
          <h4 class="modal-title"><img src="assets/img/computer_add.png"> Add CPUs </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	    	</div>
		    <div class="modal-body">
		    	<form action="add_device_db.php" id="add_hdds" method="post">
		    		<input type="hidden" name="page_referrer" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
		    		<label>Device Type</label>
		    		<input type="text" class="form-control" name="device_type" value="CPU" readonly>
					<label>Device Vendor</label>
		    		<select class="form-control" name="device_brand">
					  <option value="Intel">Intel</option>
					  <option value="AMD">AMD</option>
					</select>
					<label>Device Location</label>
					<?php
          include 'config/db.php';
          $sql = "SELECT * FROM `rackspace`";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            echo "<select class='form-control' name='device_location'>";
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                $rackid = $row["rackid"];
                  echo "<option value='$rackid'>".get_rack_name($rackid)."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          ?>
          <label>Device Date Of Purchase</label>
          <input type="date" class="form-control" name="device_dop" required>
          <label>Warranty valid til</label>
          <input type="date" class="form-control" name="device_warranty" required>
					<label>Device Label</label>
					<input type="text" class="form-control" name="device_label" required>
					<label>Device Serial</label>
					<input type="text" class="form-control" name="device_serial" required>
					<label>Device Model</label>
					<input type="text" class="form-control" name="device_cpu" required><br>
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
    <?php include 'libraries/js2.php'; ?>
  </body>
</html>
