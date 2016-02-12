<?php
include 'libraries/general.php';
include 'config/db.php';
$rackid = mysqli_real_escape_string($conn, $_GET['rackid']);
check_if_rack_exists($rackid);
$sql = "SELECT * FROM `rackspace` WHERE `rackid`='$rackid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rackid         = $row["rackid"];
        $rack_name      = $row["rack_name"];
        $rack_size      = $row["rack_size"];
        $rack_size_used = $row["rack_size_used"]."U";
        $rack_city      = $row["rack_city"];
        $rack_country   = $row["rack_country"];
    }
}
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit <?php echo get_rack_name($rackid); ?></h4>
        </div>
        <div class="modal-body">
            <form method="post" id="modify_rack_form" action="modify_rackspace_db.php" class="form-horizontal">
            <input type="hidden" name="rackid" value='<?php echo $rackid; ?>'>
            <div class="form-group">
                <label for="rack_name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="rack_name" class="form-control" value='<?php echo $rack_name; ?>' placeholder="Let's name your rack" required>
                </div>
            </div>
            <div class="form-group">
                <label for="rack_size" class="col-sm-2 control-label">Rack Size</label>
                <div class="col-sm-10">
                    <select class="form-control" name="rack_size">
                        <?php
                            echo "<option value='$rack_size'>".$rack_size."U</option>";
                            for ($i = 1; $i <= 48; $i++) {
                            if ($rack_size != $i) {
                                echo "<option value='$i'>".$i."U</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="rack_city" class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">
                    <input type="text" name="rack_city" class="form-control" value='<?php echo $rack_city; ?>' placeholder="Which City is your rack in?" required>
                </div>
            </div>
            <div class="form-group">
                <label for="rack_country" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                    <input type="text" name="rack_country" class="form-control" value='<?php echo $rack_country; ?>' placeholder="Which Country is your rack in?" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
            <button type="submit" form="modify_rack_form" class="btn btn-primary">Modify Rack</button>
        </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->