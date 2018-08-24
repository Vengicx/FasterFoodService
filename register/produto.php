<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}
?>
<h1>Cadastro de Produto</h1>
<form method="post" action="home.php?fd=save&pg=produto" data-parsley-validate>

	<label for="id">ID:</label>
	<input type="text" name="id" class="form-control" readonly value="">
	<br>

	<label for="nome">Nome do Produto</label>
	<input type="text" name="nome" class="form-control"
	required data-parsley-required-message="Por favor, preencha o nome do produto" value="">
	<br>

	<label for="quantidade">Quantidade</label>
	<input type="number" name="quantidade" class="form-control" value="">
	<br>
	
	<label for="precoCompra">Preço de Compra</label>
	<input type="text" name="precoCompra" class="form-control" value=""><!-- Alterar para float-->
	<br>

	<label for="precoCompra">Preço de Venda</label>
	<input type="text" name="precoVenda" class="form-control" value=""><!-- Alterar para float-->
	<br>

	<button type="submit" class="btn btn-success">
		Gravar/Alterar Produto
	</button>

</form>