<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DCIMStack</title>
	<?php
	include 'libraries/css2.php';
	include 'libraries/general.php';
	include 'config/db.php';
	$customer_id = mysqli_real_escape_string($conn, (int)$_GET['customer_id']);
	?>
</head>

<body>

	<?php include 'libraries/header2.php'; ?>

	<div class="container-fluid">
		<h1 class="page-header">Manage Customer</h1>
		<?php include 'libraries/alerts.php'; ?>
		<?php
		$sql = "SELECT * FROM `customers` WHERE `id`='$customer_id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$customer_name  = $row["customer_name"];
				$customer_notes = $row["customer_notes"];
				$customer_link  = $row["customer_link"];
			}
		} else {
			echo "Customer not found, <a data-toggle='modal' data-target='#add_customer'>add one now?</a>";
			exit();
		}
		$conn->close();
		?>
		<ul id	="mytabs" class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="information-tab" href="#information" data-toggle="tab" role="tab"  aria-controls="information" aria-selected="true"> <img src="assets/img/information.png"> Information</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="delete-tab" href="#delete" data-toggle="tab" role="tab" aria-controls="delete" aria-selected="false"> <img src="assets/img/delete.png"> Delete</a>
			</li>
		</ul>
		<div id="my-tab-content" class="tab-content">
			<div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
				<br>
				<form action="customer_update.php" method="post">
					<label>Customer name</label>
					<input type="text" class="form-control" name="customer_name" value="<?php echo htmlspecialchars($customer_name); ?>" placeholder="Customer Name" required>
					<label>Customer Notes</label>
					<textarea class="form-control" name="customer_notes"><?php echo htmlspecialchars($customer_notes); ?></textarea>
					<label>Customer Link</label>
					<input class="form-control" name="customer_link" value=<?php echo htmlspecialchars($customer_link); ?>>
					<input type="hidden" value="<?php echo htmlspecialchars($customer_id); ?>" name="customer_id" />
					<hr>
					<center><input type="submit" class="btn btn-primary"></center>
				</form>
			</div>
			<div class="tab-pane fade" id="delete" role="tabpanel" aria-labelledby="delete-tab">
				<br>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">	Delete Customer</h5>
						<div class="alert alert-danger alert-justified" role="alert">
							This action will delete the client <b><?php echo htmlspecialchars($customer_name); ?> </b> from DCIMStack, This cannot be reversed.
						</div>

						<p><a href="delete_customer.php?customer_id=<?php echo $customer_id; ?>" class="btn btn-danger confirmation">Delete Customer</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

    <!-- Bootstrap core JavaScript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<?php include 'libraries/js2.php'; ?>
    </body>
    </html>
