<?php include_once 'general.php'; ?>
<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <?php 
    if(get_filename_from_url()=="index.php") {
      echo "<li class='active'><a href='#'>Overview</a></li>";
    } else {
      echo "<li><a href='index.php'>Overview</a></li>";
    }
    ?>
  </ul>
  <ul class="nav nav-sidebar">
    <li class="dropdown-header">Rackspace</li>
    <?php 
    if(get_filename_from_url()=="manage_rackspace.php") {
      echo "<li class='active'><a href='manage_rackspace.php'>Manage Rackspace</a></li>";
    } else {
      echo "<li><a href='manage_rackspace.php'>Manage Rackspace</a></li>";
    }
    if(get_filename_from_url()=="add_rackspace.php") {
      echo "<li class='active'><a href='add_rackspace.php'>Add Rackspace</a></li>";
    } else {
      echo "<li><a href='add_rackspace.php'>Add Rackspace</a></li>";
    }
    ?>
    <hr>
    <li class="dropdown-header">Hardware</li>
    <li><a href="">Manage Hardware</a></li>
    <li><a href="">Add Hardware</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li><a href="">Nav item again</a></li>
    <li><a href="">One more nav</a></li>
    <li><a href="">Another nav item</a></li>
  </ul>
</div>