<?php
	$bd = new PDO("mysql:host=localhost;dbname=rgl;charset=utf8", "root","");
	$sbd= $bd -> prepare ("update compras set estatus = 1 where idcompra = :meu");
	$sbd -> bindValue (":meu", $_POST["entrega"]);
	$sbd -> execute ();
	echo "em transito";
?>