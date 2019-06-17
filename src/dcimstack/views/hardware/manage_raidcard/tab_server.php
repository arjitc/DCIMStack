<br>
<form action="update_device_db.php" id="device_parent_form" method="post">
    <input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
    <label>Server</label>
    <small><i>Select the server this disk is currently inserted into - if any</i></small>
    <?php
    include 'config/db.php';
    $sql = "SELECT * FROM `devices` WHERE `device_type`='server'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<select class='form-control' name='device_parent'>";
                    // output data of each row
        echo "<option value='$device_parent'>".get_device_label_from_id($device_parent)."</option>";
        echo "<option value='0'>None</option>";
        while ($row = $result->fetch_assoc()) {
            $device_label = $row["device_label"];
            if($row["device_id"]!=$device_parent) {
                echo "<option value=".$row["device_id"].">$device_label</option>";
            }
        }
        echo "</select>";
    } else {
        echo "0 results";
    }
    ?>
    <hr>
    <center><input type="submit" form="device_parent_form" value="Update" class="btn btn-primary"></center>
</form>
<hr>
<div class="card">
  <div class="card-header">
Harddrives on Raid
</div>
<ul class="list-group list-group-flush">
  <li class="list-group-item">
    <?php
    include 'config/db.php';
    $sql = "SELECT * FROM `devices` WHERE `device_type` in ('SSD','HDD','SAS') AND `device_parent` = '$device_parent'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $device_label = $row["device_label"];
            $device_id = $row["device_id"];
            echo "<a href=manage_disk.php?device_id=$device_id>$device_label</a><br>";
        }
        echo "</select>";
    } else {
        echo "0 results";
    }
    ?>
  </li>
</ul>
</div>
