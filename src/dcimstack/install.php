<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DCIMStack Installer</title>
    <?php
    include 'config/db.php';
    include 'libraries/css.php';
    ?>

  </head>

  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="https://github.com/arjitc/DCIMStack/">Github</a></li>
            <li role="presentation"><a href="https://github.com/arjitc/DCIMStack/issues">Report issue</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">DCIMStack Installer</h3>
      </div>
      <hr>
      <div class="alert alert-warning" role="alert">
        <b>Important!</b>
        <ul>
          <li> Import dcimstack.sql from the SQL folder into your mySQL DB
          <li> Update config/db.php with the correct DB user, password and name
          <li> Setup the include path in config/db.php as well
          <li> Username has to be alphanumeric only!
        </ul>
      </div>
      <div class="alert alert-danger" role="alert">
        <center><b>Important! DELETE install.php (this file) once you've installed with this form!</b></center>
      </div>
      <?php
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email    = mysqli_real_escape_string($conn, $_POST['email']);
        if (ctype_alnum($username) && isset($password, $username) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $password = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`) VALUES (NULL, '$username', '$password', '$email');";
          if ($conn->query($sql) === TRUE) {
            ?>
            <div class="alert alert-success" role="alert">
              <center><b>New user created successfully</b></center>
            </div>
            <?php
          } else {
            ?>
            <div class="alert alert-danger" role="alert">
              <center><b><?php echo $conn->error; ?></b></center>
            </div>
            <?php
          }
        }
      ?>

      <form action="install.php" method="post">
        <input type="text" name="username" class="form-control" placeholder="Username" required><br>
        <input type="password" name="password" class="form-control" placeholder="Password" required><br>
        <input type="email" name="email" class="form-control" placeholder="Email Address" required><br>
        <center><input type="submit" value="Install" class="btn btn-primary btn-lg"></center>
      </form>


      <footer class="footer">
        <p>2016 DCIMStack</p>
      </footer>

    </div> <!-- /container -->
  </body>
</html>
