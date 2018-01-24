<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><i class="fa fa-database"></i> DCIMStack</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <img src='assets/img/application_view_columns.png'> Dashboard <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">Dashboard/Other</li>
            <li><a href='index.php'><img src='assets/img/application_view_columns.png'> Dashboard</a></li>
            <li><a href='events.php'><img src='assets/img/application_side_list.png'> Events</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <img src='assets/img/building.png'> Rackspace <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Add/Manage Rackspace</li>
              <li><a href='manage_rackspace.php'><img src='assets/img/building_go.png'> Manage Rackspace</a></li>
              <li><a href='add_rackspace.php'><img src='assets/img/building_add.png'> Add Rackspace</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <img src='assets/img/keyboard.png'> Hardware <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Add/Manage Hardware</li>
                <li><a href='servers.php'><img src='assets/img/computer_go.png'> Servers</a></li>
                <li><a href='disks.php'><img src='assets/img/drive_go.png'> Disks</a></li>
                <li><a href='ram.php'><img src='assets/img/tab_go.png'> RAM</a></li>
                <li><a href='network.php'><img src='assets/img/chart_curve_go.png'> Network</a></li>
                <li><a href='ram.php'><img src='assets/img/lightning_go.png'> PDUs</a></li>
                <li><a href='cpus.php'><img src='assets/img/computer_go.png'> CPUs</a></li>
                <li><a href='other.php'><img src='assets/img/box.png'> Other</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Add/Manage Shipments</li>
                <li><a href='shipments.php'><img src='assets/img/lorry.png'> Shipments</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <img src='assets/img/ip.png'> BIPM <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header">Basic IP Manager</li>
                  <li><a href='bipm.php'><img src='assets/img/ip.png'> Basic IP Manager</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <img src='assets/img/user_suit.png'> Customers <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-header">Add/Manage Customers</li>
                    <li><a href='customers.php'><img src='assets/img/user_suit.png'> Manage Customers</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome back, <?php echo $_SESSION['user_name']; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php"><img src='assets/img/application_view_columns.png'> Dashboard</a></li>
                    <li><a href="settings.php"><img src='assets/img/cog.png'> DCIMStack Settings</a></li>
                    <li><a href="account.php"><img src='assets/img/user_edit.png'> Account Settings</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="about.php"><img src='assets/img/information.png'> About</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="index.php?logout"><img src='assets/img/door_out.png'> Logout</a></li>
                  </ul>
                </li>
                <li><a></a></li>
              </ul>
              <form class='navbar-form navbar-right' action='search.php' method='post'>
                <input type='text' name='searchwhat' class='form-control' placeholder='Search...'>
                <select class='form-control' name='search'>
                  <option value='device_ipaddress'>IP</option>
                  <option value='device_mac'>MAC</option>
                </select>
                <input class='form-control' type='submit'>
              </form>
            </div>
          </div>
        </nav>