<br>
<div class="row">
  <div class="col-md-8">
  	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Server Information</h3>
	  </div>
	  <div class="panel-body">
	    <p><b>Server Label:</b> <?php echo $device_label; ?></p>
	    <p><b>Server Brand:</b> <?php echo $device_brand; ?></p>
	    <p><b>Server Rack: </b> <?php echo get_rack_name_from_device_id($device_id); ?></p>
	    <p><b>Server Size: </b> <?php echo $device_size; ?> </p>
	    <p><b>Server CPU/RAM:</b> <?php echo $device_cpu; ?> / <?php echo $device_ram_total; ?></p>
	  </div>
	</div>
  </div>
  
  <div class="col-md-4">
  	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Server Customer</h3>
	  </div>
	  <div class="panel-body">
	    <?php 
	    if(!empty(get_customer_name_from_id($device_customer))) {
			echo get_customer_name_from_id($device_customer);
		} else {
			echo "None Assigned";
		}
	    ?>
	  </div>
	</div>
  	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Server Notes</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $device_notes; ?>
	  </div>
	</div>
  </div>
</div>