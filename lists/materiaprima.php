<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}
?>
	<h1 class="text-center">Lista de Matéria-Prima</h1>
	<br>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Preço de Compra</td>
				<td>Preço por Pedaço</td>
				<td>Quantidade Disponível</td>
				<td>Quantidade Média de Pedaços</td>
				<td>Opções</td>
			</tr>
		</thead>
<?php

	include "./app/connect.php";

	$sql = "select * from materiaprima order by nome";
	$query = $pdo->prepare($sql);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$nome = $data->nome;
		$precoCompra = $data->precoCompra;
		$precoPorPedaco = $data->precoPorPedaco;
		$quantidade = $data->quantidade;
		$qtdPedacos = $data->qtdPedacos;

		echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$precoCompra</td>
				<td>R$ $precoPorPedaco</td>
				<td>$quantidade</td>
				<td>$qtdPedacos</td>
				<td><a class='btn btn-success' href='home.php?fd=register&pg=materiaprima&id=$id'><i class='fa fa-pencil'</i></a></td>
			  </tr>";

	}
?>
	</table>