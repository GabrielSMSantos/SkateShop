<?php
	session_start();

	if($_GET){
		$idProduto = $_GET["id"];
		$quantidade = $_GET["qnt"];
		$acao = $_GET["acao"];

			if($acao == "incremento"){
				$_SESSION["quantidadeProduto"][$idProduto] = $quantidade + 1;
			}
			else{
				$_SESSION["quantidadeProduto"][$idProduto] = $quantidade - 1;

				if($_SESSION["quantidadeProduto"][$idProduto] == 0){
					$idProdutoExcluir = array_search($idProduto, $_SESSION["produtoCarrinhos"]);
					unset($_SESSION["produtoCarrinhos"][$idProdutoExcluir]);
					unset($_SESSION["quantidadeProduto"][$idProduto]);
				}
			}	
	
		header("location: ../view/carrinho.php");

	}