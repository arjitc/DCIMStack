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
        </div>
      </div>
    </div>
        
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
  </body>
</html>