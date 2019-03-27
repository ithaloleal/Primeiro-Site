<?php
	session_start ();
	$fazer = true;
	$_SESSION["erroc"] = 0;
	$banco = new PDO("mysql:host=localhost;dbname=rgl", "root", "");
	function  existe($existe1, $existe2){
		$sql = "select * from cadastro where ";
		$sql .= $existe1;
		$sql .= " = :xmeu";
		$ban = new PDO("mysql:host=localhost;dbname=rgl", "root", "");	
		$segx = $ban -> prepare ($sql);
		$segx -> bindValue (":xmeu", $existe2);
		$segx -> execute ();
		if ($segx -> rowCount () === 0){
			return false;
		}
		else{
			return true;
		}
	}


	if (empty ($_POST["email"]) || empty ($_POST["nome"])||empty ($_POST["sobrenome"])||empty ($_POST["nascimento"])||empty ($_POST["cpf"])||empty ($_POST["rua"])||empty ($_POST["numero"])||empty ($_POST["cidade"])||empty ($_POST["estado"])||empty ($_POST["pais"])||empty ($_POST["cep"])||empty ($_POST["rg"])||empty ($_POST["sexo"])||empty ($_POST["celular"])||empty ($_POST["senha"])||empty ($_POST["senha1"])){
		$_SESSION["erroc"] = 5;
		$fazer = false;			
		header ("location: cadastro.php");
	}
	else if ($_POST["senha"] != $_POST["senha1"]){
		$_SESSION["erroc"] = 6;
		$fazer = false;			
		header ("location: cadastro.php");
	}
	else if (existe ("email", $_POST["email"])){
		$_SESSION["erroc"] = 1;
		$fazer = false;			
		header ("location: cadastro.php");
	}
	else if (existe ("cpf", $_POST["cpf"])){
		$_SESSION["erroc"] = 2;
		$fazer = false;			
		header ("location: cadastro.php");
	}

	else if (existe ("rg", $_POST["rg"])){
		$_SESSION["erroc"] = 3;
		$fazer = false;			
		header ("location: cadastro.php");
	}
	else if (existe ("celular", $_POST["celular"])){
		$_SESSION["erroc"] = 4;
		$fazer = false;			
		header ("location: cadastro.php");
	}
	if ($fazer){
		$seguro = $banco -> prepare ("insert into cadastro (email, nome, nascimento, cpf, rua, numero, cidade, estado, pais, cep, rg, sexo, celular, senha) values
			(:email, :nome, :nascimento, :cpf, :rua, :numero, :cidade, :estado, :pais, :cep, :rg, :sexo, :celular, :senha)");

		$seguro -> bindValue (":email",$_POST["email"]);
		$seguro -> bindValue (":nome",$_POST["nome"].$_POST["sobrenome"]);
		$seguro -> bindValue (":nascimento",$_POST["nascimento"]);
		$seguro -> bindValue (":cpf", $_POST["cpf"]);
		$seguro -> bindValue (":rua", $_POST["rua"]);
		$seguro -> bindValue (":numero",$_POST["numero"]);
		$seguro -> bindValue (":cidade", $_POST["cidade"]);
		$seguro -> bindValue (":estado",$_POST["estado"]);
		$seguro -> bindValue (":pais",$_POST["pais"]);
		$seguro -> bindValue (":cep",$_POST["cep"]);
		$seguro -> bindValue (":rg",$_POST["rg"]);
		$seguro -> bindValue (":sexo", $_POST["sexo"]);
		$seguro -> bindValue (":celular",$_POST["celular"]);
		$seguro -> bindvalue (":senha", $_POST["senha"]);
		$seguro -> execute ();
		header ("location: ../index.php");
	}
?>