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
          <h1 class="page-header">Settings</h1>
          <?php include 'libraries/alerts.php'; ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-key"></i> Change Password</h3>
            </div>
            <div class="panel-body">
              <form action="change_password_db.php" method="post">
                <input type="text" name="password1" placeholder="New password" class="form-control" required>
                <div style="padding-bottom: 5px;"></div>
                <input type="text" name="password2" placeholder="New password once again"  class="form-control" required>
                <hr>
                <center><input type="submit" class="btn btn-primary"></center>
              </form>
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