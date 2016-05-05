<?php
include 'config/db.php';
$sql = "SELECT * FROM `devices` WHERE `device_type`='server' AND `rackid`='$rackid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        // output data of each row
  echo "<table class='table' id='search_table'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>Location</th>";
  echo "<th>Vendor</th>";
  echo "<th>Physical Label</th>";
  echo "<th>Customer</th>";
  echo "<th>IP Address</th>";
  echo "<th>MAC Address</th>";
  echo "<th>Serial #</th>";
  echo "<th><center>Manage</center></th>";
  echo "</tr>";
  echo "</thead>";
  while ($row = $result->fetch_assoc()) {
    $device_id = $row["device_id"];
    echo "<tr>";
    echo "<td>".get_rack_name($row['rackid'])."</td>";
    echo "<td>".$row["device_brand"]."</td>";
    echo "<td>".$row["device_label"]."</td>";
    echo "<td>".$row["device_customer"]."</td>";
    echo "<td>".$row["device_ipaddress"]."</td>";
    echo "<td>".$row["device_mac"]."</td>";
    echo "<td>".$row["device_serial"]."</td>";
    echo "<td><center><a href='manage_server.php?device_id=$device_id'>Manage</a></center></td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>