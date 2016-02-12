<?php
function get_filename_from_url() {
  $filename = basename($_SERVER['REQUEST_URI'], '?'.$_SERVER['QUERY_STRING']);
  return $filename;
}
function get_rack_name($id) {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $id  = mysqli_real_escape_string($conn, $id);
  $sql = "SELECT * FROM `rackspace` WHERE `rackid`='$id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $rack_name = $row["rack_name"];
      }
  } else {
      $rack_name = "None";
  }
  return $rack_name;
}
function check_if_rack_exists($id) {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $id  = mysqli_real_escape_string($conn, $id);
  $sql = "SELECT * FROM `rackspace` WHERE `rackid`='$id'";
  $result = $conn->query($sql);
  if ($result->num_rows == 0) {
    header('Location: index.php');
  }
}
function check_if_feed_exists($feedid) {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $feedid = mysqli_real_escape_string($conn, $feedid);
  $sql = "SELECT * FROM `power_feeds` WHERE `feed_id`='$feedid'";
  $result = $conn->query($sql);
  if ($result->num_rows == 0) {
    header('Location: index.php');
  }
}
function get_device_label_from_id($device_id) {
  include realpath(dirname(__FILE__)).'/../config/db.php';
  $id  = mysqli_real_escape_string($conn, $id);
  $sql = "SELECT * FROM `devices` WHERE `device_id`='$device_id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $device_label = $row["device_label"];
      }
  } else {
      $device_label = "None";
  }
  return $device_label;
}
?>