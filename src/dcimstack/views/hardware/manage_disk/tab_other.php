<br>
<form action="update_device_db.php" id="device_failed_form" method="post">
	<input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
	<label>Other</label>
	<small><i>Details and notes on this item</i></small><br>

	<?php
	if($device_failed == 'NO') {
	} else {
		echo "<div class='alert alert-info' role='alert'>Device has been marked as failed.</div>";
		echo "Date Sent $device_failed_date";
	}
	?>
	<label>Set device to failed?</label>
	<select name="device_failed" class="form-control">
		<option value="YES">Yes</option>
		<option value="NO">No</option>
	</select> 

	<label>Is the device in use?</label>
	<select name="device_inuse" class="form-control">
		<option value="1">Yes</option>
		<option value="0">No</option>
	</select> 

	<label>Add notes to device.</label>
	<input type="text" class="form-control" name="device_notes" value="<?php echo $device_notes; ?>">
	<?
	if ($device_failed_date == '0000-00-00 00:00:00') {
		$device_failed_date = NOW();
	} else {
		$device_failed_date == '';
	?>
	<hr>
	<center><input type="submit" form="device_failed_form" value="Update" class="btn btn-primary"></center>
</form>