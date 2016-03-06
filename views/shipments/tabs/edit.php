<br>
<form action="update_shipment_db.php" id="edit_shipment" method="post">
	<input type="hidden" name="shipment_id" form="edit_shipment" class="form-control" value="<?php echo $shipment_id; ?>" required>
	<label>Shipment Tracking ID</label>
	<input type="text" name="shipment_tracking_id" form="edit_shipment" class="form-control" value="<?php echo $shipment_tracking_id; ?>" required>
	<label>Delivery Status</label>
	<select class="form-control" form="edit_shipment" name="shipment_status">
		<option value="<?php echo $shipment_status; ?>"><?php echo $shipment_status; ?></option>
		<option value="Waiting For Dispatch">Waiting For Dispatch</option>
		<option value="Dispatched">Dispatched</option>
		<option value="In-Transit">In-Transit</option>
		<option value="Out For Delivery">Out For Delivery</option>
		<option value="Delivered">Delivered</option>
	</select>
	<label>Delivery ETA</label>
    <input type="date" class="form-control" form="edit_shipment" value="<?php echo $shipment_delivery_eta; ?>" name="shipment_delivery_eta" required>
	<hr>
	<center><input type="submit" form="edit_shipment" value="Update" class="btn btn-primary"></center>
</form>