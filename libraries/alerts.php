<?php
if(isset($_SESSION['success'])) {
	$success = $_SESSION['success'];
	echo "<div class='alert alert-success alert-dismissible' role='alert'>";
        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo "<i class='fa fa-check'></i> $success";
    echo "</div>";
    unset($_SESSION['success']);
    unset($success);
}
if(isset($_SESSION['error'])) {
	$error = $_SESSION['error'];
	echo "<div class='alert alert-warning alert-dismissible' role='alert'>";
        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo "<i class='fa fa-times'></i> $error";
    echo "</div>";
    unset($_SESSION['error']);
    unset($error);
}
?>