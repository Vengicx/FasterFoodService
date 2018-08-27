<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $tamanho = $qtdPedacos = $qtdSabores = "";

	if(isset($_GET["id"])){
		$id = $_GET["id"];

		require_once "./app/connect.php";

		$sql = "select * from tamanho where id = ? limit 1";
		$query = $pdo->prepare($sql);
		$query->bindParam(1, $id);
		$query->execute();

		$data = $query->fetch(PDO::FETCH_OBJ);
			$id = $data->id;
			$tamanho = $data->tamanho;
			$qtdPedacos = $data->qtdPedacos;
			$qtdSabores = $data->qtdSabores;

	}

?>
<h1 class="text-center">Cadastro de Tamanho de Produto</h1>

<form method="post" action="home.php?fd=save&pg=tamanho" data-parsley-validate>

	<label for="id">ID:</label>
	<input type="text" name="id" class="form-control" readonly value="<?=$id;?>">
	<br>

	<label for="nome">Nome do Tamanho:</label>
	<input type="text" name="nome" class="form-control"
	required data-parsley-required-message="Por favor, preencha o nome do tamanho" value="<?=$tamanho;?>">
	<br>

	<label for="qtdPedacos">Quantidade de pedaços:</label>
	<input type="number" name="qtdPedacos" class="form-control" value="<?=$qtdPedacos;?>">
	<br>
	
	<label for="qtdSabores">Quantidade máxima de sabores:</label>
	<input type="number" name="qtdSabores" class="form-control" value="<?=$qtdSabores;?>">

	<br>
	<button type="submit" class="btn btn-success">
		Gravar/Alterar Tamanho
	</button>

</form>