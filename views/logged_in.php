<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DCIMStack</title>
    <?php 
	    include      'libraries/css.php'; 
	    include_once 'libraries/dashboard_stats.php';
	    include_once 'libraries/events.php';
    ?>
  </head>

  <body>

    <?php include 'libraries/header.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'libraries/sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <h3><?php echo rackspace_available(); ?>U</h3>
              <h4>Rackspace available</h4>
              <span class="text-muted">Individual U's of rackspace not in-use</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h3><?php echo rackspace_used(); ?>U</h3>
              <h4>Rackspace used</h4>
              <span class="text-muted">Individual U's of rackspace in-use</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Hardware available</h4>
              <span class="text-muted">Individual hardware not in-use</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Hardware used</h4>
              <span class="text-muted">Individual hardware in-use</span>
            </div>
          </div>

          <h2 class="sub-header">Events</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Type</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Timestamp</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php list_events_table(); //from libraries/events.php ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
  </body>
</html>