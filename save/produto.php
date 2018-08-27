<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $precoCompra = $precoVenda = $quantidade = "";

	if($_POST){
		if (isset($_POST["id"])){
			$id = trim ($_POST["id"]);

		}
		if (isset($_POST["nome"])){
			$nome = trim ($_POST["nome"]);

		}

		if (isset($_POST["precoCompra"])){
			$precoCompra = trim ($_POST["precoCompra"]);

		}

		if (isset($_POST["precoVenda"])){
			$precoVenda = trim ($_POST["precoVenda"]);

		}

		if (isset($_POST["quantidade"])){
			$quantidade = trim ($_POST["quantidade"]);

		}

		$tipoProduto = 2; //o tipo do produto é 2 porque é um produto e não uma pizza
		$nome = strtoupper($nome);
		
		if(empty($nome)){
			echo"<script>alert('Digite um nome');history.back();</script>";
			exit;

		}elseif(empty($precoCompra)){
			echo"<script>alert('Digite o preço de compra');history.back();</script>";
			exit;

		}elseif(empty($precoVenda)){
			echo"<script>alert('Digite o preço de venda');history.back();</script>";
			exit;

		}elseif(empty($quantidade)){
			echo"<script>alert('Digite a quantidade');history.back();</script>";
			exit;

		}
		
		include "./app/connect.php";

		if(empty($id)){
			$sql = "insert into produto (id, nome, precoCompra, precoVenda, quantidade, tipoProduto) values (NULL, ?, ?, ?, ?, ?)";
			$query = $pdo->prepare($sql);
			$query->bindParam(1, $nome);
			$query->bindParam(2, $precoCompra);
			$query->bindParam(3, $precoVenda);
			$query->bindParam(4, $quantidade);
			$query->bindParam(5, $tipoProduto);

			if($query->execute()){
				echo "<script>alert('Produto cadastrado com sucesso!');</script>";
				header("Location: home.php?fd=lists&pg=produto");

			}else{
				echo "<script>alert('Erro ao cadastrar produto');history.back();</script>";
				exit;	
			}

		}else{
			$sql = "update produto set nome = ?, precoCompra = ?, precoVenda = ?, quantidade = ? where id = ? limit 1";
			$query = $pdo->execute($sql);
			$query->bindParam(1, $nome);
			$query->bindParam(2, $precoCompra);
			$query->bindParam(3, $precoVenda);
			$query->bindParam(4, $quantidade);
			$query->bindParam(5, $id);

			if($query->execute()){
				echo "<script>alert('Produto alterado com sucesso!')</script>";
				header("Location: home.php?fd=lists&pg=produto");

			}else{
				echo "<script>alert('Erro ao alterar produto');history.back();</script>";
				exit;
			}

		}


	}else{/* fim do $_POST */
		header("Location: home.php");

	}