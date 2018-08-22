<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $nome = $login = $email = $ativo = "";

?>

<h1>Cadastro de Usuário</h1>

<form name="form1" method="post" action="home.php?op=salvar&pg=usuario" data-parsley-validate>

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
	<input type="email" name="email" class="form-control" required 
	data-parsley-required-message="Por favor, digite um e-mail" 
	data-parsley-type-message="Digite um e-mail válido"
	value="<?=$email;?>">
	<br>

	<label for="ativo">Ativo:</label>
	<select name="ativo" id="ativo" class="form-control"
	required data-parsley-required-message="Selecione uma opção">
		<option value=""></option>
		<option value="Sim">Sim</option>
		<option value="Nao">Não</option>
	</select>
	<br>

	<button type="submit" class="btn btn-success">
		Gravar/Alterar cadastro
	</button>

</form>