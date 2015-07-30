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
          <h1 class="page-header">Manage Rackspace</h1>

          <?php
          $sql = "SELECT * FROM `rackspace`";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              echo "<table class='table table-striped'><tr><th>Rack Name</th><th>Rack Size</th><th>Rack Location</th><th>Manage</th></tr>";
              while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                echo "<tr><td>".$row["rack_name"]."</td><td>".$row["rack_size"]."U</td><td>".$row["rack_city"] .", ". $row["rack_country"]."</td><td>
                <div class='btn-group'>
                  <a href='rackspace.php?id=$id' class='btn btn-primary' role='button'>Manage</a>
                  <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <span class='caret'></span>
                    <span class='sr-only'>Toggle Dropdown</span>
                  </button>
                  <ul class='dropdown-menu'>
                    <li><a href='#'><i class='fa fa-wrench'></i> Modify</a></li>
                    <li role='separator' class='divider'></li>
                    <li><a href='#'><i class='fa fa-trash-o'></i> Delete</a></li>
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