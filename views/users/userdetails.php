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
	$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
	?>
</head>

<body>

	<?php include 'libraries/header.php'; ?>

	<div class="container">
		<h1 class="page-header">Manage User</h1>
		<?php include 'libraries/alerts.php'; ?>
		<?php
		$sql = "SELECT * FROM `users` WHERE `user_id`='$user_id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$user_name = $row["user_name"];
				$user_email = $row["user_email"];
			}
		} else {
			echo "Customer not found, <a data-toggle='modal' data-target='#add_user'>add one now.</a>";
			exit();
		}
		$conn->close();
		?>
		<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
			<li class="active"><a href="#information" data-toggle="tab">Information</a></li>
			<li><a href="#delete_user" data-toggle="tab">Delete</a></li>
		</ul>
		<div id="my-tab-content" class="tab-content">
			<div class="tab-pane active" id="information">
				<br>
				<form action="user_update.php" id="add_user" method="post">
					<label>User name</label>
					<input type="text" class="form-control" name="user_name" value="<?php echo htmlspecialchars($user_name); ?>" placeholder="User Name" required>
					<label>User Email</label>
					<input type="text" class="form-control" name="user_email" value="<?php echo htmlspecialchars($user_email); ?>" placeholder="User Email" required>
				</form>
				<hr>
				<center><input type="submit" form="add_user" class="btn btn-primary"></center>
			</div>
			<div class="tab-pane" id="delete_user">
			<br>
			<div class="alert alert-danger" role="alert">
						<b>Warning</b>
						<br>
						Deleting this user cannot be undone.
			</div>
					<a href="delete_user.php?user_id=<?php echo $user_id; ?>" class="btn btn-danger confirmation">Remove User</a>
			</div>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'libraries/js.php'; ?>
</body>
</html>