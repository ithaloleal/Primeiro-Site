<?php
	$lista_num = [];
	$dados = new PDO ("mysql:host=localhost;dbname=rgl;charset=utf8","root","");
	$seguro = $dados -> prepare ("select * from melhor");
	$seguro -> execute ();

	while ($linha = $seguro -> fetch (PDO::FETCH_ASSOC)){
		$lista_num[] = $linha;
	}
?>