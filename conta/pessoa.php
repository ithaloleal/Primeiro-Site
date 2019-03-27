<?php
	$caracter = 'a';
	$bd = new PDO ("mysql:host=localhost;dbname=rgl;charset=utf8", "root", "");
	$sbd = $bd -> prepare ("select * from cadastro where tipo =:meu ");
	$sbd -> bindValue (":meu", $caracter);
	$sbd -> execute ();

	$pessoas = [];
	while ($linha = $sbd -> fetch (PDO::FETCH_ASSOC)){
		$pessoas[] = $linha;
	}
?>