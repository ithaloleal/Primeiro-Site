<?php
	echo $_GET["cancelar"];
	$banco = new PDO ("mysql:host=localhost;dbname=rgl", "root", "");
	$seguro = $banco -> prepare ("delete from compras where idcompra = :id");
	$seguro -> bindValue (":id", $_GET["cancelar"]);
	$seguro -> execute ();

	header ("location: conta.php");
?>