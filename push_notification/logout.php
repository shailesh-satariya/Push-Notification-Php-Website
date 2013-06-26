<?php
	require_once 'config.php';
	session_start();
	session_destroy();
	session_unset();
	header("location:" . SITE_URL);
?>