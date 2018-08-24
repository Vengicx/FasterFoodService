<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $nome = $precoCompra = $quantidade = $precoPedaco = $qtdPedacos = "";

	if($_POST){
		if(isset($_POST["id"])){
			$id = trim ($_POST["id"]);
		}

		if(isset($_POST["precoCompra"])){
			$precoCompra = trim ($_POST["precoCompra"]);
		}

		if(isset($_POST["nome"])){
			$nome = trim ($_POST["nome"]);
		}

		if(isset($_POST["qtdPedacos"])){
			$qtdPedacos = trim ($_POST["qtdPedacos"]);
		}

		if(isset($_POST["quantidade"])){
			$quantidade = trim ($_POST["quantidade"]);
		}

		if(isset($_POST["precoPedaco"])){
			$precoPedaco = trim ($_POST["precoPedaco"]);
		}

		$nome = strtoupper($nome);

		if(empty($id)){
			if(empty($nome)){
				echo "<script>alert('Preencha o nome');history.back();</script>";
				exit;
			}elseif(empty($precoCompra)){
				echo "<script>alert('Preencha o preço de compra');history.back();</script>";
				exit;
			}elseif(empty($quantidade)){
				echo "<script>alert('Preencha a quantidade');history.back();</script>";
				exit;
			}elseif(empty($precoPedaco)){
				echo "<script>alert('Preencha o preço por pedaço');history.back();</script>";
				exit;
			}
			}elseif(empty($qtdPedacos)){
				echo "<script>alert('Preencha a quantidade de pedaços');history.back();</script>";
				exit;
			}else{
				include "./app/connect.php";

				$sql = "insert into materiaprima (id, nome, precoCompra, quantidade, precoPorPedaco) values (NULL, ?, ?, ?, ?, ?)";
				$query = $pdo->prepare($sql);
				$query->bindParam(1, $nome);
				$query->bindParam(2, $precoCompra);
				$query->bindParam(3, $quantidade);
				$query->bindParam(4, $precoPedaco);
				$query->bindParam(5, $qtdPedacos);

				if($query->execute()){
					echo "<script>alert('Matéria-Prima cadastrada com sucesso!');</script>";
					header("Location: home.php?fd=lists&pg=materiaprima");

				}else{
					echo "<script>alert('Erro ao cadastrar Matéria-Prima');history.back();</script>";
					exit;

				}


			}


	}else{
		header("Location: home.php");
	}