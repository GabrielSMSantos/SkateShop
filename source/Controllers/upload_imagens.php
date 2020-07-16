<?php 
		set_time_limit(0);

		include "config_upload.php";
		include "../model/produtos.php";

		$nome_arquivo = $_FILES['imagem']['name'];
		$tamanho_arquivo = $_FILES['imagem']['size'];
		$arquivo_temporario = $_FILES['imagem']['tmp_name'];

		if (!empty($nome_arquivo)) {
				
				if ($sobrescrever == "não" && file_exists("$caminho_absoluto/$nome_arquivo")) {
						die("Arquivo já existe");
				}

				if (($limitar_tamanho == "sim") && ($tamanho_arquivo > $tamanho_bytes)) {
						die("Arquivo deve ter no máximo $tamanho_bytes bytes.");
				}

				$ext = strrchr($nome_arquivo, ".");

				if($limitar_ext == "sim" && !in_array($ext, $extensoes_validas)){
					die("Extensão de arquivo invalida para upload.");
				}

				if (move_uploaded_file($arquivo_temporario, "$caminho_absoluto/$nome_arquivo")) {
					$erro = 0;
				}

				else {
					$erro = 2;
				}

		}
		else{
			// header("location: ../configuracoes.php?erro=1");
		}

		session_start();

		$nomeProduto = $_POST["nomeProduto"];
		$precoProduto = str_replace(",",".", $_POST["precoProduto"]);;
		$corProduto = $_POST["corProduto"];
		$tamanhoProduto = $_POST["tamanhoProduto"];
		$categoriaProduto = $_POST["categoriaProduto"];
		$subCategoria = $_POST["subCategoria"];
		$marcaProduto = $_POST["marcaProduto"];
		$modeloProduto = $_POST["modeloProduto"];
		$generoProduto = $_POST["generoProduto"];
		$descricaoProduto = $_POST["descricaoProduto"];
		$promocao = isset($_POST["promocao"]) ? str_replace(",", ".", $_POST["promocao"]) : "";
		$id = $_SESSION["idProduto"];

		echo $precoProduto."   ";


		if($corProduto != ""){
			if($corProduto == "Preto"){
				$corProduto = "000";
			}
			else if($corProduto == "Branco"){
				$corProduto = "fff";
			}
			else if($corProduto == "Vermelho"){
				$corProduto = "ed1c24";
			}
			else if($corProduto == "Verde"){
				$corProduto = "00B04E";
			}
			else if($corProduto == "Amarelo"){
				$corProduto = "FFFC00";
			}
			else if($corProduto == "Laranja"){
				$corProduto = "FFA200";
			}
			else if($corProduto == "Azul"){
				$corProduto = "2162EB";
			}
		}


		try{
			

			$novoCaminho = str_replace("../", "", $caminho_absoluto);


			$imagemInserida = $novoCaminho.$nome_arquivo;

			
			
			if ($imagemInserida == "media/images/produtos/") {
					$imagemInserida	= isset($_SESSION["imagemProduto"]) ? $_SESSION["imagemProduto"] : "";
			}

			
			


			if (isset($_GET["acao"])) {// CASO O ADM EDITE O PRODUTO IRA CAIR AQUI

					$produto = Produtos::updateProduto($nomeProduto,$precoProduto,$corProduto,$tamanho_arquivo,$categoriaProduto,$subCategoria,$marcaProduto,$modeloProduto,$generoProduto,$imagemInserida,$descricaoProduto,$promocao,$id);

                    echo $produto;
					
					if($produto > 0){

					    header("location: ../view/produtos.php?categoria=Roupas");

					}else{
						//header("location: ../view/editarProduto.php?acao=Editar&id=".$id."&resposta=Erro");
					}
					
			}else{

				if ($imagemInserida != "") {
					
					$produto = Produtos::cadastrarProduto($nomeProduto,$precoProduto,$corProduto,$tamanho_arquivo,$categoriaProduto,$subCategoria,$marcaProduto,$modeloProduto,$generoProduto,$imagemInserida,$descricaoProduto);

					if ($produto) {
							header("location: ../view/configuracoes.php");

					}
				}else{
					header("location: ../view/configuracoes.php");
				}
				
			}
			
		}catch(PDOException $e){
			echo "ERROR: " .$e->getMessage();
		}
		
	?>