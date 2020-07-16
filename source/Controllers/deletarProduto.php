<?php

include_once "../model/produtos.php";

if($_GET){
    if($_GET["acao"] == "Deletar"){
        $id = $_GET["id"];
        $produto = Produtos::deletarProduto($id);

        if($produto){
            header("Location: ../view/produtos.php");
        }
        
    }else{
        header("Location: ../view/produtos.php");
    }
}

