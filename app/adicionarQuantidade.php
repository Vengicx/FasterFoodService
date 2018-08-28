<?php
	if(isset($_POST["id"])){
		$id = trim ($_POST["id"]);
	}

	if(isset($_POST["quantidade"])){
		$quantidade = trim ($_POST["quantidade"]);
	}

	include "connect.php";

	$sql = "select quantidade from materiaprima where id = ?";
	$query = $pdo->prepare($sql);
	$query->bindParam(1, $id);
	$query->execute();
	
	$data = $query->fetch(PDO::FETCH_OBJ);
		$quantidadeAtual = $data->quantidade;

	$quantidade = $quantidadeAtual + $quantidade;

	$sql = "update materiaprima set quantidade = ? where id = ?";
	$query = $pdo->prepare($sql);
	$query->bindParam(1, $quantidade);
	$query->bindParam(2, $id);
	$query->execute();

?>