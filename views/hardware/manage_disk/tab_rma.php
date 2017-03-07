<br>
<form action="update_device_db.php" id="device_rma_form" method="post">
	<input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
	<label>RMA</label>
	<small><i>details and notes on this item</i></small><br>

	<?php
	if($device_rma == 'NO') {
		echo "<div class='alert alert-success' role='alert'>This is device is not out for RMA</div>";
	} else {
		echo "<div class='alert alert-info' role='alert'>Device marked as been RMA'd</div>";
		echo "Date Sent $device_rma_date";
	}
	?>
	<label>Set device for RMA?</label>
	<select name="device_rma" class="form-control">
		<option value="YES">Yes</option>
		<option value="NO">No</option>
	</select> 

	<label>Add notes to RMA?</label>
	<input type="text" class="form-control" name="device_rma_notes" value="<?php echo $device_rma_notes; ?>">
	<?
	if ($device_rma_date == '0000-00-00 00:00:00') {
		$device_rma_date = NOW();
	} else {
		$device_rma_date == '';
	?>
	<hr>
	<center><input type="submit" form="device_rma_form" value="Update" class="btn btn-primary"></center>
</form>