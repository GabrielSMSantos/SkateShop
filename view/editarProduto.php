

<!DOCTYPE html>
<html>
<?php session_start(); include_once "../model/produtos.php";
	$_SESSION["idProduto"] = $_GET["id"];
	$produto = Produtos::detalhesProduto($_SESSION["idProduto"]);
	$_SESSION["imagemProduto"] = $produto["imagem"];
?>


<head>
	<title>Editar Produto</title>
	<link rel="stylesheet" type="text/css" href="css/editarProduto.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+Bhai">
	<link rel="stylesheet" href="../bootstrap/bootstrap.css" type="text/css">
</head>

<body style="background: #F0F0F0;">
	<!-- MODAL PARA EDITAR O PRODUTO -->
                                                   
	<main id="conteudo">


	<h1 class="modal-title" id="exampleModalLabel">Editar Produto</h1>



	<form method="post" action="../source/controler/upload_imagens.php?acao=editar" enctype="multipart/form-data">




	<table class="table">
	<tbody>
	<tr>
	<th scope="row">
		 <label for="nomeProduto" class="col-form-label">Nome Produto:	<br>
			 <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" value="<?php echo $produto["nomeProduto"]; ?>">
		 </label>
	</th>
	<td> 
		<label for="precoProduto" class="col-form-label">Preço: <br>
			 <input type="text" class="form-control" id="precoProduto" name="precoProduto" value="<?php echo number_format($produto["preco"],2,",","."); ?>">
		</label>	
	</td>
	<td>
			 <label for="corProduto" class="col-form-label">Cor: <br>
	           <select id="corProduto" name="corProduto" class="drop">
	            <option value="Preto" <?php if($produto["cor"] == "000"){ echo "selected";} ?> >Preto</option>
	            <option value="Branco" <?php if($produto["cor"] == "fff"){ echo "selected";} ?>>Branco</option>
	            <option value="Vermelho" <?php if($produto["cor"] == "ed1c24"){ echo "selected";} ?>>Vermelho</option>
	            <option value="Verde" <?php if($produto["cor"] == "00B04E"){ echo "selected";} ?>>Verde</option>
	            <option value="Amarelo" <?php if($produto["cor"] == "FFFC00"){ echo "selected";} ?>>Amarelo</option>
              <option value="Laranja" <?php if($produto["cor"] == "FFA200"){ echo "selected";} ?>>Laranja</option>
	            <option value="Azul" <?php if($produto["cor"] == "2162EB"){ echo "selected";} ?>>Azul</option>
	          </select>
	     </label>	
	</td>

	<td >
			<label for="categoriaProduto" class="col-form-label">Categoria: <br>
	        <select onchange="turnInput()" id="categoriaProduto" name="categoriaProduto" class="drop">
	          <option value="Roupas" <?php  if($produto["categoria"] == "Roupas"){ echo "selected";} ?> >Roupas</option>
              <option value="Calcados" <?php  if($produto["categoria"] == "Calcados"){ echo "selected";} ?> >Calçados</option>
              <option value="Acessorios" <?php  if($produto["categoria"] == "Acessorios"){ echo "selected";} ?>>Acessórios</option>	
	        </select>
	       </label>
	</td>
	</tr>
	<tr>
	<th id="checkTamanho" scope="row">
			 <label for="tamanho" class="col-form-label">Tamanho: <br>
	     	 <select id="tamanho" class="<?php echo $produto["tamanho"]; ?>" name="tamanhoProduto">
	           <option value="P">P</option>
	           <option value="M">M</option>
	           <option value="G">G</option>
	           <option value="GG">GG</option>
	         </select>  
	      </label>
	</th>

	<td id="subCate">
			<label for="subCategoria" class="col-form-label">Sub Categoria: <br>
	           <select id="subCategoria" class="<?php echo $produto["subCategoria"]; ?>" name="subCategoria" class="drop">
	            <option value="Camiseta">Camiseta</option>
	            <option value="Camisa">Camisa</option>
	            <option value="Calca">Calça</option>
	            <option value="Moletom">Moletom</option>
	            <option value="Jaqueta">Jaqueta</option>
	            <option value="Bermuda">Bermuda</option>
	          </select>

	       </label>  
	</td>
	<td id="checkMarca">
			<label for="marcaProduto" class="col-form-label">Marca: <br>
			      <select id="marcaProduto" class="<?php echo $produto["marca"]; ?>" name="marcaProduto" class="drop">
              <option value="Grizzly">Grizzly</option>
			        <option value="High">High</option>
			        <option value="Diamond">Diamond</option>
			        <option value="DGK">DGK</option>
			        <option value="Stussy">Stussy</option>
			        <option value="Supra">Supra</option>
			        <option value="Primitive">Primitive</option>
			        <option value="Huf">Huf</option>
			      </select>

			 </label>
		   
	</td>

	<td>
		 <label for="generoProduto" class="col-form-label">Gênero: <br>
	       <select id="generoProduto" name="generoProduto" class="drop">
	        <option value="Masculino" <?php if($produto["genero"] == "Masculino"){echo "selected";} ?>>Masculino</option>
	        <option value="Feminino" <?php if($produto["genero"] == "Feminino"){echo "selected";} ?>>Feminino</option>
	      </select>
	     </label>

	</td>
	</tr>

	<tr>
	<th scope="row">

	  <label for="rmodeloProduto" class="col-form-label">Modelo: <br>
	 		 <input type="text" class="form-control" id="modeloProduto" name="modeloProduto" value="<?php echo $produto["modelo"]; ?>">
	  </label>

	</th>

	<td style="padding: 48px 0px;">
			 <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

			   <input type="file" name="imagem">
	</td>
	<td>
		
		 <label for="message-text" class="col-form-label">Message: <br>
		<textarea class="form-control" id="message-text" name="descricaoProduto"><?php echo $produto["nomeProduto"]; ?></textarea>
	 </label>

	</td>
	</tr>
  <tr>
    <td>
      <label for="promocao" class="col-form-label">Promoção</label><br>
      <input id="promocao" type="text" name="promocao" value="<?php echo $produto["promocao"]; ?>">
    </td>
  </tr>

	<tr>
	<th scope="row">
			 <button type="submit" class="btn btn-primary btn-block float-right">Editar</button>
	</th>

	<td></td>
	<td></td>


	<td>
			  <a href="produtos.php" type="button" class="btn btn-secondary btn-block" data-dismiss="modal" style="color: #fff">Cancelar</a>
	</td>

	</tr>
	</tbody>
	</table>


	</form>
	</main>
		<script src="../jq/jquery-3.3.1.min.js" type="text/javascript"></script>

		<script src="../jq/jquery.mask.js" type="text/javascript"></script>

        <script src="../bootstrap/bootstrap.js" type="text/javascript"></script>

		<script type="text/javascript">
			$(document).ready(function(){
        		$("#precoProduto").mask("000.000,00", {reverse: true});
				$("#promocao").mask("000.000,00", {reverse: true});

				turnInput();
			});


            function turnInput(){// FUNCAO CHAMADA QUANDO CHECKBOX É ALTERADO

              // OUTROS CHECKBOX SERÃO ALTERADOS EM RELAÇÃO A CATEGORIA DO PRODUTO


                /* VERIFICAÇÃO DO TIPO DE PRODUTO A SER CADASTRADO E MUDANDO
                   OS CAMPOS DE CADASTRO.
                */
                if($("#categoriaProduto").val() == "Roupas"){

                      // SUB CATEGORIA
                      $("#subCategoria").find("option").each(function(){ // EXCLUINDO ELEMENTOS PARA ADICIONAR OPÇÕES REFERENTE A CATEGORIA
                          $(this).remove();
                      });

                      var subCategoria = $("#subCate").find("#subCategoria").attr("class");

                      if(subCategoria == "Camiseta"){
                      		 $("#subCategoria").append("<option value='Camiseta' selected>Camiseta</option>");
                      }else{
                      		 $("#subCategoria").append("<option value='Camiseta'>Camiseta</option>");
                      }

                      if(subCategoria == "Camisa"){
                      		 $("#subCategoria").append("<option value='Camisa' selected>Camisa</option>");
                      }else{
                      		 $("#subCategoria").append("<option value='Camisa'>Camisa</option>");
                      }

                      if(subCategoria == "Calça"){
                      		 $("#subCategoria").append("<option value='Calça' selected>Calça</option>");
                      }else{
                      		$("#subCategoria").append("<option value='Calça'>Calça</option>");
                      }


                      if(subCategoria == "Moletom"){
                      		$("#subCategoria").append("<option value='Moletom' selected>Moletom</option>");
                      }else{
                      		$("#subCategoria").append("<option value='Moletom'>Moletom</option>");
                      }

                      if(subCategoria == "Jaqueta"){
                      		$("#subCategoria").append("<option value='Jaqueta' selected>Jaqueta</option>");
                      }else{
                      		$("#subCategoria").append("<option value='Jaqueta'>Jaqueta</option>");
                      }

                      if(subCategoria == "Bermuda"){
                      		$("#subCategoria").append("<option value='Bermuda' selected>Bermuda</option>");
                      }else{
                      		$("#subCategoria").append("<option value='Bermuda'>Bermuda</option>");
                      }



                      // Marca
                      $("#marcaProduto").find("option").each(function(){
                          $(this).remove();
                      });

                      var marca = $("#checkMarca").find("#marcaProduto").attr("class");

                      if(marca == "Grizzly"){
                      		$("#marcaProduto").append("<option value='Grizzly' selected>Grizzly</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Grizzly'>Grizzly</option>");
                      }

                      if(marca == "High"){
                          $("#marcaProduto").append("<option value='High' selected>High</option>");
                      }else{
                          $("#marcaProduto").append("<option value='High'>High</option>");
                      }

                      if(marca == "Diamond"){
                      		$("#marcaProduto").append("<option value='Diamond'>Diamond</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Diamond'>Diamond</option>");
                      }

                      if(marca == "DGK"){
                      		$("#marcaProduto").append("<option value='DGK' selected>DGK</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='DGK'>DGK</option>");
                      }

                      if(marca == "Stussy"){
                      		$("#marcaProduto").append("<option value='Stussy' selected>Stussy</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Stussy'>Stussy</option>");
                      }

                      if(marca == "Supra"){
                      		$("#marcaProduto").append("<option value='Supra'>Supra</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Supra'>Supra</option>");
                      }

                      if(marca == "Primitive"){
                      		$("#marcaProduto").append("<option value='Primitive' selected>Primitive</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Primitive'>Primitive</option>");
                      }

                      if(marca == "Huf"){
                      		$("#marcaProduto").append("<option value='Huf' selected>Huf</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Huf'>Huf</option>");
                      }

                      
                      

                       // TAMANHO
                      $("#tamanho").find("option").each(function(){
                          $(this).remove();
                      });
                      
					// ARMAZENANDO O TAMANHO DO PRODUTO EM UMA VARIAVEL PARA FAZER A VERIFICAÇÃO SE O TAMANHO SE ENCONTRA NO CHECKBOX E DEIXAR SELECIONADO                      
                      var TamanhoProduto = $("#tamanho").attr("class");

                      if(TamanhoProduto == "P"){
                  		 	$("#tamanho").append("<option value='P' selected>P</option>");

                      }else{
                      		$("#tamanho").append("<option value='P'>P</option>");
                      }

                      if(TamanhoProduto == "M"){
                      		$("#tamanho").append("<option value='M' selected>M</option>");

                      }else{
                      		$("#tamanho").append("<option value='M'>M</option>");
                      }

                      if(TamanhoProduto == "G"){
                      		$("#tamanho").append("<option value='G' selected>G</option>");

                      }else{
                      		$("#tamanho").append("<option value='G'>G</option>");
                      }

                       if(TamanhoProduto == "GG"){
                      		$("#tamanho").append("<option value='GG' selected>GG</option>");
                      		
                      }else{
                      		$("#tamanho").append("<option value='GG'>GG</option>");
                      }
                      
                      
                      
                    
                }
                else if($("#categoriaProduto").val() == "Calcados"){

                      $("#subCategoria").find("option").each(function(){ // EXCLUINDO ELEMENTOS PARA ADICIONAR OPÇÕES REFERENTE A CATEGORIA
                          $(this).remove();
                      });

                      // ADICIONANDO OPÇÕES NO CHECKBOX
                      $("#subCategoria").append("<option value='Tênis'>Tênis</option>");


                      // marcaProduto
                      $("#marcaProduto").find("option").each(function(){
                          $(this).remove();
                      });

                      var marca = $("#checkMarca").find("#marcaProduto").attr("class");

                      if(marca == "Nike"){
                      		$("#marcaProduto").append("<option value='Nike' selected>Nike</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Nike'>Nike</option>");
                      }

                      if(marca == "Adidas"){
                      		$("#marcaProduto").append("<option value='Adidas' selected>Adidas</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Adidas'>Adidas</option>");
                      }

                      if(marca == "Puma"){
                      		$("#marcaProduto").append("<option value='Puma' selected>Puma</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Puma'>Puma</option>");
                      }

                      if(marca == "Supra"){
                      		$("#marcaProduto").append("<option value='Supra' selected>Supra</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Supra'>Supra</option>");
                      }

                      if(marca == "Vans"){
                      		$("#marcaProduto").append("<option value='Vans' selected>Vans</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Vans'>Vans</option>");
                      }


                      if(marca == "New Balance"){
                      		$("#marcaProduto").append("<option value='Asics' selected>Asics</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Asics'>Asics</option>");
                      }                
                      
                      
                      
                      
                      
                      

                       // tamanho
                      $("#tamanho").find("option").each(function(){
                          $(this).remove();
                      });

                      // ARMAZENANDO O TAMANHO DO PRODUTO EM UMA VARIAVEL PARA FAZER A VERIFICAÇÃO SE O TAMANHO SE ENCONTRA NO CHECKBOX E DEIXAR SELECIONADO
                      var TamanhoProduto = $("#checkTamanho").find("#tamanho").attr("class");


                      if(TamanhoProduto == "37"){
                  		 	$("#tamanho").append("<option value='37' selected>37</option>");

                      }else{
                      		$("#tamanho").append("<option value='37'>37</option>");
                      }

                      if(TamanhoProduto == "38"){
                      		$("#tamanho").append("<option value='38' selected>38</option>");

                      }else{
                      		$("#tamanho").append("<option value='38'>38</option>");
                      }

                      if(TamanhoProduto == "39"){
                      		$("#tamanho").append("<option value='39' selected>39</option>");

                      }else{
                      		$("#tamanho").append("<option value='39'>39</option>");
                      }

                      if(TamanhoProduto == "40"){
                      		$("#tamanho").append("<option value='40' selected>40</option>");

                      }else{
                      		$("#tamanho").append("<option value='40'>40</option>");
                      }

                      if(TamanhoProduto == "41"){
                      		$("#tamanho").append("<option value='41' selected>41</option>");

                      }else{
                      		$("#tamanho").append("<option value='41'>41</option>");
                      }

                      if(TamanhoProduto == "42"){
                      		$("#tamanho").append("<option value='42' selected>42</option>");

                      }else{
                      		$("#tamanho").append("<option value='42'>42</option>");
                      }

                      if(TamanhoProduto == "43"){
                      		$("#tamanho").append("<option value='43' selected>43</option>");

                      }else{
                      		$("#tamanho").append("<option value='43'>43</option>");
                      }

                      
                    

                }
                else{
                    $("#subCategoria").find("option").each(function(){ // EXCLUINDO ELEMENTOS PARA ADICIONAR OPÇÕES REFERENTE A CATEGORIA
                          $(this).remove();
                      });

                    // ADICIONANDO OPÇÕES NO CHECKBOX
                    var subCategoria = $("#subCate").find("#subCategoria").attr("class");

                      if(subCategoria == "Camiseta"){
                      		 $("#subCategoria").append("<option value='Camiseta' selected>Camiseta</option>");
                      }else{
                      		 $("#subCategoria").append("<option value='Camiseta'>Camiseta</option>");
                      }

                      if(subCategoria == "Camisa"){
                      		 $("#subCategoria").append("<option value='Camisa' selected>Camisa</option>");
                      }else{
                      		 $("#subCategoria").append("<option value='Camisa'>Camisa</option>");
                      }

                      if(subCategoria == "Calça"){
                      		 $("#subCategoria").append("<option value='Calça' selected>Calça</option>");
                      }else{
                      		$("#subCategoria").append("<option value='Calça'>Calça</option>");
                      }


                      if(subCategoria == "Moletom"){
                      		$("#subCategoria").append("<option value='Moletom' selected>Moletom</option>");
                      }else{
                      		$("#subCategoria").append("<option value='Moletom'>Moletom</option>");
                      }

                      if(subCategoria == "Jaqueta"){
                      		$("#subCategoria").append("<option value='Jaqueta' selected>Jaqueta</option>");
                      }else{
                      		$("#subCategoria").append("<option value='Jaqueta'>Jaqueta</option>");
                      }

                      if(subCategoria == "Bermuda"){
                      		$("#subCategoria").append("<option value='Bermuda' selected>Bermuda</option>");
                      }else{
                      		$("#subCategoria").append("<option value='Bermuda'>Bermuda</option>");
                      }



                     // Marca
                      $("#marcaProduto").find("option").each(function(){
                          $(this).remove();
                      });

                      var marca = $("#checkMarca").find("#marcaProduto").attr("class");

                      if(marca == "Grizzly"){
                          $("#marcaProduto").append("<option value='Grizzly' selected>Grizzly</option>");
                      }else{
                          $("#marcaProduto").append("<option value='Grizzly'>Grizzly</option>");
                      }

                      if(marca == "High"){
                      		$("#marcaProduto").append("<option value='High' selected>High</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='High'>High</option>");
                      }

                      if(marca == "Diamond"){
                      		$("#marcaProduto").append("<option value='Diamond'>Diamond</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Grizzly'>Grizzly</option>");
                      }

                      if(marca == "DGK"){
                      		$("#marcaProduto").append("<option value='DGK' selected>DGK</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='DGK'>DGK</option>");
                      }

                      if(marca == "Stussy"){
                      		$("#marcaProduto").append("<option value='Stussy' selected>Stussy</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Stussy'>Stussy</option>");
                      }

                      if(marca == "Supra"){
                      		$("#marcaProduto").append("<option value='Supra'>Supra</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Supra'>Supra</option>");
                      }

                      if(marca == "Primitive"){
                      		$("#marcaProduto").append("<option value='Primitive' selected>Primitive</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Primitive'>Primitive</option>");
                      }

                      if(marca == "Huf"){
                      		$("#marcaProduto").append("<option value='Huf' selected>Huf</option>");
                      }else{
                      		$("#marcaProduto").append("<option value='Huf'>Huf</option>");
                      }


                       // TAMANHO
                      $("#tamanho").find("option").each(function(){
                          $(this).remove();
                      });

                      $("#tamanho").append("<option value='none'>--</option>");
                     
                }


            }

		</script>
	</body>
	</html>