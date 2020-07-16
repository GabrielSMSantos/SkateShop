<?php
$v->layout("_themeAdmin");

      $v->start("cssThisPage");
?>        <link rel="stylesheet" href="<?= url("view/css/configuracoes.css"); ?>">
<?php $v->end(); ?>

              <div id="pgAtual">
                  <img src="https://png.icons8.com/material-sharp/25/000000/settings.png" align="left">
                  <h4 id="namePage">Gerenciar Módulos</h4>
              </div>

              <div class="card" >
                <div class="card-header bg-secondary">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseConteudo" aria-expanded="false" aria-controls="collapseContudo">
                      Produtos
                    </button>
                  </h5>
                </div>

                <form method="post" action="../source/controler/upload_imagens.php" enctype="multipart/form-data" id="collapseConteudo" class="collapse" aria-labelledby="conteudo" data-parent="#accordionExample">
                  <div id="inserirProduto" class="">
                            
                            <table class="table table-borderless ">
                              <tbody>
                                <tr>
                                  <td>
                                     <b>Nome Produto</b><br>
                                     <input type="text" name="nomeProduto">
                                  </td>
                                  
                                  <td>
                                       <b>Preço</b><br>
                                       <input type="text" id="precoProduto" name="precoProduto"><br>
                                  </td>

                                  <td>
                                     <b>Cor</b><br>
                                      <select name="corProduto">
                                        <option value="Preto">Preto</option>
                                        <option value="Branco">Branco</option>
                                        <option value="Vermelho">Vermelho</option>
                                        <option value="Verde">Verde</option>
                                        <option value="Amarelo">Amarelo</option>
                                        <option value="Laranja">Laranja</option>
                                        <option value="Azul">Azul</option>
                                      </select>

                                  </td>

                                  <td>

                                      <b>Categoria</b><br>
                                        <select id="categoria" onchange="turnInput()" name="categoriaProduto">
                                          <option value="Roupas">Roupas</option>
                                          <option value="Calcados">Calçados</option>
                                          <option value="Acessorios">Acessórios</option>
                                        </select>
                                  </td>
                                </tr>


                                <tr>
                                  <td id="subCategoria">
                                      <b>sub Categoria</b><br>
                                        <select id="subCamiseta" name="subCategoria">
                                          <option value="Camiseta">Camiseta</option>
                                          <option value="Camisa">Camisa</option>
                                          <option value="Calca">Calça</option>
                                          <option value="Moletom">Moletom</option>
                                          <option value="Jaqueta">Jaqueta</option>
                                          <option value="Bermuda">Bermuda</option>
                                        </select>                                     
                                  </td>

                                  <td>
                                      <b>Marca</b><br>
                                      <select id="marca" name="marcaProduto">
                                        <option value="Grizzly">Grizzly</option>
                                        <option value="High">High</option>
                                        <option value="Diamond">Diamond</option>
                                        <option value="DGK">DGK</option>
                                        <option value="Stussy">Stussy</option>
                                        <option value="Supra">Supra</option>
                                        <option value="Primitive">Primitive</option>
                                        <option value="Huf">Huf</option>
                                      </select>
                              
                                  </td>

                                  <td id="checkTamanho"> 
                                      <b>Tamanho</b><br>
                                      <select id="tamanho" name="tamanhoProduto">
                                        <option value="P">P</option>
                                        <option value="M">M</option>
                                        <option value="G">G</option>
                                        <option value="GG">GG</option>
                                      </select>  


                                  </td>

                                  <td>
                                      <b>Modelo</b><br>
                                      <input type="text" name="modeloProduto">
                                  </td>
                                </tr>

                                <tr>
                                  <td>
                                      <b>Gênero</b><br>
                                      <select name="generoProduto">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                      </select>
                                  </td>

                                  <td>
                                      <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

                                      <input type="file" name="imagem">
                                  </td>

                                  <td>
                                      <b>Descrição</b><br>
                                       <textarea name="descricaoProduto"></textarea>
                                  </td>
                                </tr>

                                <tr>
                                  
                                  <td>
                                       <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                                  </td>
                                </tr>

                              </tbody>
                            </table>

                  </div>
                </form>

              </div>
              <div class="card">
                <div class="card-header bg-secondary" id="menu">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseMenu" aria-expanded="false" aria-controls="collapseMenu">
                      Menu Fixo
                    </button>
                  </h5>
                </div>
                <div id="collapseMenu" class="collapse" aria-labelledby="menu" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header bg-secondary" id="quemsomos">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseQuemSomos" aria-expanded="false" aria-controls="collapseQuemSomos">
                      Quem Somos
                    </button>
                  </h5>
                </div>
                <div id="collapseQuemSomos" class="collapse" aria-labelledby="quemsomos" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header bg-secondary" id="publicidade">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapsePublicidade" aria-expanded="false" aria-controls="collapsePublicidade">
                      Publicidade
                    </button>
                  </h5>
                </div>
                <div id="collapsePublicidade" class="collapse" aria-labelledby="publicidade" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header bg-secondary" id="instagram">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseInstagram" aria-expanded="false" aria-controls="collapseInstagram">
                      Instagram
                    </button>
                  </h5>
                </div>
                <div id="collapseInstagram" class="collapse" aria-labelledby="instagram" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header bg-secondary" id="depoimentos">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseDepoimentos" aria-expanded="false" aria-controls="collapseDepoimentos">
                      Depoimentos
                    </button>
                  </h5>
                </div>
                <div id="collapseDepoimentos" class="collapse" aria-labelledby="depoimentos" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header bg-secondary" id="servicos">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseServicos" aria-expanded="false" aria-controls="collapseServicos">
                      Serviços
                    </button>
                  </h5>
                </div>
                <div id="collapseServicos" class="collapse" aria-labelledby="servicos" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
               <div class="card">
                <div class="card-header bg-secondary" id="portfolio">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapsePortfolio" aria-expanded="false" aria-controls="collapsePortfolio">
                      Portfólio
                    </button>
                  </h5>
                </div>
                <div id="collapsePortfolio" class="collapse" aria-labelledby="portfolio" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
               <div class="card">
                <div class="card-header bg-secondary" id="equipe">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseEquipe" aria-expanded="false" aria-controls="collapseEquipe">
                      Equipe
                    </button>
                  </h5>
                </div>
                <div id="collapseEquipe" class="collapse" aria-labelledby="equipe" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header bg-secondary" id="videos">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseVideos" aria-expanded="false" aria-controls="collapseVideos">
                      Vídeos
                    </button>
                  </h5>
                </div>
                <div id="collapseVideos" class="collapse" aria-labelledby="videos" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header bg-secondary" id="perceiros">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseParceiros" aria-expanded="false" aria-controls="collapseParceiros">
                      Parceiros
                    </button>
                  </h5>
                </div>
                <div id="collapseParceiros" class="collapse" aria-labelledby="perceiros" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
                <div class="card">
                <div class="card-header bg-secondary" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="false" aria-controls="collapseBlog">
                      Blog
                    </button>
                  </h5>
                </div>
                <div id="collapseBlog" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
               <div class="card">
                <div class="card-header bg-secondary" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseIndicadores" aria-expanded="false" aria-controls="collapseIndicadores">
                      Indicadores
                    </button>
                  </h5>
                </div>
                <div id="collapseIndicadores" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
                <div class="card">
                <div class="card-header bg-secondary" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseNewsletter" aria-expanded="false" aria-controls="collapseNewsletter">
                      Newsletter
                    </button>
                  </h5>
                </div>
                <div id="collapseNewsletter" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
               <div class="card">
                <div class="card-header bg-secondary" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseTextoRodape" aria-expanded="false" aria-controls="collapseTextoRodape">
                      Texto do rodapé
                    </button>
                  </h5>
                </div>
                <div id="collapseTextoRodape" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
            </div>
                             
                 
          </main>



         <script src="../jq/jquery-3.3.1.min.js" type="text/javascript"></script>

         <script src="../jq/jquery.mask.js" type="text/javascript"></script>

         <script src="../bootstrap/bootstrap.js" type="text/javascript"></script>

         <script type="text/javascript">
            $(document).ready(function(){
                $("#precoProduto").mask("000.000,00", {reverse: true});
            });

            function turnInput(){// FUNCAO CHAMADA QUANDO CHECKBOX É ALTERADO

              // OUTROS CHECKBOX SERÃO ALTERADOS EM RELAÇÃO A CATEGORIA DO PRODUTO


                /* VERIFICAÇÃO DO TIPO DE PRODUTO A SER CADASTRADO E MUDANDO
                   OS CAMPOS DE CADASTRO.
                */
                if($("#categoria").val() == "Roupas"){

                      // SUB CATEGORIA
                      $("#subCategoria").find("option").each(function(){ // EXCLUINDO ELEMENTOS PARA ADICIONAR OPÇÕES REFERENTE A CATEGORIA
                          $(this).remove();
                      });

                      // ADICIONANDO OPÇÕES NO CHECKBOX
                      $("#subCategoria select").append("<option value='Camiseta'>Camiseta</option>");
                      $("#subCategoria select").append("<option value='Camisa'>Camisa</option>");
                      $("#subCategoria select").append("<option value='Calça'>Calça</option>");
                      $("#subCategoria select").append("<option value='Moletom'>Moletom</option>");
                      $("#subCategoria select").append("<option value='Jaqueta'>Jaqueta</option>");
                      $("#subCategoria select").append("<option value='Bermuda'>Bermuda</option>");


                      // Marca
                      $("#marca").find("option").each(function(){
                          $(this).remove();
                      });

                      $("#marca").append("<option value='Grizzly'>Grizzly</option>");
                      $("#marca").append("<option value='Diamond'>Diamond</option>");
                      $("#marca").append("<option value='DGK'>DGK</option>");
                      $("#marca").append("<option value='Stussy'>Stussy</option>");
                      $("#marca").append("<option value='Supra'>Supra</option>");
                      $("#marca").append("<option value='Primitive'>Primitive</option>");
                      $("#marca").append("<option value='Huf'>Huf</option>");


                       // TAMANHO
                      $("#tamanho").find("option").each(function(){
                          $(this).remove();
                      });

                      $("#tamanho").append("<option value='P'>P</option>");
                      $("#tamanho").append("<option value='M'>M</option>");
                      $("#tamanho").append("<option value='G'>G</option>");
                      $("#tamanho").append("<option value='GG'>GG</option>");
                    
                }
                else if($("#categoria").val() == "Calcados"){

                      $("#subCategoria").find("option").each(function(){ // EXCLUINDO ELEMENTOS PARA ADICIONAR OPÇÕES REFERENTE A CATEGORIA
                          $(this).remove();
                      });

                      // ADICIONANDO OPÇÕES NO CHECKBOX
                      $("#subCategoria select").append("<option value='Tênis'>Tênis</option>");


                      // Marca
                      $("#marca").find("option").each(function(){
                          $(this).remove();
                      });

                      $("#marca").append("<option value='Nike'>Nike</option>");
                      $("#marca").append("<option value='Adidas'>Adidas</option>");
                      $("#marca").append("<option value='Puma'>Puma</option>");
                      $("#marca").append("<option value='Supra'>Supra</option>");
                      $("#marca").append("<option value='Vans'>Vans</option>");
                      $("#marca").append("<option value='New Balance'>New Balance</option>");
                      $("#marca").append("<option value='Asics'>Asics</option>");

                       // TAMANHO
                      $("#tamanho").find("option").each(function(){
                          $(this).remove();
                      });

                      $("#tamanho").append("<option value='37'>37</option>");
                      $("#tamanho").append("<option value='38'>38</option>");
                      $("#tamanho").append("<option value='39'>39</option>");
                      $("#tamanho").append("<option value='40'>40</option>");
                      $("#tamanho").append("<option value='41'>41</option>");
                      $("#tamanho").append("<option value='42'>42</option>");
                      $("#tamanho").append("<option value='43'>43</option>");
                    

                }
                else{
                    $("#subCategoria").find("option").each(function(){ // EXCLUINDO ELEMENTOS PARA ADICIONAR OPÇÕES REFERENTE A CATEGORIA
                          $(this).remove();
                      });

                    // ADICIONANDO OPÇÕES NO CHECKBOX
                    $("#subCategoria select").append("<option value='Boné'>Boné</option>");
                    $("#subCategoria select").append("<option value='Meia'>Meia</option>");
                    $("#subCategoria select").append("<option value='Gorro'>Gorro</option>");
                    $("#subCategoria select").append("<option value='Mochila'>Mochila</option>");
                    $("#subCategoria select").append("<option value='Carteira'>Carteira</option>");
                    $("#subCategoria select").append("<option value='Chaveiro'>Chaveiro</option>");



                     // Marca
                      $("#marca").find("option").each(function(){
                          $(this).remove();
                      });

                      $("#marca").append("<option value='Grizzly'>Grizzly</option>");
                      $("#marca").append("<option value='Diamond'>Diamond</option>");
                      $("#marca").append("<option value='DGK'>DGK</option>");
                      $("#marca").append("<option value='Stussy'>Stussy</option>");
                      $("#marca").append("<option value='Supra'>Supra</option>");
                      $("#marca").append("<option value='Primitive'>Primitive</option>");
                      $("#marca").append("<option value='Huf'>Huf</option>");


                       // TAMANHO
                      $("#tamanho").find("option").each(function(){
                          $(this).remove();
                      });

                      $("#tamanho").append("<option value='none'>--</option>");
                     
                }


            }



            $('.collapse').collapse();

            $('.dropdown-toggle').dropdown();
         </script>
    </body>

</html>
