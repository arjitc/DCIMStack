<br>
<?php
if(check_if_shipment_in_db($shipment_tracking_id)==1) {
    echo "<td><center><div class='alert alert-danger' role='alert'><strong>Warning</strong> This shipment already exists in the database!</div></center></td>";
}
?>
<form action="add_device_db.php" id="move" method="post">
    <input type="hidden" name="device_tracking_id" value="<?php echo $shipment_tracking_id; ?>">
	<label>Physical Label</label>
	<input type="text" name="device_label" class="form-control" placeholder="My New Server!" required>
    <label>Device Type</label>
    	<select name="device_type" class="form-control">
        	<option value="Server">Server</option>
            <option value="HDD">HDD</option>
            <option value="RAM">RAM</option>
            <option value="Network">Network</option>
            <option value="PDU">PDU</option>
            <option value="CPU">CPU</option>
            <option value="Other">Other</option>
        </select>
    <hr>
    <center><input type="submit" form="move" value="Move" class="btn btn-primary"></center>
</form>