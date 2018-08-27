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
			<td>Nome</td>
			<td>cpf</td>
			<td>endereco</td>
			<td>telefone</td>
			<td>email</td>
		</tr>
	</thead>
<?php
	include "./app/connect.php";
	
	$tipoUsuario = 3;

	$sql = "select * from usuario where tipoUsuario = ? order by nome";
	$query = $pdo->prepare($sql);
	$query->bindParam(1, $tipoUsuario);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$nome = $data->nome;
		$cpf = $data->cpf;
		$endereco = $data->endereco;
		$telefone = $data->telefone;
		$email = $data->email;

		echo "<tr>
				<td>$nome</td>
				<td>$cpf</td>
				<td>$endereco</td>
				<td>$telefone</td>
				<td>$email</td>
			  </tr>";

	}


?>