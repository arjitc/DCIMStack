<?php
include 'config/db.php';
$sql = "SELECT * FROM `devices` WHERE `device_type` in ('switch','router','SFP to Ethernet converter') AND `rackid`='$rackid'";
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
  echo "<th>Port Count</th>";
  echo "<th>Serial #</th>";
  echo "<th><center>Manage</center></th>";
  echo "</tr>";
  echo "</thead>";
  while($row = $result->fetch_assoc()) {
   echo "<tr>";
   echo "<td>". get_rack_name($row['rackid']) ."</td>";
   echo "<td>". $row["device_brand"]."</td>";
   echo "<td>". ucfirst($row["device_type"])."</td>";
   echo "<td>". $row["device_label"]."</td>";
   echo "<td>". $row["device_port_count"]."</td>";
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