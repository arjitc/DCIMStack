<?php
function vendor_logo($vendor) {
	switch ($vendor) {
		case 'HP':
			return "<img src='assets/img/vendor/hp.png'>";
			break;
		
		default:
			return "?";
			break;
	}
}
?>