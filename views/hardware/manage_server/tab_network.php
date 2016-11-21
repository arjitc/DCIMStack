<br>
<form action="update_device_db.php" id="device_network" method="post">
    <input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
    <label>IP ADDRESS</label>
    <input type="text" class="form-control" value="<?php echo $device_ipaddress; ?>" placeholder="127.0.0.1" name="device_ipaddress">
    <label>IPMI/MGMT IP</label>
    <input type="text" class="form-control" value="<?php echo $device_mgmt_ip; ?>" name="device_mgmt_ip">
    <label>IPMI/MGMT MAC</label>
    <input type="text" class="form-control" value="<?php echo $device_mgmt_mac; ?>" name="device_mgmt_mac">
    <hr>
    <center><input type="submit" form="device_network" class="btn btn-primary"></center>
</form>