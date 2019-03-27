<?php
	session_start ();
	$fazer = true;
	$banco = new PDO("mysql:host=localhost;dbname=rgl;charset=utf8", "root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	if (empty ($_POST["rua"])||empty ($_POST["numero"])||empty ($_POST["cidade"])||empty ($_POST["estado"])||empty ($_POST["pais"])||empty ($_POST["cep"]) ||empty ($_POST["celular"]) || empty ($_POST["senha"]) || empty ($_POST["senha1"])){
		$_SESSION["erroconta"] = 5;
		$fazer = false;		
		header ("location: conta.php");
	}
	else if ($_POST["senha"] != $_POST["senha1"]){
		$_SESSION["erroconta"] = 6;
		$fazer = false;
		header ("location: conta.php");
	}
	if ($fazer){
		$seguro = $banco -> prepare ("update cadastro set rua =:rua, numero = :numero, cidade =:cidade, estado=:estado, pais =:pais,cep =:cep, celular =:celular, senha =:senha where idcadastro=:id");
		$seguro -> bindValue (":id", $_SESSION["usando"]["idcadastro"]);
		$seguro -> bindValue (":rua", $_POST["rua"]);
		$seguro -> bindValue (":numero", $_POST["numero"]);
		$seguro -> bindValue (":cidade", $_POST["cidade"]);
		$seguro -> bindValue (":estado", $_POST["estado"]);
		$seguro -> bindValue (":pais", $_POST["pais"]);
		$seguro -> bindValue (":cep", $_POST["cep"]);
		$seguro -> bindValue (":celular", $_POST["celular"]);
		$seguro -> bindValue (":senha", $_POST["senha"]);	
		$seguro -> execute ();
	}
?>	