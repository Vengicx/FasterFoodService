<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}
?>
	<h1 class="text-center">Lista de Usuários</h1>
	<br>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Ativo</td>
				<td>Tipo do Usuário</td>
				<td>Opções</td>
			</tr>
		</thead>
<?php

	include "./app/connect.php";

	$sql = "select * from usuario where not tipoUsuario = 3;";
	$query = $pdo->prepare($sql);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$nome = $data->nome;
		$ativo = $data->ativo;
		$tipoUsuario = $data->tipoUsuario;
		
		echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$ativo</td>
				<td id='tipoUsuario'>$tipoUsuario</td>
				<td><a class='btn btn-success' href='home.php?fd=register&pg=usuario&id=$id'><i class='fa fa-pencil'</i></a></td>
			  </tr>";

	}
?>
	</table>
<script>
	function substituirValor(){
		var tipoUsuario = document.getElementById('tipoUsuario').children;
		console.log(tipoUsuario);

		if(tipoUsuario = 1){
			tipoUsuario.children = "Sim";

		}else{
			tipoUsuario.children = "Não";

		}

	}

		window.onload = substituirValor();


</script>
