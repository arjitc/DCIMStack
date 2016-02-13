<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'vendor/autoload.php';
include 'config/db.php';
$sql = "SELECT * FROM `settings` WHERE `setting`='aftership_api_key'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$aftership_api_key =  $row["value"];
    	echo $aftership_api_key;
    }
}
$couriers = new AfterShip\Couriers($aftership_api_key);
$trackings = new AfterShip\Trackings($aftership_api_key);
$last_check_point = new AfterShip\LastCheckPoint($aftership_api_key);
$courier = new AfterShip\Couriers($aftership_api_key);
include 'config/db.php';
$sql = "SELECT * FROM `shipments`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$tracking_id = $row["tracking_id"];
    	echo $tracking_id;
		$response = $courier->detect($tracking_id);
		var_dump($response);
    }
}
?>