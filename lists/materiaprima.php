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
				<td>ID</td>
				<td>Nome</td>
				<td>Preço de Compra</td>
				<td>Preço por Pedaço</td>
				<td>Quantidade Disponível</td>
				<td>Quantidade Média de Pedaços</td>
				<td>Opções</td>
			</tr>
		</thead>
<?php

	include "./app/connect.php";

	$sql = "select * from materiaprima order by nome";
	$query = $pdo->prepare($sql);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$nome = $data->nome;
		$precoCompra = $data->precoCompra;
		$precoPorPedaco = $data->precoPorPedaco;
		$quantidade = $data->quantidade;
		$qtdPedacos = $data->qtdPedacos;

		echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$precoCompra</td>
				<td>R$ $precoPorPedaco</td>
				<td>$quantidade</td>
				<td>$qtdPedacos</td>
				<td>
					<a class='btn btn-success' href='home.php?fd=register&pg=materiaprima&id=$id'><i class='fa fa-pencil'></i></a>
					<a class='btn btn-primary' href='#' data-toggle='modal' onclick='adicionarQuantidade($id, $quantidade)' data-target='#exampleModalCenter'><i class='fa fa-plus'></i></a>
				</td>
			  </tr>";

	}
?>
	</table>
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Adicionar Quantidade de Produto</h5>
	      		</div>
	      		<div class="modal-body">
	      			<label for="quantidade">Quantidade </label>
	      			<input type="text" name="quantidade" class="form-control">
	      		</div>
	      		<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			        <button type="submit" onclick="adicionarQuantidade()" class="btn btn-primary">Adicionar</button>
	    		</div>
	    	</div>
	  </div>
	</div>

<script>
function adicionarQuantidade(id, quantidade){
    $.ajax({
        url: "./app/adicionarQuantidade.php",
        method: "post",
        dataType: "json",
        id : id,
        quantidade : quantidade,
        success: users => {
        window.reload();
        },
    });
    
}
</script>