<?php
function add_event($event_type, $event_message, $event_status) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$event_type    = mysqli_real_escape_string($conn, $event_type);
	$event_message    = mysqli_real_escape_string($conn, $event_message);
	$event_status    = mysqli_real_escape_string($conn, $event_status);
	$sql = "INSERT INTO `events` (`id`, `event_type`, `event_message`, `event_status`, `event_timestamp`) VALUES (NULL, '$event_type', '$event_message', '$event_status', CURRENT_TIMESTAMP);";
	$conn->query($sql);
}
function list_events_table() {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$sql = "SELECT * FROM `events`";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	echo "<tr>";
	            echo "<td>".$row["id"]."</td>";
	            echo "<td>".$row["event_type"]."</td>";
	            echo "<td>".$row["event_message"]."</td>";
	            echo "<td>".$row["event_status"]."</td>";
	            echo "<td>".$row["event_timestamp"]."</td>";
            echo "</tr>";
	    }
	} else {
	    echo "<tr>";
	        echo "<td></td>";
	        echo "<td></td>";
	        echo "<td>No events found</td>";
	        echo "<td></td>";
        	echo "<td></td>";
        echo "</tr>";
	}
                
}
?>

