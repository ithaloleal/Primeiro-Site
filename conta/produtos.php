<?php
	header('Content-Type: text/html; charset=utf-8');	
	$banco = new PDO ("mysql:host=localhost;dbname=rgl;charset=utf8", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$seguro = $banco -> prepare ("select * from  compras inner join cadastro
on compras.idcada = cadastro.idcadastro inner join pratos
on compras.idpra = pratos.idpratos");
	$seguro -> execute ();

	$junto = [];

	while ($linha = $seguro -> fetch (PDO::FETCH_ASSOC)){
		$junto[] = $linha;
	}
	$_SESSION["conta"] = $junto;
?>