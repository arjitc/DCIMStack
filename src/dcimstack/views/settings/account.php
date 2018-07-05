<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DCIMStack</title>
    <?php
    include 'libraries/css.php';
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
    ?>
  </head>

  <body>

    <?php include 'libraries/header.php'; ?>

    <div class="container">
          <h1 class="page-header">Account Settings</h1>
          <?php include 'libraries/alerts.php'; ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><img src="assets/img/lock_edit.png"> Change Password</h3>
            </div>
            <div class="panel-body">
              <form action="change_password_db.php" id="change_password" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <input type="password" name="password1" placeholder="New password" class="form-control" required>
                <div style="padding-bottom: 5px;"></div>
                <input type="password" name="password2" placeholder="New password once again"  class="form-control" required>
            </div>
            <div class="panel-footer">
              <center><input type="submit" form="change_password" value="Update" class="btn btn-primary"></center>
            </div>
            </form>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><img src="assets/img/email_edit.png"> Change EMail ID</h3>
            </div>
            <div class="panel-body">
              <p> Current email ID: <?php echo $_SESSION['user_email']; ?> </p>
              <form action="change_email_db.php" id="change_email" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <input type="email" name="email1" placeholder="new@email.id" class="form-control" required>
                <div style="padding-bottom: 5px;"></div>
                <input type="email" name="email2" placeholder="new@email.id"  class="form-control" required>
            </div>
            <div class="panel-footer">
              <center><input type="submit" form="change_email" value="Update" class="btn btn-primary"></center>
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
