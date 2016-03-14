<?php
include 'config/db.php';
$sql = "SELECT * FROM `devices` WHERE `device_type`='server' AND `rackid`='$rackid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  echo "<table class='table' id='search_table'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>Vendor</th>";
  echo "<th>Physical Label</th>";
  echo "<th>Capacity</th>";
  echo "<th>Serial #</th>";
  echo "<th>Purchased on</th>";
  echo "<th>Warranty till</th>";
  echo "<th><center>Manage</center></th>";
  echo "</tr>";
  echo "</thead>";
  while ($row = $result->fetch_assoc()) {
    $device_id = $row["device_id"];
    echo "<tr>";
    echo "<td>".$row["device_brand"]."</td>";
    echo "<td>".$row["device_label"]."</td>";
    echo "<td>".$row["device_capacity"]."</td>";
    echo "<td>".$row["device_serial"]."</td>";
    echo "<td>"; if (empty($row["device_dop"])) { echo "0000-00-00"; } else { echo $row["device_dop"]; } echo "</td>";
    echo "<td>"; if (empty($row["device_warranty"])) { echo "0000-00-00"; } else { echo $row["device_warranty"]; }  echo "</td>";
    echo "<td><center><a href='manage_server.php?device_id=$device_id' data-remote='false' data-toggle='ajaxModal' data-target='#myModal'>Manage</a></center></td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>