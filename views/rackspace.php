<?php
include 'libraries/general.php';
include 'config/db.php';
check_if_rack_exists($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DCIMStack</title>
    <?php include 'libraries/css.php'; ?>
  </head>

  <body>

    <?php include 'libraries/header.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'libraries/sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Manage Rackspace (<?php echo get_rack_name($_GET['id']); ?>)</h1>
          <div class="row">
            <div class="col-md-4">
              <?php
              $id = (int)$_GET['id'];
              $sql = "SELECT * FROM `rackspace` WHERE `id`='$id'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<center><h2>".$row["rack_size"]."U</h2></center>";
                  }
              } else {
                  echo "<center><h2>0U</h2></center>";
              }
              echo "<center><h4>Rackspace available</h4></center>";
              echo "<center><span class='text-muted'>Individual U's of rackspace not in-use</span></center>";
              ?>
            </div>
            <div class="col-md-4">
              <?php
              $id = (int)$_GET['id'];
              $sql = "SELECT * FROM `rackspace` WHERE `id`='$id'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<center><h2>".$row["rack_used"]."U</h2></center>";
                  }
              } else {
                  echo "<center><h2>0U</h2></center>";
              }
              echo "<center><h4>Rackspace used</h4></center>";
              echo "<center><span class='text-muted'>Individual U's of rackspace in-use</span></center>";
              ?>
            </div>
            <div class="col-md-4">
              <?php
              $id = (int)$_GET['id'];
              $sql = "SELECT * FROM `servers` WHERE `server_rackid`='$id'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<center><h2>".$result->num_rows."</h2></center>";
                  }
              } else {
                  echo "<center><h2>0</h2></center>";
              }
              echo "<center><h4>Server count</h4></center>";
              echo "<center><span class='text-muted'>Individual number of servers in this rack</span></center>";
              ?>
            </div>
          </div>
          <hr>
          <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#overview" data-toggle="tab"><i class="fa fa-television"></i> Overview</a></li>
            <li><a href="#servers" data-toggle="tab"><i class="fa fa-server"></i> Servers</a></li>
            <li><a href="#network" data-toggle="tab"><i class="fa fa-exchange"></i> Network</a></li>
            <li><a href="#power_management" data-toggle="tab"><i class="fa fa-battery-full"></i> Power Management</a></li>
            <li><a href="#inventory" data-toggle="tab"><i class="fa fa-archive"></i> Inventory</a></li>
          </ul>
          <div id="my-tab-content" class="tab-content">
              <div class="tab-pane active" id="overview">
                  <h1>Overview</h1>
                  <hr>
              </div>
              <div class="tab-pane" id="servers">
                  <h1>Servers</h1>
                  <hr>
                  <p>orange orange orange orange orange</p>
              </div>
              <div class="tab-pane" id="network">
                  <h1>Network</h1>
                  <hr>
                  <p>yellow yellow yellow yellow yellow</p>
              </div>
              <div class="tab-pane" id="power_management">
                  <h1>Power Management</h1>
                  <hr>
                  <p>green green green green green</p>
              </div>
              <div class="tab-pane" id="inventory">
                  <h1>Inventory</h1>
                  <hr>
                  <p>blue blue blue blue blue</p>
              </div>
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