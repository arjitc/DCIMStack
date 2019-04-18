<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="index.php">DCIMStack</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src='assets/img/application_view_columns.png'> Dashboard
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php"><img src='assets/img/application_view_columns.png'> Dashboard</a>
          <a class="dropdown-item" href="events.php"><img src='assets/img/application_side_list.png'> Events</a>
        </div>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src='assets/img/building.png'> Rackspace
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="manage_rackspace.php"><img src='assets/img/building_go.png'> Manage Rackspace</a></a>
          <a class="dropdown-item" href="add_rackspace.php"><img src='assets/img/building_add.png'> Add Rackspace</a>
        </div>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src='assets/img/keyboard.png'> Hardware
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="servers.php"><img src='assets/img/computer_go.png'> Servers</a>
          <a class="dropdown-item" href="raidcards.php"><img src='assets/img/server_database.png'> Raid Cards</a>
          <a class="dropdown-item" href="disks.php"><img src='assets/img/drive_go.png'> Disks</a>
          <a class="dropdown-item" href="ram.php"><img src='assets/img/tab_go.png'> RAM</a>
          <a class="dropdown-item" href="network.php"><img src='assets/img/chart_curve_go.png'> Network</a>
          <a class="dropdown-item" href=""><img src='assets/img/lightning_go.png'> PDUs</a>
          <a class="dropdown-item" href="cpus.php"><img src='assets/img/computer_go.png'> CPUs</a>
          <a class="dropdown-item" href="other.php"><img src='assets/img/box.png'> Other</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="shipments.php"><img src='assets/img/lorry.png'> Shipments</a>
        </div>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src='assets/img/server_connect.png'> BIPM
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="bipm.php"><img src='assets/img/server_connect.png'> Basic IP Manager</a>
        </div>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src='assets/img/user_suit.png'> Customers
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="customers.php"><img src='assets/img/user_suit.png'> Manage Customers</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input type='text' name='searchwhat' class='form-control' placeholder='Search...'><div style="padding-right: 5px;"></div>
      <select class='form-control' name='search'>
        <option value='device_ipaddress'>IP</option>
        <option value='device_mac'>MAC</option>
      </select><div style="padding-right: 5px;"></div>
      <input class="btn btn-outline-light my-2 my-sm-0" type='submit'>
    </form>
    <ul class="navbar-nav my-lg-0">
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome back, <?php echo $_SESSION['user_name']; ?></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
          <a class="dropdown-item"  href="index.php"><img src='assets/img/application_view_columns.png'> Dashboard</a>
          <a class="dropdown-item" href="settings.php"><img src='assets/img/cog.png'> DCIMStack Settings</a>
          <a class="dropdown-item" href="account.php"><img src='assets/img/user_edit.png'> Account Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="about.php"><img src='assets/img/information.png'> About</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?logout"><img src='assets/img/door_out.png'> Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<style>
  body {
    padding-top: 70px;
  }
</style>
