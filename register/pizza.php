<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

$id = $nome = $precoVenda = $tamanho = $status = "";

	if(isset($_GET["id"])){
		$id = trim($_GET["id"]);

		require_once("./app/connect.php");

		$sql = "select * from produto where id = ? limit 1";
		$query = $pdo->prepare($sql);
		$query->bindParam(1, $id);

		$query->execute();

		$data = $query->fetch(PDO::FETCH_OBJ);
			$id = $data->id;
			$nome = $data->nome;
			$precoVenda = $data->precoVenda;
			$tamanho = $data->tamanho;
			
	}

?>
<h1 class="text-center">Cadastro de Nova Pizza</h1>

<form method="post" action="home.php?fd=save&pg=pizza" data-parsley-validate>

	<label for="id">ID:</label>
	<input type="text" name="id" class="form-control" readonly value="<?=$id;?>">
	<br>

	<label for="nome">Nome:</label>
	<input type="text" name="nome" class="form-control"
	required data-parsley-required-message="Por favor, preencha o nome da pizza" value="<?=$nome;?>">
	<br>

	<label for="precoVenda">Preço de Venda:</label>
	<input type="text" name="precoVenda" class="form-control" required data-parsley-required-message="Por favor, preencha o preço de venda" value="<?=$precoVenda;?>">
	<br>

	<label for="tamanho">Tamanho: </label>
		<select name="tamanho" id="tipoUsuario" class="form-control" required data-parsley-required-message="Selecione um tamanho" value="<?=$tamanho?>">
			<option value="">Selecione um tamanho</option>
			<?php
				include "app/connect.php";

				$sql = "select tamanho from tamanho order by id";
				$query = $pdo->prepare($sql);
				$query->execute();

				while($data = $query->fetch(PDO::FETCH_OBJ)){
					$tamanho = $data->tamanho;
					
					echo "<option value=\"$tamanho\">$tamanho</option>";
				}

			?>
		</select>
	<br>
	<button type="submit" class="btn btn-success">
		Gravar/Alterar Pizza
	</button>
</form>

	