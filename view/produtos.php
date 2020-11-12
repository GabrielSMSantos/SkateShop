<?php
$v->layout("_theme");

      $v->start("cssThisPage");
?>      <link rel="stylesheet" href="<?= url("view/css/produtos.css"); ?>">
<?php $v->end();

    if(count($products) > 0):
?>

        <form id="filtros" method="post" action="<?= $router->route("web.filtroProducts") ?>">

            <div class="filtro">
                <!-- <input type="checkbox" id="chkFiltro" name="chkFiltro" style="display: none;"> -->

                    <p class="titulo">Marca</p>
                    <ul class="listaMarcasCategorias">
                        <?php
                            foreach (MARCAS as $indice => $marca):
                                
                                echo "<label for='marca{$indice}'><li>$marca</li></label>"; ?>
                                
                                      <input type="radio" name="Marca" id="marca<?= $indice ?>" value="<?= $marca ?>" <?= (isset($_SESSION["dataFiltro"]) && 
                                                                                                                    $_SESSION["dataFiltro"][0] == $marca) ? "checked" : ""; ?>>
                                      
                                      <br>
                        <?php
                            endforeach;
                        ?>
                    </ul>
                <br>

                    <p class="titulo">Tamanho</p>

                    <ul class="listaMarcasCategorias">
                        <label>
                        <input type="radio" name="Tamanho" id="tamanhoP" class="chkTamanho" value="p" <?= (isset($_SESSION["dataFiltro"]) && 
                                                                                        $_SESSION["dataFiltro"][1] == "p") ? "checked" : ""; ?>>
                                <p class="tamanho">P</p>
                        </label>

                        <label>
                        <input type="radio" name="Tamanho" id="tamanhoM" class="chkTamanho" value="m" <?= (isset($_SESSION["dataFiltro"]) && 
                                                                                        $_SESSION["dataFiltro"][1] == "m") ? "checked" : ""; ?>>
                                <p class="tamanho">M</p>
                        </label>

                        <label>
                        <input type="radio" name="Tamanho" id="tamanhoG" class="chkTamanho" value="g" <?= (isset($_SESSION["dataFiltro"]) && 
                                                                                        $_SESSION["dataFiltro"][1] == "g") ? "checked" : ""; ?>>
                                <p class="tamanho">G</p>
                        </label>

                        <label>
                        <input type="radio" name="Tamanho" id="tamanhoGG" class="chkTamanho" value="gg" <?= (isset($_SESSION["dataFiltro"]) && 
                                                                                          $_SESSION["dataFiltro"][1] == "gg") ? "checked" : ""; ?>>
                                <p class="tamanho">GG</p>
                        </label>

                    </ul>
                <br>

                    <p class="titulo">Cor</p>

                    <ul class="listaMarcasCategorias">
                    <?php 
                        foreach(CORES as $indice => $value):

                            echo "<label for='cor{$indice}'><li class='cor' style='background-color: #{$value}' alt='$indice'></li></label>"; ?>
                            
                            <input type="radio" name="Cor" id="cor<?= $indice ?>" value="<?= $indice ?>" <?= (isset($_SESSION["dataFiltro"]) && 
                                                                                                            $_SESSION["dataFiltro"][2] == $indice) ?
                                                                                                            "checked" : ""; ?>>

                    <?php
                        endforeach;
                    ?>
                    </ul>
                <br>

                    <p class="titulo">Gênero</p>

                    <ul class="listaMarcasCategorias">    
                        <label for="GeneroMasc"><li>Masculino</li></label>
                        <input type="radio" name="Genero" id="GeneroMasc" value="Masculino" <?= (isset($_SESSION["dataFiltro"]) && 
                                                                                                $_SESSION["dataFiltro"][3] == "Masculino") ?
                                                                                                "checked" : ""; ?>>
                        <br>

                        <label for="GeneroFemi"><li>Feminino</li></label>
                        <input type="radio" name="chkGenero" id="GeneroFemi" value="Feminino" <?= (isset($_SESSION["dataFiltro"]) && 
                                                                                                $_SESSION["dataFiltro"][3] == "Feminino") ?
                                                                                                "checked" : ""; ?>>
                        <br>

                        <label for="GeneroUni"><li>Unissex</li></label>
                        <input type="radio" name="chkGenero" id="GeneroUni" value="Unissex" <?= (isset($_SESSION["dataFiltro"]) && 
                                                                                                $_SESSION["dataFiltro"][3] == "Unissex") ?
                                                                                                "checked" : ""; ?>>

                    </ul>
                    <br>

                    <button id="btnFiltrar" type="submit">
                        <img src="<?= url("media/images/icons/filtrar.png"); ?>" alt="Filtrar Produtos">
                        Filtrar 
                    </button>

            </div>


        </form>
        
<form id="filtrosMobile" method="post" action="<?= $router->route("web.filtroProducts") ?>">
    
        <select name="Marca" class="filtroMobile">
            <option value="" <?= empty($_SESSION["dataFiltro"][0]) ? "selected" : "" ?>>MARCA</option>
            <?php
                foreach (MARCAS as $indice => $marca): ?>
                    
                    <option value="<?= $marca ?>" <?= (isset($_SESSION["dataFiltro"]) && $_SESSION["dataFiltro"][0] == $marca) ? "selected" : ""; ?>><?= $marca ?></option>

            <?php
                endforeach;
            ?>
        </select>


        <select name="Tamanho" class="filtroMobile">
            <option value="" <?= empty($_SESSION["dataFiltro"][1]) ? "selected" : "" ?>>TAMANHO</option>
            <option value="p" <?= (isset($_SESSION["dataFiltro"]) && $_SESSION["dataFiltro"][1] == "p") ? "selected" : ""; ?>>P</option>
            <option value="m" <?= (isset($_SESSION["dataFiltro"]) && $_SESSION["dataFiltro"][1] == "m") ? "selected" : ""; ?>>M</option>
            <option value="g" <?= (isset($_SESSION["dataFiltro"]) && $_SESSION["dataFiltro"][1] == "g") ? "selected" : ""; ?>>G</option>
            <option value="gg" <?= (isset($_SESSION["dataFiltro"]) && $_SESSION["dataFiltro"][1] == "gg") ? "selected" : ""; ?>>GG</option>
        </select>

        <select name="Cor" class="filtroMobile">
            <option value="" <?= empty($_SESSION["dataFiltro"]) ? "selected" : "" ?>>COR</option>
            <?php
                foreach (CORES as $indice => $cor): ?>
                    
                    <option value="<?= $indice ?>" <?= (isset($_SESSION["dataFiltro"]) && $_SESSION["dataFiltro"][2] == $indice) ? "selected" : ""; ?>><?= $indice ?></option>

            <?php
                endforeach;
            ?>
        </select>

        <select name="Genero" class="filtroMobile">
            <option value="" <?= empty($_SESSION["dataFiltro"][3]) ? "selected" : "" ?>>GÊNERO</option>
            <option value="masculino" <?= (isset($_SESSION["dataFiltro"]) && $_SESSION["dataFiltro"][3] == "masculino") ? "selected" : ""; ?>>Masculino</option>
            <option value="feminino" <?= (isset($_SESSION["dataFiltro"]) && $_SESSION["dataFiltro"][3] == "feminino") ? "selected" : ""; ?>>Feminino</option>
            <option value="unissex" <?= (isset($_SESSION["dataFiltro"]) && $_SESSION["dataFiltro"][3] == "unissex") ? "selected" : ""; ?>>Unissex</option>
        </select>

        <button type="submit" class="btn btn-success">
            <img src="<?= url("media/images/icons/filtrar.png"); ?>" alt="Filtrar Produtos">
            Filtrar
        </button>   
</form>


<form id="ordemProdutos" method="post" action="<?= url($url); ?>">
    <p>Ordem: </p>
    <select name="ordem" id="dropdownOrdemProdutos">
        <option value="Lancamentos">Lançamentos</option>
        <option value="menorPreco">Menor Preço</option>
        <option value="maiorPreco">Maior Preço</option>
        <option value="alfabetica">Alfabética</option>
        <option value="relevancia">Relevância</option>
    </select>
    <input id="btnOrdem" type="submit">
</form>
<?php endif; ?>


<div id="mainProdutos">
    
    <?php

    if(count($products) > 0):

    foreach ($products as $product): ?>


        <div class="Produtos">

            <div class="divImg">
                <a href="<?= url("Produto/".str_replace(" ", "-",$product["nomeProduto"])."/".$product["cor"]); ?>">
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
                    <a href="<?= url("Produto/".str_replace(" ", "-",$product["nomeProduto"])."/".$product["cor"]); ?>" class="btn btn-outline-success botoes">Detalhes</a>
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
        $(document).ready(function(){
            var url = sliceUrl();

            if (url.search(/pagina-[0-9]/) > -1) {
                $("#dropdownOrdemProdutos").val("Lancamentos");

            } else if (url.search("Filtro") > -1) {
                $("#dropdownOrdemProdutos").val("Lancamentos");

                
                
            } else {
                $("#dropdownOrdemProdutos").val(url);

                $(".page-link").each(function(index, item){
                    var link = $(this).prop("href") + "/" + url;
                    $(this).prop("href", link);
                });
            }

        });

        function sliceUrl(){
            var url = window.location.href;
            url = url.slice(url.lastIndexOf("/") + 1);
            
            return url;
        }

        function excluirProduto(id) {
            document.getElementById("modalExcluir").href = "../controler/deletarProduto.php?acao=Deletar&id=" + id;
        }

        $("#dropdownOrdemProdutos").change(function(){
            $("#btnOrdem").click();
        });

        $("#btnOrdem").click(function(){
            var dropDown = $("#dropdownOrdemProdutos").val();
            var url = window.location.href;


            if (sliceUrl().search(/pagina-[0-9]/) > -1) {

                if (url.slice(url.lastIndexOf("/") + 1).search(/pagina-[0-9]/) > -1) {
                    url = url.replace(/pagina-[0-9]/, "pagina-1") + "/" + dropDown;

                } else {
                    var ordem = url.slice(url.lastIndexOf("/"));
                    url = url.substring(0, url.length - ordem.length) + "/" + dropDown;
                    url = url.replace(/pagina-[0-9]/, "pagina-1");
                }
                
            } else {

                if (url.indexOf("Filtro")) {

                    if (url.slice(url.lastIndexOf("/") + 1).search(/pagina-[0-9]/) > -1 || url.slice(url.lastIndexOf("/") + 1) == "Filtro") {
                        url = url + "/pagina-1/" + dropDown;

                    } else {
                        var ordem = url.slice(url.lastIndexOf("/"));
                        url = url.substring(0, url.length - ordem.length) + "/" + dropDown; 
                        url = url.replace(/pagina-[0-9]/, "pagina-1");   
                    }
                    
                }
                
            }

            $("#ordemProdutos").attr("action", url);
        });




        $('.collapse').collapse();
    </script>
    <?php $v->end(); ?>
</html>
