<?php
	//criar uma conexao com PDO
	$server = "127.0.0.1";
	$dbname = "fasterfoodservice";
	$user = "root";
	$pwd = "";

	try {
		$pdo = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8",$user,$pwd);


	} catch (PDOException $error) {
		echo $error->getMessage();
		exit;
	}