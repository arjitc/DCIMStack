<?php
include_once 'libraries/general.php';
include_once 'config/db.php';
//error_reporting(-1);
//ini_set('display_errors', 'On');
check_if_rack_exists($_GET['id']); //this checks if the rack exists, if the rack does not exist it redirects the user back to index.php
?>

<div class="row">
  <div class="col-md-4">
  	<h4>Current feeds</h4>
  </div>
  <div class="col-md-4">
  	<h4>Current feeds</h4>
  </div>
  <div class="col-md-4">
  	<h4>Current feeds</h4>
  </div>
</div>