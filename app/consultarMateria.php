<?php
	if(isset($_POST["nome"])){
		$nome = trim($_POST["nome"]);
	}

	include "connect.php";

	$sql = "select * from materia prima where tipoMateria = 1 like %?%";
	$query = $pdo->prepare($sql);
	$query->bindParam(1, $nome);
	$query->execute();
	
	$data = $query->fetch(PDO::FETCH_OBJ);
		$id = $data->id;
		$nome = $data->nome;
		$precoCompra = $data->precoCompra;
		$precoPorPedaco = $data->precoPorPedaco;
		$quantidade = $data->quantidade;
		$qtdPedacos = $data->qtdPedacos;

	return($data);




