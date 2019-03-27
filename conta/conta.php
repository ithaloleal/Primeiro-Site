<!--
	ação da pagina: primeira pagina do restalrante global(RGL)
	data:19/02/2019
	Criador: Rodrigo Madrona de Jesus
-->

<!-- codigo php -->

<?php
	session_start ();
	if (!isset ($_SESSION["usando"])){
		header ("location: ../index.php");
	}
	else{
		include ("../servicos/bancodedados.class.php");
		include ("produtos.php");
		include ("../primario.php");
		include ("pessoa.php");
		if (isset($_SESSION["erroconta"])){
			if ($_SESSION["erroconta"] == 1){
				$_SESSION["erroconta"] = 0;
				echo "
				<script>
					alert ('o usuario informado não existe.');
				</script>
				";
			}
			else if ($_SESSION["erroconta"] == 2){
				$_SESSION["erroconta"] = 0;
				echo "
				<script>
					alert ('Este prato ja esta cadastrado.');
				</script>
				";		
			}	
			else if ($_SESSION["erroconta"] == 3){
				$_SESSION["erroconta"] = 0;
				echo "
				<script>
					alert ('algum campo esta vazio.');
				</script>
				";					
			}	
			else if ($_SESSION["erroconta"] == 4){
				$_SESSION["erroconta"] = 0;
				echo "
				<script>
					alert ('Essa imagem ja esta sendo usada para um outro produto.');
				</script>
				";					
			}
			else if ($_SESSION["erroconta"] == 5){
				$_SESSION["erroconta"] = 0;
				echo "
				<script>
					alert ('algum campo esta vazio.!');
				</script>
				";					
			}
			else if ($_SESSION["erroconta"] == 6){
				$_SESSION["erroconta"] = 0;
				echo "
				<script>
					alert ('As senhas informadas não coinsidem para serem alteradas.!');
				</script>
				";						
			}		
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
		<title>Restalrante Global(RGL)</title>

		<!-- codigo javascript e css-->
		<script language="javascript" type="text/javascript" src="../js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="../js/bootstrap.js"></script>
		<script language="javascript" type="text/javascript" src="altera.js"></script>
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
							<a class="nav-link" href="../servicos/servicos.php">Serviço</a>
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
										<a class='dropdown-item' href='#'>minha conta</a>
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
				<li data-target="#verslide" data-slide-to="2"></li>
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
		<div class="container">
			<h1 class="text-danger text-center">Minha Conta</h1>
			<?php 
				if ($_SESSION["usando"]["tipo"] == 'a'||$_SESSION["usando"]["tipo"] == 'c'){
					echo '
					<div class="row my-5">
						<div class="col-lg">
							<h2 class="text-info">
								adicionar novo prato
							</h2>
						</div>
						<div class="col-lg">
							<form class="form" method="post" action="novoproduto.php">
								<input type="text" name="nome" placeholder="nome do prato" class="form-control my-3"/>
								<input type="number" name="peso" placeholder="peso KG" class="form-control my-3" step="0.01"/>
								<input type="number" name="preco" placeholder="preco" class="form-control my-3" step="0.01"/>
								<label class="form-control mb-0 mt-3">escolha uma imagem</label>
								<input type="file" class="form-control mt-0 mb-3" name="caminho"/>						
								<label class="form-control mt-3 mb-0">
									descrição do prato com ate 500 caracteres
								</label> 
								<textarea name="descricao" class="form-control mt-0 mb-3">
								</textarea>
								<button class="btn btn-danger" type="submit">Criar</button>
							</form>
						</div>
					</div>';
				}
			?>
			<?php
				if ($_SESSION["usando"]["tipo"] == 'a'|| $_SESSION["usando"]["tipo"] == 'c'){			
					echo "
					<div class='row my-5'>
						<div class='col-lg'>
							<h2 class='text-info'>
								Lista de produtos para a venda
							</h2>					
						</div>
						";
						foreach ($lista as $dado){
							$imprime = "<div class='col-lg-4 my-3'>
								<form method='post' action='apagar.php'>
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
												<button class='btn btn-primary' type='submit' name='apagar' value=".$dado["idpratos"].">Remover da Vitrine</button>";
											}
										$imprime .="</div>
									</div>
								</form>
							</div>";
							echo $imprime;
						}				
					echo "</div>";
				}
			?>
			<div class="row my-5">
				<div class="col-lg">
					<h2 class="text-info">
						alterar dados de usuario
					</h2>
				</div>
				<div class="col-lg">
					<form class="form" method="post" action="alterar.php">
						<label class="form-control mb-0">
							Endereço
						</label>
						<input type="text" placeholder="Rua" name="rua" class="form-control my-0"/>
						<input type="number" placeholder="numero" name="numero" class="form-control my-0"/>
						<input type="text" placeholder="cidade" name="cidade" class="form-control my-0"/>
						<input type="text" placeholder="estado" name="estado" class="form-control my-0"/>
						<input type="text" placeholder="pais" name="pais" class="form-control my-0"/>
						<input type="text" placeholder="CEP" name="cep" class="form-control mb-3 mt-0"/>
						<input type="text" placeholder="celular" name="celular" class="form-control my-3"/>
						<input type="password" placeholder="Nova Senha" name="senha" class="form-control my-3"/>
						<input type="password" placeholder="Confirmar Nova Senha" name ="senha1" class="form-control my-3"/>
						<button class="btn btn-primary" type="submit" name="alterar">Alterar</button>
					</form>
				</div>				
			</div>
			<?php
				if ($_SESSION["usando"]["tipo"] == 'c'){
					echo '
						<div class="row my-5">
							<div class="col-lg">
								<h2 class="text-info">
									tornar um usuario administrador
								</h2>
							</div>
							<div class="col-lg my-5">
								<form class="form" method="post" action="tornar.php">
									<label>
										<h6 class="text-center text-warning">
											usuario administrado
										</h6>
										<p>
											é o usuario capas de adicionar novos produtos e vende-los, neste web site, ou seja 
											seria basicamente um funcionario do site Restalrante global.
										</p>
									</label>
									<input type="email" placeholder="Email de quem voçê quer torna-lo um usuario administrador" class="form-control my-3" name="email"/>
									<button class="btn btn-danger" type="submit">Tornar</button>
								</form>
							</div>

						</div>
						<div class="row my-5">
							<div class="col-lg">
								<h2 class="text-info">
									tornar um administrador usuario
								</h2>
							</div>
							<div class="col-lg my-5">
								<form class="form" method="post" action="tira.php">
									<label>
										<h6 class="text-center text-warning">
											usuario
										</h6>
										<p>
											é um usuario comum que so pode realizar comprar no site, não estando disponivel a opçõa de venter no site ou publicar produtos para venda ao contrario do administrador.
										</p>
									</label>
									<input type="email" placeholder="Email de quem voçê quer torna-lo um usuario administrador" class="form-control my-3" name="email"/>
									<button class="btn btn-danger" name="bot">Tornar</button>
								</form>
							</div>
						</div>';
					echo '
				<div class="row-lg">';
				$contador = 1;
				foreach ($pessoas as $p){

					echo '<div class="col-lg-6 bg-dark text-light ml-auto">
						<label>'.$contador.'-|  '.$p["nome"].'  </label>
						<label>-  '.$p["email"].  '|</label>
					</div>;';
					$contador++;
				}
				echo '</div>';
			}
			?>
			<h2 class="text-info text-danger text-center my-5">
				Produtos comprados e vendidos
			</h2>
			<div class="row">
				<?php
				foreach ($_SESSION["conta"] as $dados){
					$imprime =  '
					<div class="col-lg-4 mb-3 mr-3">
							<div class="card">
								<img src="../img/'.$dados['caminho'].'" class="card-img-top"/>
								<div class="card-body">
									<h1 class="card-title text-center">
										'.$dados["nome"].'
									</h1>
									<label class="text-warning">
										Preço:
									</label>
									<label class="text-info text-left">
										'.$dados["preco"].' R$
									</label>
									<br/>
									<label class="text-warning">
										peso:
									</label>
									<label class="text-info text-left">
										'.$dados["peso"].' KG
									</label>	
									<br/>
									<label class="text-warning">
										Descrição: 
									</label>
									<label class="text-info text-left">
										'.$dados["descricao"].' 
									</label>	
									<br/>
									<label class="text-warning">
										Estatus: 
									</label>
									<label  id="produto_'.$dados["idcompra"].'" class="text-info text-left dif">
										';
									if ($dados["estatus"] == 0){
										$imprime .= "ainda não foi entregue";
									}
									else if ($dados["estatus"] == 1){
										$imprime .= "em transito";
									}
									else if ($dados["estatus"] == 2){
										$imprime .= "entregue";
									}
									$imprime .=	'
									</label>
									<br/>
									<label class="text-warning">
										Endereço: 
									</label>
									<label class="text-info text-left">
										'.$dados["rua"].' - '.$dados["numero"].",".$dados["cidade"].",".$dados["estado"].",".$dados["pais"]."CEP: ".$dados["cep"].' 
									</label>	
									<br/>
									<label class="text-warning">
										quantidade: 
									</label>
									<label class="text-info text-left">
										'.$dados["quantidade"].'
									</label>																									
									<br/>';
									if ($_SESSION["usando"]["tipo"] == 'c' || $_SESSION["usando"]["tipo"] == 'a'){
										$imprime .= '<button type="submit" formaction="transito.php" class="btn btn-danger transito"  name="entrega" value="'.$dados["idcompra"].'">
											em transito
										</button>';
										$imprime .= '<button type="submit" formaction="entregue.php" class="btn btn-danger entregue" name="entrega" value="'.$dados["idcompra"].'">
											entregue
										</button>';				
									}
									if ($_SESSION["usando"]["tipo"] == 'c' || $_SESSION["usando"]["tipo"] == 'u'){
										$imprime .= '<button type="submit" class="btn btn-danger cance"  name="cancelar" value="'.$dados["idcompra"].'">
											cancelar
										</button>';
									}
								$imprime .= '</div>
							</div>
					</div>
					';	
					echo $imprime;
				}
				?>	

			</div>
			<?php
				if ($_SESSION["usando"]["tipo"] == 'c'){
					echo '
			<h2 class="text-info text-danger text-center my-5">
				Melhores produtos
			</h2>			
			<div class="row">';					
					foreach ($lista as $pro){
						$tem = true;
						foreach ($lista_num as $index){
							if ($pro["idpratos"] == $index["numero"]){	
								$tem = false;					
								$imprime = '
								<div class="col-lg-4 mb-3 mr-3">
									<form class="form" method="post" action="melhord.php">
										<div class="card">
											<img src="../img/'.$pro['caminho'].'" class="card-img-top"/>
											<div class="card-body">
												<h1 class="card-title text-center">
													'.$pro["nome"].'
												</h1>
												<label class="text-warning">
													Preço:
												</label>
												<label class="text-info text-left">
													'.$pro["preco"].' R$
												</label>
												<br/>
												<label class="text-warning">
													peso:
												</label>
												<label class="text-info text-left">
													'.$pro["peso"].' KG
												</label>	
												<br/>
												<label class="text-warning">
													Descrição: 
												</label>
												<label class="text-info text-left">
													'.$pro["descricao"].' 
												</label>	
												<br/>
												<label class="text-info text-left">
													';
												$imprime .=	'
												</label>																		
												<br/>
												<button type="submit" class="btn btn-danger"  name = "remo" value="'.$pro["idpratos"].'">
													Remover dos melhores
												</button>												
											</div>
										</div>
									</form>
								</div>
								';	
								echo $imprime;
							}
						}
						if ($tem){
							$imprime = '
							<div class="col-lg-4 mb-3 mr-3">
								<form class="form" method="post" action="melhorc.php">
									<div class="card">
										<img src="../img/'.$pro['caminho'].'" class="card-img-top"/>
										<div class="card-body">
											<h1 class="card-title text-center">
												'.$pro["nome"].'
											</h1>
											<label class="text-warning">
												Preço:
											</label>
											<label class="text-info text-left">
												'.$pro["preco"].' R$
											</label>
											<br/>
											<label class="text-warning">
												peso:
											</label>
											<label class="text-info text-left">
												'.$pro["peso"].' KG
											</label>	
											<br/>
											<label class="text-warning">
												Descrição: 
											</label>
											<label class="text-info text-left">
												'.$pro["descricao"].' 
											</label>	
											<br/>
											<label class="text-info text-left">
												';
											$imprime .=	'
											</label>																		
											<br/>
											<button type="submit" class="btn btn-danger"  name = "coloca" value="'.$pro["idpratos"].'">
												colocar nos melhores
											</button>												
										</div>
									</div>
								</form>
							</div>
							';	
							echo $imprime;
						}
					}
				}
				?>	
			</div>
		</div>
	</body>
</html>