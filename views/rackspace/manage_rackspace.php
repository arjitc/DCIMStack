<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DCIMStack</title>
    <?php 
    include 'libraries/css.php';
    include 'libraries/power.php';
    include_once 'libraries/rackspace.php';
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
    ?>
  </head>

  <body>

    <?php include 'libraries/header.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'libraries/sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Manage Rackspace</h1>
          <p>Rackspace added into DCIMStack can be managed from below </p>
          <hr>
          <?php include 'libraries/alerts.php'; ?>
          <?php
          $sql = "SELECT * FROM `rackspace`";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              echo "<table class='table table-striped'>
              <thead>
                <tr>
                  <th>Rack Name</th>
                  <th>Used / Size</th>
                  <th>Location</th>
                  <th>Power</th>
                  <th>Manage</th>
                </tr>
              </thead>";
              while($row = $result->fetch_assoc()) {
                $rackid         = $row["rackid"];
                $rack_name      = $row["rack_name"];
                $rack_size      = $row["rack_size"]."U";
                $rack_size_used = rackspace_used_rack($rackid)."U";
                $rack_city      = $row["rack_city"];
                $rack_country   = $row["rack_country"];
                $rack_voltage   = rack_voltage($rackid)==0?"0V":rack_voltage($rackid)."V";
                $rack_power     = rack_power_total($rackid)==0?"0A":rack_power_total($rackid)."A";
                echo "<tr><td>$rack_name</td><td>$rack_size_used / $rack_size</td><td>$rack_city,$rack_country</td><td>$rack_power/$rack_voltage</td><td>
                <div class='btn-group'>
                  <a href='rackspace.php?rackid=$rackid' class='btn btn-primary' role='button'>Manage</a>
                  <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <span class='caret'></span>
                    <span class='sr-only'>Toggle Dropdown</span>
                  </button>
                  <ul class='dropdown-menu'>
                    <li><a href='modify_rackspace.php?rackid=$rackid' data-remote='false' data-toggle='ajaxModal' data-target='#myModal'><i class='fa fa-wrench'></i> Modify</a></li>
                    <li role='separator' class='divider'></li>
                    <li><a href='delete_rackspace.php?rackid=$rackid&token=$token' class='confirmation'><i class='fa fa-trash-o'></i> Delete</a></li>
                  </ul>
                </div>
              </td></tr>";
              }
          } else {
              echo "No Rackspace found. You may need to <a href='add_rackspace.php'>add it into DCIMStack first</a>.";
          }
          ?>
        </div>
      </div>
    </div>
        
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
  </body>
</html>