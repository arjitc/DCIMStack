<br>
<form action="update_shipment_db.php" id="edit_notes" method="post">
	<input type="hidden" name="shipment_id" form="edit_notes" class="form-control" value="<?php echo $shipment_id; ?>" required>
	<label>Notes</label>
	<textarea name="shipment_notes" form="edit_notes" class="form-control" required><?php echo $shipment_notes; ?></textarea>
	<hr>
	<center><input type="submit" form="edit_notes" value="Update" class="btn btn-primary"></center>
</form>