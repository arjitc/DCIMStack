<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DCIMStack</title>
  <?php 
  include 'libraries/css.php'; 
  include_once 'libraries/events.php';
  ?>
</head>

<body>

  <?php include 'libraries/header.php'; ?>
  <div class="container">
    <h1 class="page-header">Events</h1>

    <?php list_events_table(0); //from libraries/events.php ?>
    
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
  </body>
  </html>