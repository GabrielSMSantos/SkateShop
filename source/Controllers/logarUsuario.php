<?php 

    include_once "../model/usuarios.php";
    session_start();

    if($_POST){
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);

        $user = Usuarios::logar($email,$senha);

        var_dump($user);

        if(Usuarios::$quantLinhas){
            $_SESSION["Logado"] = true;

          
            $_SESSION["IdUsuario"] = $user["id"];
            $_SESSION["NomeUsuario"] = $user["nome"];
            $_SESSION["Permicao"] = $user["permicao"];
         

            header("Location: ../index.php");
        }else{
            
            header("Location: ../view/login.php");
        }
    }
