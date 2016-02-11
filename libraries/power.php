<?php
function device_power_feed_count($server_id) {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $feed_count = 0;
  $server_id = mysqli_real_escape_string($conn, $server_id);
  $sql = "SELECT * FROM `devices` WHERE `server_id`='$server_id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
          $device_power_feed1 = $row["device_power_feed1"];
          $device_power_feed2 = $row["device_power_feed2"];
      }
      if (!empty($device_power_feed1)) {
        $feed_count = 1;
      }
      if (!empty($device_power_feed2)) {
        $feed_count = $feed_count + 1;
      }
      return $feed_count;
  } else {
      return $feed_count;
  }     
}
function rack_power_feed_count($rackid) {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $feed_count = 0;
  $rackid    = mysqli_real_escape_string($conn, $rackid);
  $sql = "SELECT * FROM `power_feeds` WHERE `rackid`='$rackid'";
  $result = $conn->query($sql);
  return $result->num_rows;
}
/**
 * @param string $server_id
 */
function device_power_feed_check_A($server_id) { //check if server has power feed A
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $server_id    = mysqli_real_escape_string($conn, $server_id);
  $has_A = 0;
  $sql = "SELECT * FROM `devices` WHERE `server_id`='$server_id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $device_power_feed1 = $row["device_power_feed1"];
          $device_power_feed2 = $row["device_power_feed2"];
      }
      if(!empty($device_power_feed1) && $device_power_feed1=="A") {
        $has_A = 1;
      }
      if(!empty($device_power_feed2) && $device_power_feed2=="A") {
        $has_A = 1;
      }
      return $has_A;
  } else {
      return $has_A;
  }     
}
/**
 * @param string $server_id
 */
function device_power_feed_check_B($server_id) { //check if server has power feed B
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $server_id = mysqli_real_escape_string($conn, $server_id);
  $has_B = 0;
  $sql = "SELECT * FROM `devices` WHERE `server_id`='$server_id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
          $device_power_feed1 = $row["device_power_feed1"];
          $device_power_feed2 = $row["device_power_feed2"];
      }
      if (!empty($device_power_feed1) && $device_power_feed1 == "B") {
        $has_B = 1;
      }
      if (!empty($device_power_feed2) && $device_power_feed2 == "B") {
        $has_B = 1;
      }
      return $has_B;
  } else {
      return $has_B;
  }     
}
function device_power_usage($server_id) { 
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $device_power_usage = 0;
  $server_id = mysqli_real_escape_string($conn, $server_id);
  $sql = "SELECT * FROM `devices` WHERE `server_id`='$server_id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
              $device_power_usage = $row["device_power_usage"];
      }
      if (device_power_feed_check_B($server_id) && device_power_feed_check_A($server_id)) {
        $device_power_usage = $device_power_usage*2;
        return $device_power_usage;
      } else {
        return $device_power_usage;
      }
  } else {
      return $device_power_usage;
  }     
}
function power_usage_A() { 
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $device_power_usage_sum_A = 0;
  $sql = "SELECT SUM(device_power_usage) AS `device_power_usage_sum_A` FROM `devices` WHERE `device_power_feed1`!='' AND `device_type`='server'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
              $device_power_usage_sum_A = $row["device_power_usage_sum_A"];
              if (empty($row["device_power_usage_sum_A"])) $device_power_usage_sum_A = 0;
      }
      return $device_power_usage_sum_A;
  } else {
      return 0;
  }     
}
function power_usage_B() { 
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $device_power_usage_sum_B = 0;
  $sql = "SELECT SUM(device_power_usage) AS `device_power_usage_sum_B` FROM `devices` WHERE `device_power_feed2`!='' AND `device_type`='server'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
              $device_power_usage_sum_B = $row["device_power_usage_sum_B"];
              if (empty($row["device_power_usage_sum_B"])) $device_power_usage_sum_B = 0;
      }
      return $device_power_usage_sum_B;
  } else {
      return 0;
  }     
}
function rack_power_total($rackid) {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $rackid = mysqli_real_escape_string($conn, $rackid);
  $sql = "SELECT SUM(feed_power) AS `feed_power_sum` FROM `power_feeds` WHERE `rackid`='$rackid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
              $feed_power_sum = $row["feed_power_sum"];
      }
      return $feed_power_sum;
  } else {
      return 0;
  }
}

function rack_voltage($rackid) {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $rackid = mysqli_real_escape_string($conn, $rackid);
  $sql = "SELECT * FROM `power_feeds` WHERE `rackid`='$rackid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
              $feed_voltage = $row["feed_voltage"];
      }
      return $feed_voltage;
  } else {
      return 0;
  }
}

function rack_feed_count($rackid) {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $rackid = mysqli_real_escape_string($conn, $rackid);
  $sql = "SELECT * FROM `power_feeds` WHERE `rackid`='$rackid'";
  $result = $conn->query($sql);
  return $result->num_rows;
}

function power_feed_name($feedid) { //gets power feed name ie, A or B when the $feedid is passed on
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $feedid = mysqli_real_escape_string($conn, $feedid);
  $sql = "SELECT * FROM `power_feeds` WHERE `feed_id`='$feedid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
              $feed_type = $row["feed_type"];
      }
      return $feed_type;
  } else {
      return 0;
  }
}
?>