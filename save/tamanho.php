<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $nome = $qtdPedacos = $qtdSabores = "";

	if($_POST){
		if(isset($_POST["id"])){
			$id = trim ($_POST["id"]);
		}

		if(isset($_POST["nome"])){
			$nome = trim ($_POST["nome"]);
		}

		if(isset($_POST["qtdPedacos"])){
			$qtdPedacos = trim ($_POST["qtdPedacos"]);
		}

		if(isset($_POST["qtdSabores"])){
			$qtdSabores = trim ($_POST["qtdSabores"]);
		}

		include "./app/connect.php";

		$sql = "insert into tamanho (tamanho, qtdPedacos, qtdSabores) values (?, ?, ?)";
		$query = $pdo->prepare($sql);
		$query->bindParam(1, $nome);
		$query->bindParam(2, $qtdPedacos);
		$query->bindParam(3, $qtdSabores);

		if($query->execute()){
			echo "<script>alert('Tamanho registrado com sucesso');history.back();</script>";

		}else{
			echo "<script>alert('Erro ao registrar tamanho');history.back();</script>";

		}
	}else{
		include "./app/invalidRequest.php";
	}