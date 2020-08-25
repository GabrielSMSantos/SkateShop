<?php
$v->layout("_theme");

      $v->start("cssThisPage");
?>      <link rel="stylesheet" href="<?= url("view/css/produtos.css"); ?>">
<?php $v->end();

    if(count($products) > 0):
?>

        <form id="filtros" data-action="<?= $router->route("ProdutosCtrl.filtro") ?>">

            <div class="filtro">
                <input type="checkbox" id="chkFiltro" name="chkFiltro" style="display: none;">

                    <p class="titulo">Marca</p>
                    <ul class="listaMarcasCategorias">
                        <?php
                            foreach (MARCAS as $indice => $marca):
                                
                                echo "<label for='marca{$indice}'><li>$marca</li></label>
                                
                                      <input type='radio' name='chkMarca' id='marca{$indice}' value='$marca'>
                                      
                                      <br>";

                            endforeach;
                        ?>
                    </ul>
                <br>

                    <p class="titulo">Tamanho</p>

                    <ul class="listaMarcasCategorias">
                        <label for="tamanhoP"><li class="tamanho">P</li></label>
                        <input type="radio" name="chkTamanho" id="tamanhoP" value="p">

                        <label for="tamanhoM"><li class="tamanho">M</li></label>
                        <input type="radio" name="chkTamanho" id="tamanhoM" value="m">

                        <label for="tamanhoG"><li class="tamanho">G</li></label>
                        <input type="radio" name="chkTamanho" id="tamanhoG" value="g">

                        <label for="tamanhoGG"><li class="tamanho">GG</li></label>
                        <input type="radio" name="chkTamanho" id="tamanhoGG" value="gg">
                    </ul>
                <br>

                    <p class="titulo">Cor</p>

                    <ul class="listaMarcasCategorias">
                    <?php 
                        foreach(CORES as $indice => $value):

                            echo "<label for='cor{$indice}'><li class='cor' style='background-color: #{$value}' alt='$indice'></li></label>
                            
                            <input type='radio' name='chkCor' id='cor{$indice}' value='$indice'>
                            ";

                        endforeach;
                    ?>
                    </ul>
                <br>

                    <p class="titulo">Gênero</p>

                    <ul class="listaMarcasCategorias">    
                        <label for="GeneroMasc"><li>Masculino</li></label>
                        <input type="radio" name="chkGenero" id="GeneroMasc" value="M">
                        <br>

                        <label for="GeneroFemi"><li>Feminino</li></label>
                        <input type="radio" name="chkGenero" id="GeneroFemi" value="F">
                        <br>

                        <label for="GeneroUni"><li>Unissex</li></label>
                        <input type="radio" name="chkGenero" id="GeneroUni" value="F">

                    </ul>
                    <br>

                    <button id="btnFiltrar" type="submit">
                        <img src="<?= url("media/images/icons/filtrar.png"); ?>" alt="Filtrar Produtos">
                        Filtrar 
                    </button>

            </div>


        </form>
        
<form id="filtrosMobile">
    
        <select class="filtroMobile">
            <option selected>MARCA</option>
            <?php
                foreach (MARCAS as $indice => $marca):
                    
                    echo "<option value='$marca'>$marca</option>";

                endforeach;
            ?>
        </select>


        <select class="filtroMobile">
            <option selected>TAMANHO</option>
            <option value="p">P</option>
            <option value="m">M</option>
            <option value="g">G</option>
            <option value="gg">GG</option>
        </select>

        <select class="filtroMobile">
            <option selected>COR</option>
            <?php
                foreach (CORES as $indice => $marca):
                    
                    echo "<option value='$indice'>$indice</option>";

                endforeach;
            ?>
        </select>

        <select class="filtroMobile">
            <option selected>GÊNERO</option>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="unissex">Unissex</option>
        </select>

        <button type="submit" class="btn btn-success">
            <img src="<?= url("media/images/icons/filtrar.png"); ?>" alt="Filtrar Produtos">
            Filtrar
        </button>
</form>


<div id="ordemProdutos">
    <p>Ordem: </p>
    <select name="ordem" id="dropdownOrdemProdutos">
        <option value="Lançamento">Lançamento</option>
        <option value="menorPreco">Menor Preço</option>
        <option value="maiorPreco">Maior Preço</option>
        <option value="nome">Nome</option>
        <option value="relevancia">Relevância</option>
    </select>
</div>
<?php endif; ?>



<div id="mainProdutos">
    
    <?php

    if(count($products) > 0):

    foreach ($products as $product): ?>


        <div class="Produtos">

            <div class="divImg">
                <a href="<?= url("Produto/".str_replace(" ", "-",$product["nomeProduto"])); ?>">
                    <img class="Imagem" src="<?= url($product["imagem"]); ?>">
                </a>
            </div>

            <div class="descricao">
                <h6 style="color: #404040;"><?= $product["nomeProduto"]; ?></h6>
                <b class=" <?php if ($product["promocao"] != 0.00):
                                    echo "preco";
                                 endif; ?>">
                R$ <?= number_format($product["preco"], 2, ",", "."); ?></b>
                <?php if ($product["promocao"] != 0.00): ?>
                    <b class="promocao">R$ <?= number_format($product["promocao"], 2, ",", "."); ?></b>
                <?php endif; ?>
            </div>


            <?php if (isset($_SESSION["permissao"]) && $_SESSION["permissao"] == "TRUE"): ?>
                <a href="editarProduto.php?acao=Editar&id=<?= $product["id"]; ?>"
                   class="btn btn-outline-success botoes">Editar</a>
                <button id="<?= $product["id"]; ?>" type="button" class="btn btn-outline-danger botoes"
                        data-toggle="modal" data-target="#exampleModal" onclick="excluirProduto(this.id)">Excluir
                </button>

            <?php else: ?>
                    <a href="<?= url("Produto/".str_replace(" ", "-", $product["nomeProduto"])); ?>" class="btn btn-outline-success botoes">Detalhes</a>
            <?php endif; ?>

        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir Produto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir este produto ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a id="modalExcluir" type="button" class="btn btn-primary">Excluir</a>
                    </div>
                </div>
            </div>
        </div>


    <?php /*FECHAMENTO DO FOREACH*/
        endforeach;
    ?>


</div>

<?php if ($totalPage > 1): ?>

    <ul class="liPaginacao">

    <?php for ($i = 0; $i < $totalPage; $i++): ?>

        <?php
            if (($i + 1) == $page):
                echo '<li class="page-item active"><a class="page-link" href="'.(url("{$url}/pagina-".($i + 1))).'">' . ($i + 1) . '</a></li>';

            else:
                echo '<li class="page-item"><a class="page-link" href="'.(url("{$url}/pagina-".($i + 1))).'">' . ($i + 1) . '</a></li>';
            endif;

        endfor;
        ?>

        <?php
        if ($page == $totalPage): ?>
            <li class="page-item disabled">

            <?php else: ?>
                <li class="page-item ">

            <?php endif;
                    echo '<a class="page-link" href="'.(url("{$url}/pagina-".($i))).'">Próximo</a>';
            ?>
                </li>
            </li>
    </ul>

<?php endif;
    else:
    ?>

    <div id="semPagina">
        <h1>Produto não encontrado</h1>
        <h3>Volte para a loja </h3>
        <a class="btnProdutos" href="<?= $router->route("web.products"); ?>">Ver produtos</a>
    </div>

<?php
    endif;
?>


</body>

    <?php $v->start("scripts"); ?>
    <script type="text/javascript">
        function excluirProduto(id) {
            document.getElementById("modalExcluir").href = "../controler/deletarProduto.php?acao=Deletar&id=" + id;
        }

        $("#filtros").on("submit", function(element){
            element.preventDefault();

            var data = $(this).data();
            var form = $(this).serialize();

            console.log(data.action);

            $.post(data.action, form, function() {

                console.log("sucesso!");

            }, "json" ).fail(function() {
                console.log("ERROR");

            });

        });




        $('.collapse').collapse();
    </script>
    <?php $v->end(); ?>
</html>
