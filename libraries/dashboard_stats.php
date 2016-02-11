<?php
function rackspace_available() {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $sql = "SELECT SUM(rack_size) AS rack_size_sum FROM `rackspace`";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $rack_size_sum = $row["rack_size_sum"];
      }
  } else {
      $rack_size_sum = "0";
  }

  $sql = "SELECT * FROM `devices` WHERE `device_type`='server' OR `device_type`='router' OR `device_type`='switch' OR `device_type`='PDU'";
  $result = $conn->query($sql);
  $rack_used_sum = $result->num_rows;

  $rackspace_available = $rack_size_sum - $rack_used_sum;
  return $rackspace_available;
}

function rackspace_used() {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $sql = "SELECT * FROM `devices` WHERE `device_type`='server' OR `device_type`='router' OR `device_type`='switch' OR `device_type`='PDU'";
  $result = $conn->query($sql);
  return $result->num_rows;
  $conn->close();
}

function hardware_used() {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $sql = "SELECT * FROM `devices` WHERE `device_type`!='server' OR `device_type`!='router' OR `device_type`!='switch' OR `device_type`!='PDU'";
  $result = $conn->query($sql);
  return $result->num_rows;
  $conn->close();
}

function hardware_available() {
  include '../config/db.php';

}
?>
