<br>
<form action="add_device_db.php" id="add_hdds" method="post">
	<label>Server Size</label>
	<select class="form-control" name="device_size">
		<option value="1U">1U</option>
		<option value="2U">2U</option>
		<option value="3U">3U</option>
		<option value="4U">4U</option>
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
			echo "<option value='$rackid'>".get_rack_name($rackid)."</option>";
		}
		echo "</select>";
	} else {
		echo "0 results";
	}
	?>
</form>