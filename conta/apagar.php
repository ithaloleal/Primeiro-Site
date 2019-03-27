<?php
	session_start ();
	$banco = new PDO ("mysql:host=localhost;dbname=rgl;charset=utf8", "root", "");
	$seguro = $banco -> prepare ("delete from pratos where idpratos =:id");
	$seguro -> bindValue (":id", $_POST["apagar"]);
	$seguro -> execute ();	
	header ("location: ../conta/conta.php");
?>