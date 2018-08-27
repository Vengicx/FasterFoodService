<nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
	<a class="navbar-brand" href="home.php">
		Faster Food Service
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
    <div class="collapse navbar-collapse">
    	<ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cadastros
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="home.php?fd=register&pg=produto">Produto</a>
                  <a class="dropdown-item" href="home.php?fd=register&pg=materiaprima">Matéria Prima</a>
                  <a class="dropdown-item" href="home.php?fd=register&pg=usuario">Usuário</a>
                  <a class="dropdown-item" href="home.php?fd=register&pg=tamanho">Tamanho</a>
                  <a class="dropdown-item" href="home.php?fd=register&pg=pizza">Pizza</a>
		        </div>
		   	</li>

		   	<li class="nav-item dropdown">
		    	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bar-chart" aria-hidden="true"></i> Relatórios
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="home.php?fd=reports&pg=produtos">Produtos Vendidos</a>
                  <a class="dropdown-item" href="home.php?fd=reports&pg=materiaprima">Matéria-Prima Usadas</a>
                  <a class="dropdown-item" href="home.php?fd=reports&pg=clientes">Clientes</a>
                  <a class="dropdown-item" href="home.php?fd=reports&pg=lucros">Lucros</a>
		       	</div>
		    </li>

		   	<li class="nav-item dropdown">
		    	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-list" aria-hidden="true"></i> Listas
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="home.php?fd=lists&pg=usuario">Usuários</a>
                  <a class="dropdown-item" href="home.php?fd=lists&pg=materiaprima">Matérias-Prima</a>
                  <a class="dropdown-item" href="home.php?fd=lists&pg=produto">Produtos</a>
                  <a class="dropdown-item" href="home.php?fd=lists&pg=tamanho">Tamanhos</a>
		       	</div>
		    </li>

		   	<li class="nav-item">
		        <a class="nav-link" href="exit.php">	
		        	<i class="fa fa-power-off"></i> Sair
		        </a>
		    </li>
		</ul>
	  </div>

</nav>
