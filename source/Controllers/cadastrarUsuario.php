<?php

include_once "../model/usuarios.php";

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
    $dataNascimento = $_POST["datadenascimento"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $senha = $_POST["senha"];

    $usuario = Usuarios::cadastrarUsuario($nome, $cpf, $dataNascimento, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $estado, $telefone, $telefoneAlternativo, $celular, $email, $senha);

    if($usuario > 0){
        header("Location: ../view/cadastro.php");
    }
    
}