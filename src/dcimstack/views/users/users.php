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
	?>
</head>

<body>

	<?php include 'libraries/header.php'; ?>

	<div class="container">
		<h1 class="page-header">Users
			<div class='pull-right'>
				<button type="button" class='btn btn-primary' data-toggle="modal" data-target="#add_user">
					<img src='assets/img/add.png'> Add</a>
				</button>	
			</div>
		</h1>
		<?php include 'libraries/alerts.php'; ?>
		<?php
		include 'config/db.php';
		$sql = "SELECT * FROM `users`";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
            // output data of each row
			echo "<table class='table' id='search_table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>#</th>";
			echo "<th>User Name</th>";
			echo "<th>User Email</th>";
			echo "<th><center>Manage</center></th>";
			echo "</tr>";
			echo "</thead>";
			while ($row = $result->fetch_assoc()) {
				$user_id = $row['user_id'];
				echo "<tr>";
				echo "<td>".$user_id."</td>";
				echo "<td>".display($row["user_name"])."</td>";
				echo "<td>".display($row["user_email"])."</td>";
				echo "<td><center><a href='userdetails.php?user_id=$user_id'>Manage</a></center></td>";
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
	<div id="add_user" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><img src='assets/img/user_suit.png'> Add User</h4>
				</div>
				<div class="modal-body">
				<form action="add_user_db.php" id="add_hdds" method="post">
					<label>Username</label>
					<input type="text" class="form-control" name="user_name" placeholder="Username" required>
					<label>Users Password</label>
					<input type="password" class="form-control" name="user_password" placeholder="Users Password" required>
					<label>User Email</label>
					<input type="text" class="form-control" name="user_email" placeholder="Users Email" required>
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
    <?php include 'libraries/js.php'; ?>
</body>
</html>
