<br>
<form action="update_device_db.php" id="device_capacity_form" method="post">
    <input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
    <label>Capacity</label>
    <small><i>Disk Capacity can be updated below</i></small>
    <input type="text" class="form-control" name="device_capacity" value="<?php echo $device_capacity; ?>">
    <hr>
    <center><input type="submit" form="device_capacity_form" value="Update" class="btn btn-primary"></center>
</form>