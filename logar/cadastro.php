<!--
	ação da pagina: primeira pagina do restalrante global(RGL)
	data:19/02/2019
	Criador: Rodrigo Madrona de Jesus
-->

<!-- codigo php -->

<?php
	session_start ();
	if (isset ($_SESSION["erroc"])){
		if ($_SESSION["erroc"] == 1){
			echo "<script>
				alert ('O email informado ja esta cadastrado');
			</script>";
			$_SESSION["erroc"] = 0;
		}
		else if ($_SESSION["erroc"] == 2){
			echo "<script>
				alert ('O cpf infomado ja esta cadastrado');
			</script>";	
			$_SESSION["erroc"] = 0;		
		}
		else if ($_SESSION["erroc"] == 3){
			echo "<script>
				alert ('O RG infomado ja esta cadastrado');
			</script>";	
			$_SESSION["erroc"] = 0;					
		}		
		else if ($_SESSION["erroc"] == 4){
			echo "<script>
				alert ('O Numero de celular informado ja esta cadastrado');
			</script>";	
			$_SESSION["erroc"] = 0;					
		}
		else if ($_SESSION["erroc"] == 5){
			echo "<script>
				alert ('Algum campo esta vazio');
			</script>";				
			$_SESSION["erroc"] = 0;			
		}	
		else if ($_SESSION["erroc"] == 6){
			echo "<script>
				alert ('Os campos de senha estão diferentes');
			</script>";				
			$_SESSION["erroc"] = 0;			
		}			
	}

	session_destroy ();
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
		<script language="javascript" type="text/javascript" src="cadastro.js"></script>		
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

					<ul class='navbar-nav ml-auto'>
						<li class='nav-item dropdown'>
							<a class='nav-link dropdown-toggle' href='#'' data-toggle='dropdown' id='navDrop'>
								Logar
							</a>
							<div class='dropdown-menu'>
								<a class='dropdown-item' href='entrar.php'>Entrar</a>
								<a class='dropdown-item' href='cadastro.php'>Cadastrar-se</a>								
							</div>
						</li>
					</ul>
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
		<div class="container my-5">
			<div class="row md-3">
				<div class="col-sm-8 text-center">
					<h1 class="display-3 text-center text-info">Cadastro de Usuario</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<form class="form" method="POST" id="cadastro" action="completo.php">
						<input type="email" class="form-control my-3" name="email" placeholder="Email" id="ent1"/>
						<input type="text" class="form-control my-3" name="nome" placeholder="Nome" id="ent2"/>	
						<input type="text" class="form-control my-3" name="sobrenome" placeholder="Sobrenome" id="ent3" />
						<label class="form-control mt-3 mb-0">nascimento: </label>
						<input type="date" class="form-control mb-3" name="nascimento" id="ent4"/>
						<input type="text" class="form-control cpf-mask my-3"  name="cpf" placeholder="CPF" id="ent5"/>
						<input type="text" class="form-control my-3" name="rua" placeholder="rua" id="ent6"/>
						<input type="text" class="form-control my-3" name="numero" placeholder="numero" id="ent7"/>	
						<input type="text" class="form-control my-3" name="cidade" placeholder="cidade" id="ent8"/>
						<input type="text" class="form-control my-3" name="estado" placeholder="estado" id="ent9"/>
						<input type="text" class="form-control my-3" name="pais" placeholder="pais" id="ent10"/>
						<input type="text" class="form-control my-3" name="cep" placeholder="CEP" id="ent11"/>
						<input type="text" class="form-control my-3" name="rg"	placeholder="RG" id="ent12"/>
						<select name="sexo" class="form-control my-3" id="ent13">
							<option value="m">Masculino</option>
							<option value = "f">Feminino</option>
						</select>	
						<input type="tel" class="form-control my-3" name="celular" placeholder="Celular"/>
						<input type="password" name="senha" class="form-control my-3" placeholder="Senha"/>
						<input type="password" name="senha1" class="form-control my-3" placeholder="Confirmar Senha"/>		
						<br/>
						<button type="submit" class="btn btn-primary ml-auto my-3" name="Enviar Cadastro" id="enviar">
							Enviar Cadastro
						</button>		
					</form>
				</div>
			</div>
		</div>
	</body>
</html>