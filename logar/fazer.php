<?php
	session_start ();
	header('Content-Type: text/html; charset=utf-8');	
	$banco = new PDO ("mysql:host=localhost;dbname=rgl;charset=utf8", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$preparar = $banco -> prepare ("select * from cadastro where email = :dado");
	$preparar -> bindValue (":dado", $_POST["email"]);
	$preparar -> execute ();

	$linha = $preparar -> fetch (PDO::FETCH_ASSOC);


	if ($preparar -> rowCount () == 1){
		$preparar = $banco -> prepare ("select * from cadastro where senha=:sen");
		$preparar -> bindValue (":sen", $_POST["senha"]);
		$preparar -> execute ();

		if ($preparar -> rowCount () >= 1){
			$_SESSION["erro"] = 0;
			$_SESSION["usando"] = $linha;
			header ("location: ../index.php");			
		}
		else{
			header ("location: entrar.php");
			$_SESSION["erro"] = 2;								
		}
	}
	else{
		$_SESSION["erro"] = 1;		
		header ("location: entrar.php");
	}
?>