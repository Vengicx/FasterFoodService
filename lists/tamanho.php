<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}
?>
	<h1 class="text-center">Lista de Tamanhos</h1>
	<br>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Tamanho</td>
				<td>Quantidade de Pedaços</td>
				<td>Quantidade Máxima de Sabores</td>
				<td>Opções</td>
			</tr>
		</thead>
<?php
	$id = $qtdPedacos = $qtdSabores = $nome = "";

	include "./app/connect.php";

	$sql = "select * from tamanho order by id";
	$query = $pdo->prepare($sql);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$qtdPedacos = $data->qtdPedacos;
		$qtdSabores = $data->qtdSabores;
		$tamanho = $data->tamanho;

		echo "<tr>
				<td>$id</td>
				<td>$tamanho</td>
				<td>$qtdPedacos</td>
				<td>$qtdSabores</td>
				<td></td>
			  </tr>";

	}
?>
	</table>