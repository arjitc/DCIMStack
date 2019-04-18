<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DCIMStack</title>
  <?php
  include 'libraries/css2.php';
  $token = md5(uniqid(rand(), TRUE));
  $_SESSION['token'] = $token;
  ?>
</head>

<body>

  <?php include 'libraries/header2.php'; ?>

  <div class="container">
    <h1 class="display-4">Account Settings</h1>
    <?php include 'libraries/alerts.php'; ?>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Change Password</h5>
        <form action="change_password_db.php" id="change_password" method="post">
          <input type="hidden" name="token" value="<?php echo $token; ?>">
          <input type="password" name="password1" placeholder="New password" class="form-control" required>
          <div style="padding-bottom: 5px;"></div>
          <input type="password" name="password2" placeholder="New password once again"  class="form-control" required>
          <div style="padding-bottom: 5px;"></div>
          <center><input type="submit" form="change_password" value="Update" class="btn btn-primary"></center>
        </form>
      </div>
    </div>
    <hr>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Change EMail ID</h5>
        <p> Current email ID: <?php echo $_SESSION['user_email']; ?> </p>
        <form action="change_email_db.php" id="change_email" method="post">
          <input type="hidden" name="token" value="<?php echo $token; ?>">
          <input type="email" name="email1" placeholder="new@email.id" class="form-control" required>
          <div style="padding-bottom: 5px;"></div>
          <input type="email" name="email2" placeholder="new@email.id"  class="form-control" required>
          <div style="padding-bottom: 5px;"></div>
          <center><input type="submit" form="change_email" value="Update" class="btn btn-primary"></center>
        </form>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <?php include 'libraries/js2.php'; ?>
    </body>
    </html>
