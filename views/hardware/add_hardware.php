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
          <h1 class="page-header">Add Hardware</h1>
          <span class="text-muted">New Hardware can be added into DCIMStack using the form below.</span>
          <?php include 'libraries/alerts.php'; ?>
          <hr>
          <form method="post" action="add_rackspace_db.php" class="form-horizontal">
            <div class="form-group">
              <label for="rack_name" class="col-sm-2 control-label">Identifiers</label>
              <div class="col-sm-10">
                <input type="text" name="rack_name" class="form-control" placeholder="Physical label/Serial number/Generic name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="rack_size" class="col-sm-2 control-label">Type</label>
              <div class="col-sm-10">
                <select class="form-control" name="rack_size">
                  <option value='HDD/SATA'>HDD/SATA</option>
                  <option value='HDD/SSD'>HDD/SSD</option>
                  <option value='RAM/1 GB'>RAM/1 GB</option>
                  <option value='RAM/2 GB'>RAM/2 GB</option>
                  <option value='RAM/4 GB'>RAM/4 GB</option>
                  <option value='RAM/8 GB'>RAM/8 GB</option>
                  <option value='RAM/16 GB'>RAM/16 GB</option>
                  <option value='RAM/32 GB'>RAM/32 GB</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="rack_city" class="col-sm-2 control-label">Location</label>
              <div class="col-sm-10">
                <input type="text" name="rack_city" class="form-control" placeholder="Where can this be found?" required>
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
                <center><button type="submit" class="btn btn-primary">Add Hardware</button></center>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
        
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
  </body>
</html>