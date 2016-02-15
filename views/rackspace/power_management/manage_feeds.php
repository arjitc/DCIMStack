<?php
include 'libraries/general.php';
include 'libraries/power.php';
include 'config/db.php';
$rackid = mysqli_real_escape_string($conn, $_GET['rackid']);
$feedid = mysqli_real_escape_string($conn, $_GET['feedid']);
check_if_rack_exists($rackid);
check_if_feed_exists($feedid);
$_SESSION['referrer'] = "rackspace.php?rackid=$rackid";
$sql = "SELECT * FROM `rackspace` WHERE `rackid`='$rackid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
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
            <h4 class="modal-title">
                <i class="fa fa-plug"></i> Manage power feed - <?php echo power_feed_name($feedid); ?> - <?php echo get_rack_name($rackid); ?>
            </h4>
        </div>
        <div class="modal-body">
            <?php 
            if(rack_feed_count($rackid)!=0) {
            ?>
            <form method="post" id="add_feed_form" action="manage_feeds_db.php" class="form-horizontal">
            <input type="hidden" name="feedid" value='<?php echo $feedid; ?>'>
            <input type="hidden" name="rackid" value='<?php echo $rackid; ?>'>
            <div class="form-group">
                <label for="rack_name" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <select class="form-control" name="feed_type">                                
                        <option value='A'>A</option>
                        <option value='B'>B</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="feed_voltage" class="col-sm-2 control-label">Voltage</label>
                <div class="col-sm-10">
                    <select class="form-control" name="feed_voltage">                                
                        <option value='120'>120V</option>
                        <option value='240'>240V</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="feed_power" class="col-sm-2 control-label">Power</label>
                <div class="col-sm-10">
                    <select class="form-control" name="feed_power">     
                        <?php
                        for($i=1; $i<=40; $i++) {
                            echo "<option value='$i'>".$i."A</option>";
                        }                          
                        ?>
                    </select>
                </div>
            </div>
            <?php 
            } else {
                echo "<center>No existing power feed found for this rack, you'll need to add in a feed first.</center>";
            }
            ?>
        </div>
        <div class="modal-footer">
            <div class="pull-left">
                <a href="remove_power_feed.php?feed_id=<?php echo $feedid; ?>" class="btn btn-danger confirmation">Remove Feed</a>
            </div>
            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
            <?php 
            if(rack_feed_count($rackid)!=0) {
                echo "<button type='submit' form='add_feed_form' class='btn btn-primary'>Update Feed</button>";
            }
            ?>
        </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>