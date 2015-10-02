<?php
include 'libraries/general.php';
include 'config/db.php';
check_if_rack_exists($_GET['id']); //this checks if the rack exists, if the rack does not exist it redirects the user back to index.php
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
                      echo "<center><h2>".$row["rack_size_used"]."U</h2></center>";
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
                  <h3>Overview</h3>

              </div>
              <div class="tab-pane" id="servers">
                  <h3>Servers</h3>
                  
              </div>
              <div class="tab-pane" id="network">
                  <h3>Network</h3>
                  
              </div>
              <div class="tab-pane" id="power_management">
                  <h3>Power Management</h3>

                  
              </div>
              <div class="tab-pane" id="inventory">
                  <h3>Inventory</h3>
                  <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#hdd" data-toggle="tab"><i class="fa fa-hdd-o"></i> HDDs</a></li>
                    <li><a href="#raid_cards" data-toggle="tab"><i class="fa fa-keyboard-o"></i> RAID Cards</a></li>
                    <li><a href="#cables" data-toggle="tab"><i class="fa fa-random"></i> Cables</a></li>
                    <li><a href="#networking_gear" data-toggle="tab"><i class="fa fa-arrows"></i> Networking Gear</a></li>
                    <li><a href="#pdu" data-toggle="tab"><i class="fa fa-plug"></i> PDUs</a></li>
                    <li><a href="#other" data-toggle="tab"><i class="fa fa-question"></i> Other</a></li>
                  </ul>
                  <div id="my-tab-content" class="tab-content">
                      <div class="tab-pane active" id="hdd">
                          <h3>HDDs</h3>
                          <hr>

                      </div>
                      <div class="tab-pane" id="raid_cards">
                          <h3>RAID Cards</h3>
                          <hr>
                          
                      </div>
                      <div class="tab-pane" id="cables">
                          <h3>Cables</h3>
                          <hr>
                          
                      </div>
                      <div class="tab-pane" id="networking_gear">
                          <h3>Networking Gear</h3>
                          <hr>
                          
                      </div>
                      <div class="tab-pane" id="pdu">
                          <h3>PDUs</h3>
                          <hr>
                          
                      </div>
                      <div class="tab-pane" id="other">
                          <h1>Other</h1>
                          <hr>
                          
                      </div>
                  </div>
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