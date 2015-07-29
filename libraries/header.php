<nav class="navbar navbar-inverse navbar-fixed-top">
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
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome back, <?php echo $_SESSION['user_name']; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php"><i class="fa fa-television"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="index.php?logout"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </li>
            <li><a></a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>