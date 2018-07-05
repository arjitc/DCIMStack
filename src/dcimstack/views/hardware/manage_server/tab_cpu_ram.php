<br>
<form action="update_device_db.php" id="cpu_ram_update" method="post">
    <input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
    <label>Server CPU</label>
    <input type="text" class="form-control" value="<?php echo $device_cpu; ?>" name="device_cpu">
    <label>CPU Count</label>
    <select class="form-control" name="device_cpu_count">
        <?php
        echo "<option value='$device_cpu_count'>$device_cpu_count</option>";
        for($i=1; $i<=4; $i++) {
            if($i!=$device_cpu_count) {
                echo "<option value='$i'>$i</option>";
            }
        }
        ?>
    </select>
    <label>RAM</label>
    <div class="input-group">
        <input type="text" class="form-control" value="<?php echo preg_replace("/[^0-9,.]/", "", $device_ram_total); ?>" name="device_ram_total">
        <div class="input-group-addon">GB</div>
    </div>
    <hr>
    <center><input type="submit" form="cpu_ram_update" class="btn btn-primary"></center>
</form>