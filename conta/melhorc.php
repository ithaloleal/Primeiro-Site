<?php
	$conjunto = new PDO ("mysql:host=localhost;dbname=rgl;charset=utf8","root","");
	$seguro = $conjunto -> prepare ("insert into melhor (numero) values (:novo)");
	$seguro -> bindValue (":novo", $_POST["coloca"]);
	$seguro -> execute ();
	header ("location: conta.php");
?>