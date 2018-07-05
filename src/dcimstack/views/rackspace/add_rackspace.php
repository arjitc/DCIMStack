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

    <div class="container">
          <h1 class="page-header">Add Rackspace</h1>
          <span class="text-muted">New Rackspace can be added into DCIMStack using the form below.</span>
          <?php include 'libraries/alerts.php'; ?>
          <hr>
          <form method="post" action="add_rackspace_db.php" class="form-horizontal">
            <div class="form-group">
              <label for="rack_name" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="rack_name" class="form-control" placeholder="Let's name your rack" required>
              </div>
            </div>
            <div class="form-group">
              <label for="rack_size" class="col-sm-2 control-label">Rack Size</label>
              <div class="col-sm-10">
                <select class="form-control" name="rack_size">
                  <?php
                  for ($i = 1; $i <= 48; $i++) {
                    echo "<option value='$i'>".$i."U</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="rack_city" class="col-sm-2 control-label">City</label>
              <div class="col-sm-10">
                <input type="text" name="rack_city" class="form-control" placeholder="Which City is your rack in?" required>
              </div>
            </div>
            <div class="form-group">
              <label for="rack_country" class="col-sm-2 control-label">Country</label>
              <div class="col-sm-10">
                <input type="text" name="rack_country" class="form-control" placeholder="Which Country is your rack in?" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <hr>
                <center><button type="submit" class="btn btn-primary">Add Rack</button></center>
              </div>
            </div>
          </form>
        </div>
        
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
  </body>
</html>