<?php 

    include_once "../model/usuarios.php";

	session_start();

	if($_POST){
		
		$nome = $_POST["nome"];
		$cep = $_POST["cep"];
		$telefone = $_POST["telefone"];
		$email = $_POST["email"];
		$cpf = $_POST["cpf"];
		$endereco = $_POST["endereco"];
		$telefoneAlternativo = $_POST["telefonealternativo"];
		$numero = $_POST["numero"];
		$celular = $_POST["celular"];
		$datadenascimento = $_POST["datadenascimento"];
		$complemento = $_POST["complemento"];
		$bairro = $_POST["bairro"];
		$cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $id = isset($_SESSION["IdUsuario"]) ? $_SESSION["IdUsuario"] : "";
        
        $usuario = Usuarios::updateConta($nome, $cpf, $datadenascimento, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $estado, $telefone, $telefoneAlternativo, $celular, $email, $id);


		header("Location: ../view/minhaConta.php");
       
	}