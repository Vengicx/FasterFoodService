<?php 
	session_start();
	unset( $_SESSION["system"] );
	header("Location: index.php");