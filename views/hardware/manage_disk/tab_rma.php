<br>
<form action="update_device_db.php" id="device_rma_form" method="post">
    <input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
    <label>RMA</label>
    <small><i>details and notes on this item</i></small><br>

<?php
if($device_rma == 'NO') {
echo "<font color='green'>This is device is not out for RMA</font>";
} ELSE {
echo "<font color='red'>Device marked as been RMA'd</font>";
echo "<br>";
echo "Date Sent $device_rma_date";
}
?>
    <br>Set device for RMA? 
<select name=device_rma>
  <option value="YES">Yes</option>
  <option value="NO">No</option>
</select> 

<br>
Add notes to RMA?<br>
    <input type="text" class="form-control" name="device_rma_notes" value="<?php echo $device_rma_notes; ?>">
<?
if ($device_rma_date == '0000-00-00 00:00:00') {
$device_rma_date = NOW();
} ELSE {
$device_rma_date == '';
?>
    <hr>
    <center><input type="submit" form="device_rma_form" value="Update" class="btn btn-primary"></center>
</form>