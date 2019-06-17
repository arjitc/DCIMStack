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
  ?>
</head>

<body>

  <?php include 'libraries/header2.php'; ?>

  <div class="container-fluid">
    <h1 class="page-header">Network Devices <div class='pull-right'><button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_hdd"><img src='assets/img/add.png'> Add</a></button></div></h1>
    <?php
    include 'config/db.php';
    $sql = "SELECT * FROM `devices` WHERE `device_type` in ('switch','router','SFP to Ethernet converter')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      echo "<table class='table' id='search_table'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Location</th>";
      echo "<th>Vendor</th>";
      echo "<th>Type</th>";
      echo "<th>Physical Label</th>";
      echo "<th>Port Count</th>";
      echo "<th>Serial #</th>";
      echo "<th><center>Manage</center></th>";
      echo "</tr>";
      echo "</thead>";
      while($row = $result->fetch_assoc()) {
        $id = $row["device_id"];
        echo "<tr>";
        echo "<td>". get_rack_name($row['rackid']) ."</td>";
        echo "<td>". $row["device_brand"]."</td>";
        echo "<td>". ucfirst($row["device_type"])."</td>";
        echo "<td>". $row["device_label"]."</td>";
        echo "<td>". $row["device_port_count"]."</td>";
        echo "<td>". $row["device_serial"]."</td>";
        echo "<td><center><a href='manage_network.php?device_id=$id'>Manage</a></center></td>";
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
        <h4 class="modal-title"><img src="assets/img/computer_add.png"> Add Network Device </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
     </div>
     <div class="modal-body">
       <form action="add_device_db.php" id="add_hdds" method="post">
        <input type="hidden" name="page_referrer" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
        <label>Device Type</label>
        <select class="form-control" name="device_type">
         <option value="Switch">Switch</option>
         <option value="Router">Router</option>
         <option value="SFP to Ethernet converter">SFP to Ethernet converter</option>
       </select>
       <label>Device Vendor</label>
       <select class="form-control" name="device_brand">
         <option value="Juniper">Juniper</option>
         <option value="Cisco">Cisco</option>
         <option value="Mikrotik/RouterBoard">Mikrotik/RouterBoard</option>
         <option value="HP">HP</option>
         <option value="Dell">Dell</option>
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
   </select>
   <label>Device Label</label>
   <input type="text" class="form-control" name="device_label">
   <label>Device Serial</label>
   <input type="text" class="form-control" name="device_serial">
   <label>Device Port Count</label>
   <input type="number" min="1" step="1" class="form-control" name="device_port_count"><br>
 </form>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 <input type="submit" form="add_hdds" class="btn btn-primary">
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
