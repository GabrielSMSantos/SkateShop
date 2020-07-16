<?php
      session_start();                 
    //   include_once "../model/conexao.php";

      if(isset($_GET["id"])){// INSERINDO PRODUTO NO CARRINHO
        $idProduto = $_GET["id"];
        $quantidade =  $_POST["qnt"];
        $tamanho = $_POST["tamanhoProduto"];

        if(!isset($_SESSION["produtoCarrinhos"]) || !in_array($idProduto, $_SESSION["produtoCarrinhos"])){

            $_SESSION["produtoCarrinhos"][] = $idProduto;
            $_SESSION["quantidadeProduto"][$idProduto] = $quantidade;
            $_SESSION["tamanhoProduto"][$idProduto] = $tamanho;

            header("location: ../view/carrinho.php");

        }else{

            $_SESSION["quantidadeProduto"][$idProduto] += $quantidade;
            
            header("location: ../view/carrinho.php");
        }


       
      }


      if(isset($_GET["excluir"])){
          $id = $_GET["excluir"];
          $idProdutoCarrinho = array_search($id, $_SESSION["produtoCarrinhos"]);
          unset($_SESSION["produtoCarrinhos"][$idProdutoCarrinho]);
          unset($_SESSION["quantidadeProduto"][$id]);

          header("location: ../view/carrinho.php");
      }

?>