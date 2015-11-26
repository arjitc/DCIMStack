<?php
function add_event($event_type, $event_message, $event_status) {
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$event_type    = mysqli_real_escape_string($conn, $event_type);
	$event_message    = mysqli_real_escape_string($conn, $event_message);
	$event_status    = mysqli_real_escape_string($conn, $event_status);
	$sql = "INSERT INTO `events` (`id`, `event_type`, `event_message`, `event_status`, `event_timestamp`) VALUES (NULL, '$event_type', '$event_message', '$event_status', CURRENT_TIMESTAMP);";
	$conn->query($sql);
}
function list_events_table($limit) {
	$token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
	include realpath(dirname(__FILE__)).'/../config/db.php';
	$limit    = mysqli_real_escape_string($conn, $limit);
	$sql = "SELECT * FROM `events` ORDER BY `id` DESC LIMIT $limit";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    echo "<div class='table-responsive'>
            <table class='table table-striped'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Type</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Timestamp</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>";
	    while($row = $result->fetch_assoc()) {
	    	$id = $row["id"];
	    	echo "<tr>";
	            echo "<td>".$row["id"]."</td>";
	            echo "<td>".$row["event_type"]."</td>";
	            echo "<td>".$row["event_message"]."</td>";
	            echo "<td>".$row["event_status"]."</td>";
	            echo "<td>".$row["event_timestamp"]."</td>";
	            echo "<td><a href='delete_event.php?id=$id&token=$token' class='confirmation'><i class='fa fa-times'></i></a></td>";
            echo "</tr>";
	    }
	    echo "</tbody>
            </table>
          </div>";
        echo "<i>Showing last $limit events</i>";
	} else {
	    echo "<center>No events found</center>";
	}     
}
?>