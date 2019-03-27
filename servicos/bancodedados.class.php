<?php
	header('Content-Type: text/html; charset=utf-8');	
	$banco = new PDO ("mysql:host=localhost;dbname=rgl;charset=utf8", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$lista = [];
	$preparar = $banco -> prepare ("select * from pratos");
	$preparar -> execute ();

	while ($linha = $preparar -> fetch (PDO::FETCH_ASSOC)){
		$lista[] = $linha;
	}
?>