<!--
	ação da pagina: mostrar os produtos para a compra(RGL)
	data:19/02/2019
	Criador: Rodrigo Madrona de Jesus
-->

<!-- codigo php-->
<?php 
	// includes
	include ("bancodedados.class.php");
	session_start ();
	if (isset ($_SESSION["erro"])){
		if ($_SESSION["erro"] == 0){
			echo "<script language='javascript' type='text/javascript'>
				alert ('Login realizado com sucesso');
			</script>";	
			$_SESSION["erro"] = 4;
		}
	}
	if (isset ($_SESSION["erroconta"]) ){
		if ($_SESSION["erroconta"] == 7){
			echo "<script language='javascript' type='text/javascript'>
				alert ('para fazer uma compra o campo quantidade deve estar preenchido');
			</script>";		
			$_SESSION["erroconta"] = 0;		
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<!-- meta tags-->
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/> 
		
		<!-- titulo da pagina-->
		<title>Restalrante Global(RG)</title>

		<!-- codigo javascript e css-->
		<script language="javascript" type="text/javascript" src="../js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="../js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/tudo.css"/>		
		<link rel="icon" href="../img/logo.jpg"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>		
	</head>
	<body>

		<!-- header sem login-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-info">
			<div class="container">
				<a class="navbar-brand" href="#">Restalrante Global</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navsite">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse " id="navsite">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="../index.php">Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../sobre/sobre.php">Sobre</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="servicos.php">Serviço</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../historia/historia.php">Historia</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../contato/contato.php">Contato</a>
						</li>																		
					</ul>

					<?php 
					if (!isset($_SESSION["usando"])){
						echo "
						<ul class='navbar-nav ml-auto'>
							<li class='nav-item dropdown'>
								<a class='nav-link dropdown-toggle' href='#'' data-toggle='dropdown' id='navDrop'>
									Logar
								</a>
								<div class='dropdown-menu'>
									<a class='dropdown-item' href='../logar/entrar.php'>Entrar</a>
									<a class='dropdown-item' href='../logar/cadastro.php'>Cadastrar-se</a>								
								</div>
							</li>
						</ul>
						";
					}
					else{
						echo "
							<ul class='navbar-nav ml-auto'>
								<li class='nav-item dropdown'>
									<a class='nav-link dropdown-toggle' href='#'' data-toggle='dropdown' id='navDrop'>
										<i class='fas fa-user'></i>
									</a>
									<div class='dropdown-menu'>
										<label class='dropdown-item bg-dark text-info'>".$_SESSION["usando"]["nome"]."</label>
										<a class='dropdown-item' href='../conta/conta.php'>minha conta</a>
										<a class='dropdown-item' href='../sair/sair.php'>sair</a>			
									</div>
								</li>
							</ul>
						";
					}
					?>

					<form class="form-inline">
						<input type="search" class="form-control ml-2 mr-2" placeholder="Buscar..."/>
						<button type="submit" class="btn btn-primary">IR</button>
					</form>

				</div>
			</div>
		</nav>

		<!-- Conteudo da pagina-->
		<div id="verslide" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators bg-info">
				<li data-target="#verslide" data-slide-to="0" class="active"></li>
				<li data-target="#verslide" data-slide-to="1"></li>
				<li data-target="#verslide" data-slide-to="2" ></li>
				<li data-target="#verslide" data-slide-to="3"></li>	
				<li data-target="#verslide" data-slide-to="4"></li>														
			</ol>
			<div class="carousel-inner" id="siteslide">
				<div class="carousel-item active">
					<img src="../img/cafedamanha.jpg" class="rounded mx-auto d-block img-fluid" id="im1"/>
					<div class="carousel-caption">
						<h1 class="display-3">Cafe da manha</h1>
					</div>
				</div>				
				<div class="carousel-item">
					<img src="../img/almoso.jpg" class="rounded mx-auto d-block img-fluid" id="im2"/>
					<div class="carousel-caption">
						<h1 class="display-3">Almoso</h1>
					</div>					
				</div>
				<div class="carousel-item">
					<img src="../img/sobremesa.jpg" class="rounded mx-auto d-block img-fluid" id="im3"/>
					<div class="carousel-caption">
						<h1 class="display-3">Sobremesa</h1>
					</div>					
				</div>
				<div class="carousel-item">
					<img src="../img/cafedatarde.jpg" class="rounded mx-auto d-block img-fluid" id="im4"/>
					<div class="carousel-caption">
						<h1 class="display-3">Cafe da  Tarde</h1>
					</div>					
				</div>	
				<div class="carousel-item">
					<img src="../img/jantar.jpg" class="rounded mx-auto d-block img-fluid" id="im5"/>
					<div class="carousel-caption">
						<h1 class="display-3">Jantar</h1>
					</div>					
				</div>	

				<!--
				<a class="carousel-control-prex" href="#siteslide" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
					<span class="sr-only">Anterior</span>

				</a>
				<a class="carousel-control-prex" href="#siteslide" role="button" data-slide="next">
					<span class="carousel-control-next-icon"></span>
					<span class="sr-only">Proximo</span>
				</a>		
				-->									
			</div>
		</div>
		<div class="container bg-dark text-info">
			<div class="row md-3">
				<h1 class="display-3 text-center">Produtos disponiveis para a compra</h1>
			</div>
			<div class="row md-3">
				<?php
				foreach ($lista as $dado){
					$imprime = "<div class='col-lg-4 my-3'>
						<form method='post' action='compra.php'>
							<div class='card'>
								<img src='../img/".$dado["caminho"]."' class='card-img-top'/>
								<div class='card-body'>
									<h1 class='card-title'>
									".$dado["nome"]."
									</h1>
									<label>
										Valor:
									</label>
									<label>
										".$dado["preco"]." R$
									</label>
									<br/>
									<label>
										Peso:
									</label>
									<label>
										".$dado["peso"]." KG
									</label>
									<br/>
									<label>
										Descrição:
									</label>
									<label>
										".$dado["descricao"]."
									</label>
									";
									if (isset ($_SESSION["usando"])){
										$imprime .="
										<label>
											quantidade:
										</label>
										<input type='number' class='form-control' name='quantidade' value='1'/>
										<button class='btn btn-primary' type='submit' name='comprar' value=".$dado["idpratos"].">Comprar</button>";
									}
								$imprime .="</div>
							</div>
						</form>
					</div>";
					echo $imprime;
				}
				?>
			</div>
		</div>
	</body>
</html>
