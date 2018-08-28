<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $tamanho = $qtdPedacos = $qtdSabores = "";

	if($_POST){
		if(isset($_POST["id"])){
			$id = trim ($_POST["id"]);
		}

		if(isset($_POST["nome"])){
			$tamanho = trim ($_POST["nome"]);
		}

		if(isset($_POST["qtdPedacos"])){
			$qtdPedacos = trim ($_POST["qtdPedacos"]);
		}

		if(isset($_POST["qtdSabores"])){
			$qtdSabores = trim ($_POST["qtdSabores"]);
		}
		
		if(empty($tamanho)){
			echo "<script>alert('Preencha o nome do tamanho');history.back();</script>";
			exit;
		}elseif(empty($qtdPedacos)){
			echo "<script>alert('Preencha a quantidade máxima de pedaços');history.back();</script>";
			exit;
		}elseif(empty($qtdSabores)){
			echo "<script>alert('Preencha a quantidade máxima de sabores');history.back();</script>";
			exit;
		}

		include "./app/connect.php";

		if(empty($id)){
			$sql = "insert into tamanho (tamanho, qtdPedacos, qtdSabores) values (?, ?, ?)";
			$query = $pdo->prepare($sql);
			$query->bindParam(1, $tamanho);
			$query->bindParam(2, $qtdPedacos);
			$query->bindParam(3, $qtdSabores);

			if($query->execute()){
				echo "<script>alert('Tamanho registrado com sucesso');</script>";
				header("Location: home.php?fd=lists&pg=tamanho");

			}else{
				echo "<script>alert('Erro ao registrar tamanho');history.back();</script>";

			}

		}else{
			$sql = "update tamanho set tamanho = ?, qtdPedacos = ?, qtdSabores = ? where id = ? limit 1";
			$query = $pdo->prepare($sql);
			$query->bindParam(1, $tamanho);
			$query->bindParam(2, $qtdPedacos);
			$query->bindParam(3, $qtdSabores);
			$query->bindParam(4, $id);

			if($query->execute()){
				echo "<script>alert('Tamanho alterado com sucesso!');</script>";
				header("Location: home.php?fd=lists&pg=tamanho");

			}else{
				echo "<script>alert('Erro ao alterar tamanho');</script>";
				exit;
			}
		}
	

	}else{
		include "./app/invalidRequest.php";
	}