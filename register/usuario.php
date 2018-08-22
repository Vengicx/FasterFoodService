<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $nome = $login = $email = $ativo = "";

?>
<h1>Cadastro de Usuário</h1>

<form method="post" action="home.php?fd=save&pg=usuario" data-parsley-validate>

	<label for="id">ID:</label>
	<input type="text" name="id" class="form-control" readonly value="<?=$id;?>">
	<br>

	<label for="nome">Nome do Usuário:</label>
	<input type="text" name="nome" class="form-control"
	required data-parsley-required-message="Por favor, preencha o nome do usuário" value="<?=$nome;?>">
	<br>

	<label for="login">Login:</label>
	<input type="text" name="login" class="form-control" required data-parsley-required-message="Por favor, preencha o login" value="<?=$login;?>" maxlength="14">
	<br>

	<label for="senha">Senha:</label>
	<input type="password" name="senha" class="form-control" required data-parsley-required-message="Por favor, digite uma senha">
	<br>

	<label for="email">E-mail:</label>
	<input type="email" name="email" class="form-control" required data-parsley-required-message="Por favor, digite um e-mail" data-parsley-type-message="Digite um e-mail válido"
	value="<?=$email;?>">
	<br>

	<label for="tipoUsuario">Tipo Usuário:</label>
	<select name="tipoUsuario" id="ativo" class="form-control" required data-parsley-required-message="Selecione uma opção">
		<option value="">Selecione um tipo de usuário</option>
		<option value="2">Garçom</option>
		<option value="3">Cliente</option>
		<option value="4">Caixa</option>
		<option value="5">Cozinha</option>
		<option value="6">Entregador</option>
		<option value="1">Administrador</option>
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