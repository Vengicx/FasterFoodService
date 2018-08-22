<?php
	session_cache_expire(5);
	session_start();

	if (!isset($_SESSION["system"]["id"])) {

		header("Location: index.php");
		
	}