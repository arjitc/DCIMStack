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
	?>
</head>

<body>

	<?php include 'libraries/header2.php'; ?>

	<div class="container-fluid">
		<h1 class="page-header">Customers
			<div class='pull-right'>
				<button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_customer">
					<img src='assets/img/add.png'> Add</a>
				</button>
			</div>
		</h1>
		<?php include 'libraries/alerts.php'; ?>
		<?php
		include 'config/db.php';
		$sql = "SELECT * FROM `customers`";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { // output data of each row
			echo "<table class='table' id='search_table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>#</th>";
			echo "<th>Customer Name</th>";
			echo "<th>Customer Notes</th>";
			echo "<th>Customer devices</th>";
			echo "<th>Link to Billing</th>";
			echo "<th><center>Manage</center></th>";
			echo "</tr>";
			echo "</thead>";
			while ($row = $result->fetch_assoc()) {
				$link        = $row['customer_link'];
				$customer_id = $row['id'];
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".htmlspecialchars($row["customer_name"])."</td>";
				echo "<td>".htmlspecialchars($row["customer_notes"])."</td>";
				echo "<td><a href='customer_devices.php?id=$customer_id'>View</a></td>";
				echo "<td><a href='$link' target='_blank'>Goto Link</a></td>";
				echo "<td><center><a href='customer_manage.php?customer_id=$customer_id'>Manage</a></center></td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No customers found, <a data-toggle='modal' data-target='#add_customer'>let's add one now.</a>";
		}
		$conn->close();
		?>
	</div>

	<!-- Add Shipment Modal -->
	<div id="add_customer" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><img src="assets/img/computer_add.png"> Add Customer </h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<form action="add_customer_db.php" id="add_hdds" method="post">
						<label>Customer name</label>
						<input type="text" class="form-control" name="customer_name" placeholder="Customer Name" required>
						<label>Customer Link</label>
						<input class="form-control" name="customer_link">
						<label>Customer Notes</label>
						<textarea class="form-control" name="customer_notes"></textarea>
					</form>
				</div>
				<div class="modal-footer">
					<input type="submit" form="add_hdds" class="btn btn-primary">
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
