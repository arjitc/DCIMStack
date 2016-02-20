<br>
<form action="update_device_db.php" id="ipmi_mgmt" method="post">
    <input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
    <label>IPMI/MGMT IP</label>
    <input type="text" class="form-control" value="<?php echo $device_mgmt_ip; ?>" name="device_mgmt_ip">
    <label>IPMI/MGMT MAC</label>
    <input type="text" class="form-control" value="<?php echo $device_mgmt_mac; ?>" name="device_mgmt_mac">
    <hr>
    <center><input type="submit" form="ipmi_mgmt" class="btn btn-primary"></center>
</form>