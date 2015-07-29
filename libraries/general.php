<?php
function get_filename_from_url() {
	$filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
	return $filename;
}
?>