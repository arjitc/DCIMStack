<?php
include 'libraries/general.php';
include 'libraries/rackspace.php';
include 'libraries/power.php';
include 'config/db.php';
check_if_rack_exists($_GET['rackid']); //this checks if the rack exists, if the rack does not exist it redirects the user back to index.php
$rackid  = mysqli_real_escape_string($conn, (int)$_GET['rackid']);
$_SESSION['referrer'] = basename($_SERVER['PHP_SELF']); //referrer for redirects etc
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
          <h1 class="page-header">Manage Rackspace (<?php echo get_rack_name($_GET['rackid']); ?>)</h1>
          <?php include 'libraries/alerts.php'; ?>
          <div class="row">
            <div class="col-md-4">
              <?php
              echo "<center><h2>".rackspace_available_rack($rackid)."U</h2></center>";
              echo "<center><h4>Rackspace available</h4></center>";
              echo "<center><span class='text-muted'>Individual U's of rackspace not in-use</span></center>";
              ?>
            </div>
            <div class="col-md-4">
              <?php
              echo "<center><h2>".rackspace_used_rack($rackid)."U</h2></center>";
              echo "<center><h4>Rackspace used</h4></center>";
              echo "<center><span class='text-muted'>Individual U's of rackspace in-use</span></center>";
              ?>
            </div>
            <div class="col-md-4">
              <?php
              echo "<center><h2>".rackspace_device_count_rack($rackid)."</h2></center>";
              echo "<center><h4>Device count</h4></center>";
              echo "<center><span class='text-muted'>Individual number of devices in this rack</span></center>";
              ?>
            </div>
          </div>
          <hr>
          <ul id="tabs" class="nav nav-pills nav-justified" data-tabs="tabs">
            <li class="active"><a href="#overview" data-toggle="tab"><i class="fa fa-television"></i> Overview</a></li>
            <li><a href="#servers" data-toggle="tab"><i class="fa fa-server"></i> Servers</a></li>
            <li><a href="#network" data-toggle="tab"><i class="fa fa-exchange"></i> Network</a></li>
            <li><a href="#power_management" data-toggle="tab"><i class="fa fa-battery-full"></i> Power Management</a></li>
            <li><a href="#inventory" data-toggle="tab"><i class="fa fa-archive"></i> Inventory</a></li>
          </ul>
          <hr>
          <div id="my-tab-content" class="tab-content">
              <div class="tab-pane active" id="overview">
                  <h3>Overview</h3>
                  <?php 
                  if(rack_power_feed_count($rackid)==0) {
                    alert_warning("No power feeds found, You'll need to add in a power feed first from the <b>Power Management</b> tab.");
                  } 
                  ?>
              </div>
              <div class="tab-pane" id="servers">
                  <h3>Servers</h3>
                  <hr>
                  <?php include 'views/rackspace/servers/servers.php'; ?>
              </div>
              <div class="tab-pane" id="network">
                  <h3>Network</h3>
                  <hr>
                  <?php 
                  include 'views/rackspace/networking/networking.php'; 
                  ?>
              </div>
              <div class="tab-pane" id="power_management">
                  <h3>
                    Power Management 
                    <div class="pull-right">
                      <button class="btn btn-primary" href='add_feed.php?rackid=<?php echo $rackid; ?>' data-remote='false' data-toggle='ajaxModal' data-target='#myModal'>
                        <img src='assets/img/add.png'> Add Feed
                      </button>
                    </div>
                  </h3>
                  <hr>
                  <?php include 'power_management.php'; ?>
                  
              </div>
              <div class="tab-pane" id="inventory">
                  <ul id="tabs" class="nav nav-pills nav-justified" data-tabs="tabs">
                    <li><a href="#hdd" data-toggle="tab"><i class="fa fa-hdd-o"></i> HDDs</a></li>
                    <li><a href="#cables" data-toggle="tab"><i class="fa fa-random"></i> Cables</a></li>
                    <li><a href="#networking_gear" data-toggle="tab"><i class="fa fa-arrows"></i> Networking Gear</a></li>
                    <li><a href="#pdu" data-toggle="tab"><i class="fa fa-plug"></i> PDUs</a></li>
                    <li><a href="#other" data-toggle="tab"><i class="fa fa-question"></i> Other</a></li>
                  </ul>
                  <hr>
                  <div id="my-tab-content" class="tab-content">
                      <div class="tab-pane" id="hdd">
                          <h3>HDDs</h3>
                          <hr>
                          <?php include 'inventory/hdds.php'; ?>

                      </div>
                      <div class="tab-pane" id="cables">
                          <h3>Cables</h3>
                          <hr>
                          
                      </div>
                      <div class="tab-pane" id="networking_gear">
                          <h3>Networking Gear</h3>
                          <hr>
                          <?php include 'inventory/networking.php'; ?>
                      </div>
                      <div class="tab-pane" id="pdu">
                          <h3>PDUs</h3>
                          <hr>
                          
                      </div>
                      <div class="tab-pane" id="other">
                          <h3>Other</h3>
                          <hr>
                          
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