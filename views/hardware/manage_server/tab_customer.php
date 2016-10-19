<br>
<form action="update_device_db.php" id="customer_form" method="post">
<input type="hidden" class="form-control" name="device_id" value="<?php echo $device_id; ?>">
<label>Device Customer</label>
<?php
if($device_customer!=0) {
	echo "<div class='alert alert-info' role='alert'>A customer has been already assigned to this machine";
	echo "<p>Customer Name: ". get_customer_name_from_id($device_customer) ."</p>";
	echo "</div>";
}
?>
<label>Assign/Reassign Customer</label>
<?php
include 'config/db.php';
$sql = "SELECT * FROM `customers`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<select class='form-control' name='device_customer'>";
	// output data of each row
	if(!empty(get_customer_name_from_id($device_customer))) {
		echo "<option value='$device_customer'>".get_customer_name_from_id($device_customer)."</option>";
	}
	while ($row = $result->fetch_assoc()) {
		$customer_id = $row["id"];
		if($customer_id!=$device_customer) {
			echo "<option value='$customer_id'>".$row["customer_name"]."</option>";
		}
	}
	echo "</select>";
} else {
	echo "0 results";
}
?>
<br>
<center><input type="submit" form="customer_form" class="btn btn-primary"></center>
</form>