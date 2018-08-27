<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $nome = $quantidade = $precoCompra = $qtdPedacos = $precoPorPedaco = "";
	
	if(isset($_GET["id"])){
		$id = $_GET["id"];

		require_once "./app/connect.php";

		$sql = "select * from materiaprima where id = ? limit 1";
		$query = $pdo->prepare($sql);
		$query->bindParam(1, $id);

		$query->execute();

		$data = $query->fetch(PDO::FETCH_OBJ);
			$id = $data->id;
			$nome = $data->nome;
			$quantidade = $data->quantidade;
			$precoCompra = $data->precoCompra;
			$qtdPedacos = $data->qtdPedacos;
			$precoPorPedaco = $data->precoPorPedaco;

	}

?>
<h1 class="text-center">Cadastro de Matéria Prima</h1>

<form method="post" action="home.php?fd=save&pg=materiaprima" data-parsley-validate>

	<label for="id">ID:</label>
	<input type="text" name="id" class="form-control" readonly value="<?=$id?>">
	<br>

	<label for="nome">Nome: </label>
	<input type="text" name="nome" class="form-control"
	required data-parsley-required-message="Por favor, preencha o nome do tamanho" value="<?=$nome?>">
	<br>

	<label for="quantidade">Quantidade</label>
	<input type="number" name="quantidade" class="form-control" id="quantidade" value="<?=$quantidade?>">
	<br>

	<label for="precoCompra">Preço de Compra</label>
	<input type="number" name="precoCompra" class="form-control" id="precoCompra" value="<?=$precoCompra?>" onkeyup="calcular()">
	<br>

	<label for="qtdPedacos">Quantidade de pedaços que pode ser cortado</label>
	<input type="number" name="qtdPedacos" class="form-control" id="qtdPedacos" value="<?=$qtdPedacos?>" onkeyup="calcular()">
	<br>

	<label for="precoPorPedaco">Preço por Pedaço:</label>
	<input type="number" name="precoPorPedaco" value="<?=$precoPorPedaco?>" class="form-control" id="resultado" readonly>
	<br>

	<button type="submit" class="btn btn-success">
		Gravar/Alterar Matéria-Prima
	</button>

</form>

<script type="text/javascript">
	function calcular(){
		var quantidade = parseInt(document.getElementById('quantidade').value);
		var precoCompra = parseInt(document.getElementById('precoCompra').value);

		var precoUnitario = parseFloat(precoCompra / quantidade);
		
		var qtdPedacos = parseInt(document.getElementById('qtdPedacos').value);
		var preco = parseFloat(precoUnitario / qtdPedacos).toFixed(2);
		var resultado = document.getElementById('resultado').value = preco;

	}

</script>