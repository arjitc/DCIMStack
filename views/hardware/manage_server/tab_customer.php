<br>
<form action="update_device_db.php" id="server_information_form" method="post">
<input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
<label>Device Customer</label>
<?php
include 'config/db.php';
$sql = "SELECT * FROM `customers`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<select class='form-control' name='device_customer'>";
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$customer_id = $row["id"];
		echo "<option value='$customer_id'>".$row["customer_name"]."</option>";
	}
	echo "</select>";
} else {
	echo "0 results";
}
?>
<br>
<center><input type="submit" form="server_information_form" class="btn btn-primary"></center>
</form>