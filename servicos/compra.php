<?php
	session_start ();
	$banco = new PDO ("mysql:host=localhost;dbname=rgl;charset=utf8", "root", "");
	$fazer = true;
	if (empty ($_POST["quantidade"]) && $_POST["quantidade"]<=0){
		$_SESSION["erroconta"] = 7;
		$fazer = false;
		header ("location: servicos.php");
	}
	if ($fazer){
		$seguro = $banco -> prepare ("insert into compras (idpra, idcada, quantidade, total, estatus) values (:idpra, :idcada, :quantidade, :total, :estatus)");
		$seguro -> bindValue (":idpra", $_POST["comprar"]);
		$seguro -> bindValue (":idcada", $_SESSION["usando"]["idcadastro"]);
		$seguro -> bindValue (":quantidade", $_POST["quantidade"]);
		$seguro -> bindValue (":total", $_POST["quantidade"]);	
		$seguro -> bindValue (":estatus", 0);
		$seguro -> execute ();	
		header ("location: ../conta/conta.php");
	}

?>