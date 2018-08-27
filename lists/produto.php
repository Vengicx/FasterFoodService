<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}
?>
	<h1 class="text-center">Lista de Produtos</h1>
	<br>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Preço de Compra</td>
				<td>Preço de Venda</td>
				<td>Quantidade em Estoque</td>
				<td>Opções</td>
			</tr>
		</thead>
<?php

	include "./app/connect.php";

	$sql = "select * from produto order by id";
	$query = $pdo->prepare($sql);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$nome = $data->nome;
		$precoCompra = $data->precoCompra;
		$precoVenda = $data->precoVenda;
		$quantidade = $data->quantidade;

		echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$precoCompra</td>
				<td>$precoVenda</td>
				<td>$quantidade</td>
				<td>
					<a class='btn btn-success' href='home.php?fd=register&pg=produto&id=$id'><i class='fa fa-pencil'></i></a>
					<a class='btn btn-primary' href='#'><i class='fa fa-plus'></i></a>
				</td>
			  </tr>";

	}
?>
	</table>