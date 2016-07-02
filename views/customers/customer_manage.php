<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DCIMStack</title>
	<?php 
	include 'libraries/css.php';
	include 'libraries/general.php'; 
	include 'libraries/db.php';
	$customer_id = mysqli_real_escape_string($conn, $_GET['customer_id']);
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	?>
</head>

<body>

	<?php include 'libraries/header.php'; ?>

	<div class="container">
		<h1 class="page-header">Manage Customer</h1>
		<?php include 'libraries/alerts.php'; ?>
		<?php
		$sql = "SELECT * FROM `customers` WHERE `id`='$customer_id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$customer_name = $row["customer_name"];
				$customer_notes = $row["customer_notes"];
			}
		} else {
			echo "No customers found, <a data-toggle='modal' data-target='#add_customer'>let's add one now.</a>";
		}
		$conn->close();
		?>
		<form action="customer_update.php" id="add_hdds" method="post">
			<label>Customer name</label>
			<input type="text" class="form-control" name="customer_name" value="<?php echo htmlspecialchars($customer_name); ?>" placeholder="Customer Name" required>
			<label>Customer Notes</label>
			<textarea class="form-control" name="customer_notes"><?php echo htmlspecialchars($customer_notes); ?></textarea>
		</form>
		<hr>
		<center><input type="submit" form="add_hdds" class="btn btn-primary"></center>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
</body>
</html>