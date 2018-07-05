<br>
<form action="update_device_db.php" id="device_rack" method="post">
    <input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
    <label>Rack</label>
    <small><i>Select the rack this disk is currently present in</i></small>
    <?php
    include 'config/db.php';
    $sql = "SELECT * FROM `rackspace`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<select class='form-control' name='device_location'>";
                    // output data of each row
        echo "<option value='$device_rack'>".get_rack_name_from_device_id($device_id)."</option>";
        while ($row = $result->fetch_assoc()) {
            if(get_rack_name_from_device_id($device_id)!=$row["rack_name"]) {
                echo "<option value=".$row["rackid"].">".$row["rack_name"]."</option>";
            }
        }
        echo "<option value='0'>None</option>";
        echo "</select>";
    } else {
        echo "0 results";
    }
    ?>
    <hr>
    <center><input type="submit" form="device_rack" value="Update" class="btn btn-primary"></center>
</form>