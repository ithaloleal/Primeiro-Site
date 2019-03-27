<?php
	session_start ();
	$banco = new PDO ("mysql:host=localhost;dbname=rgl", "root", "");
	$seguro = $banco -> prepare ("select * from cadastro where email = :meu");
	$seguro -> bindValue ("meu", $_POST["email"]);
	$seguro -> execute ();

	if ($seguro -> rowCount () === 1){
		$seguro = $banco -> prepare ("update cadastro set tipo = 'u' where email = :meu");
		$seguro -> bindValue (":meu", $_POST["email"]);
		$seguro -> execute ();
		header ("location: conta.php");
		echo "correto";
	}
	else{
		$_SESSION["erroconta"] = 1;
		header ("location: conta.php");
	}
?>