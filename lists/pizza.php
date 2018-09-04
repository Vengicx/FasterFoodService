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
				<td>Preço de Venda</td>
				<td>Opções</td>
			</tr>
		</thead>
<?php

	include "./app/connect.php";

	$sql = "select * from produto where tipoProduto = 1 order by id";
	$query = $pdo->prepare($sql);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$nome = $data->nome;
		$precoVenda = $data->precoVenda;

		echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$precoVenda</td>
				<td>
					<a class='btn btn-success' href='home.php?fd=register&pg=pizza&id=$id'><i class='fa fa-pencil'></i></a>
					<a class='btn btn-primary' href='#'><i class='fa fa-plus'></i></a>
				</td>
			  </tr>";

	}
?>
	</table>