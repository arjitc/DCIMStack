<br>
<form action="update_device_db.php" id="server_information_form" method="post">
	<input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
	<label>Node Name</label>
    <input type="text" class="form-control" value="<?php echo $device_label; ?>" name="device_label">
	<label>Device Hosting Name</label>
    <input type="text" class="form-control" value="<?php echo $device_hostingname; ?>" name="device_hostingname">
	<label>Server Size</label>
	<select class="form-control" name="device_size">
		<?php
		echo "<option value='$device_size'>".$device_size."U</option>";
		for($i=1; $i<=4; $i++) {
			if($i != $device_size) {
				echo "<option value='$i'>".$i."U</option>";
			}
		}
		?>
	</select>
	<label>Server Vendor</label>
	<select class="form-control" name="device_brand">
		<option value="<?php echo $device_brand; ?>"><?php echo $device_brand; ?></option>
		<option value="HP">HP</option>
		<option value="Dell">Dell</option>
		<option value="Supermicro">Supermicro</option>
		<option value="IBM">IBM</option>
	</select>
	<label>Device Location</label>
	<?php
	include 'config/db.php';
	$sql = "SELECT * FROM `rackspace`";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<select class='form-control' name='device_location'>";
						// output data of each row
		while ($row = $result->fetch_assoc()) {
			$rackid = $row["rackid"];
			
 			if ($rackid == $device_rack) {
				$selected = "selected";
			} else {
				$selected = '';
			}
 
			echo "<option value='$rackid' $selected>".get_rack_name($rackid)."</option>";
		}
		echo "</select>";
	} else {
		echo "No rackspace found. You'll need to <a href='add_rackspace.php'>add some first</a>.";
	}

	?>
	<label>Device Serial</label>
    <input type="text" class="form-control" value="<?php echo $device_serial; ?>" name="device_serial">
	<label>Device MAC Address</label>
    <input type="text" class="form-control" value="<?php echo $device_mac; ?>" name="device_mac">

    <?php
	
	if ($server_announce == 'yes') {
		$valueyes = "value='yes' selected";
	} ELSE {
		$valueyes = "value='yes'";
	}

	if ($server_announce == 'no') {
		$valueno = "value='no' selected";
	} ELSE {
		$valueno = "value='no'";
	}
	echo"<label>Announce to Channel?</label>";
        echo "<select class='form-control' name='server_announce'>";
        echo "<option $valueyes>Yes</option>";
        echo "<option $valueno>No</option>";
        echo "</select>";

    ?>

	<hr>
	<center><input type="submit" form="server_information_form" class="btn btn-primary"></center>
</form>