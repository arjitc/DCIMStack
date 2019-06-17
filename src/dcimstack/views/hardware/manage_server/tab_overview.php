<br>
<div class="row">
<!--  <div class="col-md-8">
  	<div class="panel panel-default">
	  <div class="panel-heading">-->
    <div class="col">
    <div class="card">
      <div class="card-header">
        Server Information
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Node Name: <?php echo $device_label; ?></li>
        <li class="list-group-item">Server Hosting Name: <?php echo $device_hostingname; ?></li>
        <li class="list-group-item">Server Brand:  <?php echo $device_brand; ?></li>
        <li class="list-group-item">Server Rack: <?php echo get_rack_name_from_device_id($device_id); ?></li>
        <li class="list-group-item">Server Size: <?php echo $device_size; ?>U </li>
        <li class="list-group-item">Server CPU/RAM: <?php echo $device_cpu; ?> / <?php echo $device_ram_total; ?></li>
      </ul>
    </div>
	</div>


  <!--<div class="col-md-4">
  	<div class="panel panel-default">
	  <div class="panel-heading">-->
    <div class="col">
    <div class="card">
      <div class="card-header">
	    Server Customer
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
	    <?php
	    if(!empty(get_customer_name_from_id($device_customer))) {
			echo get_customer_name_from_id($device_customer);
		} else {
			echo "None Assigned";
		}
	    ?>
    </li>
  </ul>
  </div>
</div>

<div class="col">
<div class="card">
  <div class="card-header">
    Server Notes
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
  	    <?php echo $device_notes; ?>
      </li>
    </ul>
  </div>
</div>
</div>
