<?php
	require_once("conf.php");
	session_destroy();
	header("Location: index.php");
	exit();
?>


