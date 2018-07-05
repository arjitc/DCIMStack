<?php
function hipchat_alert($message) {
	include '/opt/dcimstack/vendor/autoload.php';
	$user  = "DCIMStack";
	$token = "API TOKEN";
	$room  = "HIPCHAT ROOM";
	$hc = new HipChat\HipChat($token);

	// send a message to the 'Development' room from 'API'
	$hc->message_room($room, $user, $message);
}
?>