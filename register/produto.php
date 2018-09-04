<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $nome = $quantidade = $precoCompra = $precoVenda = "";

	if(isset($_GET["id"])){
		$id = trim ($_GET["id"]);

		require_once "./app/connect.php";

		$sql = "select * from produto where id = ? limit 1";
		$query = $pdo->prepare($sql);
		$query->bindParam(1, $id);
		$query->execute();

		$data = $query->fetch(PDO::FETCH_OBJ);
			$id = $data->id;
			$nome = $data->nome;
			$quantidade = $data->quantidade;
			$precoCompra = $data->precoCompra;
			$precoVenda = $data->precoVenda;


	}
?>
<h1 class="text-center">Cadastro de Produto</h1>
<form method="post" action="home.php?fd=save&pg=produto" data-parsley-validate>

	<label for="id">ID:</label>
	<input type="text" name="id" class="form-control" readonly value="<?=$id?>">
	<br>

	<label for="nome">Nome do Produto</label>
	<input type="text" name="nome" class="form-control"
	required data-parsley-required-message="Por favor, preencha o nome do produto" value="<?=$nome?>">
	<br>

	<label for="quantidade">Quantidade</label>
	<input type="number" name="quantidade" class="form-control" value="<?=$quantidade?>">
	<br>
	
	<label for="precoCompra">Preço de Compra</label>
	<input type="text" name="precoCompra" class="form-control" value="<?=$precoCompra?>"><!-- Alterar para float-->
	<br>

	<label for="precoVenda">Preço de Venda</label>
	<input type="text" name="precoVenda" class="form-control" value="<?=$precoVenda?>"><!-- Alterar para float-->
	<br>

	<button type="submit" class="btn btn-success">
		Gravar/Alterar Produto
	</button>

</form>