<?php
	session_start ();
	$fazer = true;
	header('Content-Type: text/html; charset=utf-8');	
	$banco = new PDO ("mysql:host=localhost;dbname=rgl;charset=utf8", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));	

	$seguro = $banco -> prepare ("select * from pratos where nome=:meu");
	$seguro -> bindValue (":meu", $_POST["nome"]);
	$seguro -> execute ();

	$valor = $seguro -> rowCount ();

	$seguro = $banco -> prepare ("select  * from pratos where caminho=:seu");
	$seguro -> bindValue (":seu", $_POST["caminho"]);
	$seguro -> execute ();

	if ( $valor>=1){
		$_SESSION["erroconta"] = 2;
		$fazer  = false;
		header ("location: conta.php");
	}
	else if (empty ($_POST["nome"]) || empty ($_POST["peso"]) || empty ($_POST["preco"]) || empty ($_POST["caminho"]) || empty ($_POST["descricao"])){
		$_SESSION["erroconta"] = 3;
		$fazer = false;
		header ("location: conta.php");
	}
	else if ($seguro -> rowCount ()){
		$_SESSION["erroconta"] = 4;
		$fazer = false;
		header ("location: conta.php");
	}
	if ($fazer){
		$seguro  = $banco -> prepare ("insert into pratos (nome, peso, preco,descricao, caminho)values (:nome, :peso, :preco, :descricao, :caminho)");
		$seguro -> bindValue (":nome", $_POST["nome"]);
		$seguro -> bindValue (":peso", $_POST["peso"]);
		$seguro -> bindValue (":preco", $_POST["preco"]);	
		$seguro -> bindValue (":descricao", $_POST["descricao"]);
		$seguro -> bindValue (":caminho", $_POST["caminho"]);	
		$seguro -> execute ();	
		header ("location: conta.php");
	}
?>