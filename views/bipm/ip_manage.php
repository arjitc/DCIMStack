<?php
include 'config/db.php';
include 'libraries/general.php';
$ip_range_node = mysqli_real_escape_string($conn, $_GET['ip_range_node']);
$sql = "SELECT * FROM `bipm` WHERE `id`='$ip_range_node'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ip_range = $row["ip_range"];
        $ip_address_gateway = $row["ip_address_gateway"];
        $ip_address_subnet = $row["ip_address_subnet"];
        $ip_notes = $row["ip_notes"];
    }
}
?>
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title"><img src='assets/img/ip.png'> Manage IP range - <?php echo $ip_range; ?></h4>
  </div>
  <div class="modal-body">
      <form action="update_ip_node.php" id="edit_ip_node" method="post">
        <input type="hidden" name="ip_range_node" form="edit_ip_node" class="form-control" value="<?php echo $ip_range_node; ?>" required>
        <label>IP Range</label>
        <input type="text" name="ip_range" form="edit_ip_node" class="form-control" value="<?php echo $ip_range; ?>" required>
        <label>Gateway</label>
        <input type="text" name="ip_address_gateway" form="edit_ip_node" class="form-control" value="<?php echo $ip_address_gateway; ?>" required>
        <label>IP Subnet</label>
        <input type="text" name="ip_address_subnet" form="edit_ip_node" class="form-control" value="<?php echo $ip_address_subnet; ?>" required>
        <label>IP Notes</label>
        <textarea class="form-control" name="ip_notes"><?php echo $ip_notes; ?></textarea>
        <hr>
        <center><input type="submit" form="edit_ip_node" value="Update" class="btn btn-primary"></center>
    </form>
</div>
<div class="modal-footer">
  <div class="pull-left">
    <a href="delete_ip_range.php?ip_range_node=<?php echo $ip_range_node; ?>" class="btn btn-danger confirmation">Delete IP Range</a>
</div>
<a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
</div>
</div>
</div>

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>