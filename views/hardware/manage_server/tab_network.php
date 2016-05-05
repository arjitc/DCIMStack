<br>
<form action="update_device_db.php" id="device_network" method="post">
    <input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
    <label>IP ADDRESS</label>
    <input type="text" class="form-control" value="<?php echo $device_ipaddress; ?>" name="device_ipaddress">
    <hr>
    <center><input type="submit" form="device_network" class="btn btn-primary"></center>
</form>