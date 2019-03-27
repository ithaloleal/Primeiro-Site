<?php
	$conjunto = new PDO ("mysql:host=localhost;dbname=rgl;charset=utf8","root","");
	$seguro = $conjunto -> prepare ("delete from melhor where numero=:novo");
	$seguro -> bindValue (":novo", $_POST["remo"]);
	$seguro -> execute ();
	header ("location: conta.php");
?>