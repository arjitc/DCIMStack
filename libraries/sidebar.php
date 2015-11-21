<?php include_once 'general.php'; ?>
<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <?php 
    if(get_filename_from_url()=="index.php") {
      echo "<li class='active'><a href='index.php'><img src='assets/img/application_view_columns.png'> Overview</a></li>";
    } else {
      echo "<li><a href='index.php'><img src='assets/img/application_view_columns.png'> Overview</a></li>";
    }
    ?>
  </ul>
  <ul class="nav nav-sidebar">
    <li class="dropdown-header">Rackspace</li>
    <?php 
    if(get_filename_from_url()=="manage_rackspace.php" OR get_filename_from_url()=="rackspace.php") {
      echo "<li class='active'><a href='manage_rackspace.php'><img src='assets/img/building_go.png'> Manage Rackspace</a></li>";
    } else {
      echo "<li><a href='manage_rackspace.php'><img src='assets/img/building_go.png'> Manage Rackspace</a></li>";
    }
    if(get_filename_from_url()=="add_rackspace.php") {
      echo "<li class='active'><a href='add_rackspace.php'><img src='assets/img/building_add.png'> Add Rackspace</a></li>";
    } else {
      echo "<li><a href='add_rackspace.php'><img src='assets/img/building_add.png'> Add Rackspace</a></li>";
    }
    ?>
    <hr>
    <li class="dropdown-header">Manage Hardware</li>
    <?php 
    if(get_filename_from_url()=="hdds.php") {
      echo "<li class='active'><a href='hdds.php'><img src='assets/img/drive_go.png'> HDDs</a></li>";
    } else {
      echo "<li><a href='hdds.php'><img src='assets/img/drive_go.png'> HDDs</a></li>";
    }
    if(get_filename_from_url()=="ram.php") {
      echo "<li class='active'><a href='ram.php'><img src='assets/img/tab_go.png'> RAM</a></li>";
    } else {
      echo "<li><a href='ram.php'><img src='assets/img/tab_go.png'> RAM</a></li>";
    }
    if(get_filename_from_url()=="network.php") {
      echo "<li class='active'><a href='network.php'><img src='assets/img/chart_curve_go.png'> Network</a></li>";
    } else {
      echo "<li><a href='network.php'><img src='assets/img/chart_curve_go.png'> Network</a></li>";
    }
    if(get_filename_from_url()=="pdus.php") {
      echo "<li class='active'><a href='ram.php'><img src='assets/img/lightning_go.png'> PDUs</a></li>";
    } else {
      echo "<li><a href='ram.php'><img src='assets/img/lightning_go.png'> PDUs</a></li>";
    }
    if(get_filename_from_url()=="add_hardware.php") {
      echo "<li class='active'><a href='add_hardware.php'><img src='assets/img/computer_go.png'> CPUs</a></li>";
    } else {
      echo "<li><a href='add_hardware.php'><img src='assets/img/computer_go.png'> CPUs</a></li>";
    }
     if(get_filename_from_url()=="add_hardware.php") {
      echo "<li class='active'><a href='add_hardware.php'><img src='assets/img/package_go.png'> Other</a></li>";
    } else {
      echo "<li><a href='add_hardware.php'><img src='assets/img/package_go.png'> Other</a></li>";
    }
    ?>
  </ul>
  <ul class="nav nav-sidebar">
    <li><a href="shipments.php"><img src='assets/img/lorry.png'> Shipments</a></li>
    <li><a href="">One more nav</a></li>
    <li><a href="">Another nav item</a></li>
  </ul>
</div>