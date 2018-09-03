<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

$id = $nome = $login = $email = $status = $tipoUsuario = "";

	if(isset($_GET["id"])){
		$id = trim($_GET["id"]);

		require_once("./app/connect.php");

		$sql = "select * from produto where id = ? limit 1";
		$query = $pdo->prepare($sql);
		$query->bindParam(1, $id);

		$query->execute();

		$data = $query->fetch(PDO::FETCH_OBJ);
			
			$nome = $data->nome;
			$login = $data->login;
			$email = $data->email;
			$ativo = $data->ativo;
			$tipoUsuario = $data->tipoUsuario;
	}

?>
<h1 class="text-center">Cadastro de Usuário</h1>

<form method="post" action="home.php?fd=save&pg=usuario" data-parsley-validate>

	<label for="id">ID:</label>
	<input type="text" name="id" class="form-control" readonly value="<?=$id;?>">
	<br>

	<label for="nome">Nome</label>
	<input type="text" name="nome" class="form-control"
	required data-parsley-required-message="Por favor, preencha o nome da pizza" value="<?=$nome;?>">
	<br>

	<label for="precoVenda">Preço de Venda</label>
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

	<label class="form-check-label">Status:</label>
	<div class="form-radio">
		<div class="form-check">
	  		<input class="form-check-input" type="radio" name="status" value="1" checked>
	  		<label class="form-check-label" for="ativo">Ativo</label>
	  		<br>
	  		<input class="form-check-input" type="radio" name="status" value="2">
	  		<label class="form-check-label" for="inativo">Inativo</label>
		</div>
	</div>
	<br>
	<button type="submit" class="btn btn-success">
		Gravar/Alterar cadastro
	</button>
</form>

	