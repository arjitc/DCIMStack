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
  ?>
</head>

<body>

  <?php include 'libraries/header.php'; ?>

  <div class="container">
    <h1 class="page-header">HDDs <div class='pull-right'><button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_hdd"><img src='assets/img/add.png'> Add</a></button></div></h1>
    <?php include 'libraries/alerts.php'; ?>
    <?php
    include 'config/db.php';
    $sql = "SELECT * FROM `devices` WHERE `device_type` in ('SSD','HDD','SAS')";
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
      echo "<th>Server</th>";
      echo "<th>Serial #</th>";
      echo "<th>Purchased on</th>";
      echo "<th>Warranty till</th>";
      echo "<th><center>Manage</center></th>";
      echo "</tr>";
      echo "</thead>";
      while ($row = $result->fetch_assoc()) {
        $device_id = $row["device_id"];
        if($row["device_parent"]!=0 || $row["device_inuse"]==1) { 
          echo "<tr class='info'>"; 
        }
        else { 
          echo "<tr>"; 
        }
        echo "<td>".get_rack_name($row['rackid'])."</td>";
        echo "<td>".$row["device_brand"]."</td>";
        echo "<td>".$row["device_type"]."</td>";
        echo "<td>".$row["device_label"]."</td>";
        echo "<td>".$row["device_capacity"]."</td>";
        echo "<td>".get_device_label_from_id($row["device_parent"])."</td>";
        echo "<td>".$row["device_serial"]."</td>";
        echo "<td>"; if (empty($row["device_dop"])) { echo "0000-00-00"; } else { echo $row["device_dop"]; } echo "</td>";
        echo "<td>"; if (empty($row["device_warranty"])) { echo "0000-00-00"; } else { echo $row["device_warranty"]; }  echo "</td>";
        echo "<td><center><a href='manage_hdd.php?device_id=$device_id' data-remote='false' data-toggle='ajaxModal' data-target='#myModal'>Manage</a></center></td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
    <div class="pull-right">
      <small><i>Blue indicates the device in use, Red indicates a failed device</i></small>
    </div>
  </div>
  <!-- Add HDD Modal -->
  <div id="add_hdd" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><img src="assets/img/drive_add.png"> Add HDD</h4>
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
              <option value="HP">HP</option>
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
            <label>Server</label>
            <?php
            include 'config/db.php';
            $sql = "SELECT * FROM `devices` WHERE `device_type`='server'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              echo "<select class='form-control' name='device_parent'>";
              // output data of each row
              echo "<option value='0'>None</option>";
              while ($row = $result->fetch_assoc()) {
                $device_label = $row["device_label"];
                $device_id = $row["device_id"];
                echo "<option value='$device_id'>$device_label</option>";
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
            <label>Device Capacity</label>
            <input type="text" class="form-control" name="device_capacity" required><br>
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
