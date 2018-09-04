<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $precoCompra = $precoVenda = $tamanho = $tamanhoSql = $idSql = "";

	if($_POST){
		if (isset($_POST["id"])){
			$id = trim ($_POST["id"]);

		}
		if (isset($_POST["nome"])){
			$nome = trim ($_POST["nome"]);

		}

		if (isset($_POST["precoVenda"])){
			$precoVenda = trim ($_POST["precoVenda"]);

		}

		if (isset($_POST["tamanho"])){
			$tamanho = trim ($_POST["tamanho"]);

		}

		include "./app/connect.php";

		$sql = "select * from tamanho";
		$query = $pdo->prepare($sql);
		$query->execute();

		while($data = $query->fetch(PDO::FETCH_OBJ)){//converter o texto para o id do tamanho
			$idBanco = $data->id;
			$tamanhoSql = $data->tamanho;
			
			if($tamanho == $tamanhoSql){
				$tamanho = $idSql;
			}

		}

		$tipoProduto = 1;

		$nome = strtoupper($nome);
		
		if(empty($nome)){
			echo"<script>alert('Digite um nome');history.back();</script>";
			exit;

		}elseif(empty($precoVenda)){
			echo"<script>alert('Digite o preço de venda');history.back();</script>";
			exit;

		}elseif(empty($tamanho)){
			echo"<script>alert('Escolha o tamanho da Pizza $tamanho');history.back();</script>";
			exit;

		}
		
		

		if(empty($id)){
			$sql = "insert into produto (id, nome, precoVenda, tipoProduto, idTamanho) values (NULL, ?, ?, ?, ?)";
			$query = $pdo->prepare($sql);
			$query->bindParam(1, $nome);
			$query->bindParam(2, $precoVenda);
			$query->bindParam(3, $tipoProduto);
			$query->bindParam(4, $tamanho);

			if($query->execute()){
				echo "<script>alert('Pizza cadastrada com sucesso!');</script>";
				header("Location: home.php?fd=lists&pg=pizza");

			}else{
				echo "<script>alert('Erro ao cadastrar pizza');history.back();</script>";
				exit;	
			}

		}else{
			$sql = "update produto set nome = ?, precoVenda = ?, where id = ? limit 1";
			$query = $pdo->prepare($sql);
			$query->bindParam(1, $nome);
			$query->bindParam(2, $precoVenda);;
			$query->bindParam(3, $id);

			if($query->execute()){
				echo "<script>alert('Pizza alterada com sucesso!')</script>";
				header("Location: home.php?fd=lists&pg=pizza");

			}else{
				echo "<script>alert('Erro ao alterar Pizza');history.back();</script>";
				exit;
			}

		}


	}else{/* fim do $_POST */
		header("Location: home.php");

	}