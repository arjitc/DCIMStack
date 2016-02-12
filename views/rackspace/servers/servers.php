<?php
include realpath(dirname(__FILE__)).'/../config/db.php';
$rackid = mysqli_real_escape_string($conn, (int)$_GET['rackid']);
$sql = "SELECT * FROM `devices` WHERE `device_type`='server' AND `rackid`='$rackid'";
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
          $id = $row["device_id"];
          echo "<tr>";
                echo "<td>".$row["device_rack_position"]."</td>";
                echo "<td>".vendor_logo($row["device_brand"])."</td>";
                echo "<td>".$row["device_label"]."</td>";
                echo "<td>".$row["device_ram_total"]."</td>";
                echo "<td>".device_cpu_count($row["device_cpu"], $row["device_cpu_count"])."</td>";
                echo "<td>".$row["device_size"]."U</td>";
                echo "<td>".$row["device_serial"]."</td>";
              echo "</tr>";
        }
        echo "</tbody>
              </table>
            </div>";
    } else {
        echo "<center>No Servers Found</center>";
    }     
?>