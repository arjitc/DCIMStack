<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DCIMStack</title>
  <?php
  include 'libraries/css.php';
  include 'libraries/general.php';
  ?>
</head>

<body>

  <?php include 'libraries/header.php'; ?>

  <div class="container">
    <h1 class="page-header">HDD Stats</h1>
    <?php include 'libraries/alerts.php'; ?>
    <?php
    include 'config/db.php';
    //$sql = "SELECT `device_brand`,COUNT(*) as count FROM `devices` WHERE `device_type` in ('SSD','HDD','SAS') GROUP BY `device_type` ORDER BY count DESC;";
    $sql = "SELECT `device_brand`, count(*) as `count` from `devices` WHERE `device_type` in ('SSD','HDD','SAS') group by `device_brand`";
    //$sql = "SELECT `device_brand`,COUNT(*) as count FROM `devices` ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["device_brand"];
        echo $row["count"];
        echo "<br>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
  </div>
            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <?php include 'libraries/js.php'; ?>
          </body>
          </html>
