<?php
$sql = "SELECT * FROM `settings` WHERE `setting`='aftership_api_key'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
  while ($row = $result->fetch_assoc()) {
    $aftership_api_key = $row["value"];
  }
} else {
    //echo "0 results";
}
$sql = "SELECT * FROM `settings` WHERE `setting`='librenms_api_key'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
  while ($row = $result->fetch_assoc()) {
    $librenms_api_key = $row["value"];
  }
} else {
    //echo "0 results";
}
$sql = "SELECT * FROM `settings` WHERE `setting`='librenms_api_endpoint'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
  while ($row = $result->fetch_assoc()) {
    $librenms_api_endpoint = $row["value"];
  }
} else {
    //echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DCIMStack</title>
  <?php
  include 'libraries/css.php';
  $token = md5(uniqid(rand(), TRUE));
  $_SESSION['token'] = $token;
  ?>
</head>

<body>

  <?php include 'libraries/header.php'; ?>

  <div class="container">
    <h1 class="page-header">DCIMStack Settings</h1>
    <?php include 'libraries/alerts.php'; ?>
    <div id="content">
      <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#red" data-toggle="tab">Red</a></li>
        <li><a href="#librenms" data-toggle="tab">LibreNMS</a></li>
        <li><a href="#yellow" data-toggle="tab">Yellow</a></li>
        <li><a href="#green" data-toggle="tab">Green</a></li>
        <li><a href="#blue" data-toggle="tab">Blue</a></li>
      </ul>
      <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="red">
          <h1>Red</h1>
          <p>red red red red red red</p>
        </div>
        <div class="tab-pane" id="librenms">
          <h1>LibreNMS</h1>
          <hr>
          <?php include 'settings/librenms_tab.php'; ?>
        </div>
        <div class="tab-pane" id="yellow">
          <h1>Yellow</h1>
          <p>yellow yellow yellow yellow yellow</p>
        </div>
        <div class="tab-pane" id="green">
          <h1>Green</h1>
          <p>green green green green green</p>
        </div>
        <div class="tab-pane" id="blue">
          <h1>Blue</h1>
          <p>blue blue blue blue blue</p>
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
