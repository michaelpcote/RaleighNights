<?php
	require_once('conf/conf.php');
	session_destroy();
	header("Location: ".URL."index.php");
	exit();
?>


