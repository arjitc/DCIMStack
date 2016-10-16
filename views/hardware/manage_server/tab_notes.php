<br>
<form action="update_device_db.php" id="device_notes_form" method="post">
    <input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
    <textarea name="device_notes" rows="10" class="form-control"><?php echo $device_notes; ?></textarea>
    <hr>
    <center><input type="submit" form="device_notes_form" class="btn btn-primary"></center>
</form>