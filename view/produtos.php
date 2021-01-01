<?php
$v->layout("_theme2");

      $v->start("cssThisPage");
?>      <link rel="stylesheet" href="<?= url("view/css/produtos.css"); ?>">
<?php $v->end();

    if(count($products) > 0):
?>
        <h1 style="font-style: italic;">ROUPAS MASCULINAS</h1>

        
<div id="filtrosMobile">   
    <form method="post" action="<?= $router->route("web.filtroProducts") ?>">
        
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
</div>
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
                <h6 style="text-transform: uppercase; font-size: 17px;">
                    <a href="<?= url("Produto/".str_replace(" ", "-",$product["nomeProduto"])."/".$product["cor"]); ?>">
                        <?= $product["nomeProduto"]; ?>
                    </a>
                </h6>

                
                <b class="<?= ($product["promocao"] != 0.00) ? "precoAntigo" : "preco"  ?>"> 

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
                    <!-- <a href="<?= url("Produto/".str_replace(" ", "-",$product["nomeProduto"])."/".$product["cor"]); ?>" class="btn btn-outline-success botoes">DETALHES</a> -->
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
                echo '<li><a class="linkPage activePage" href="'.(url("{$url}/pagina-".($i + 1))).'">' . ($i + 1) . '</a></li>';

            else:
                echo '<li><a class="linkPage" href="'.(url("{$url}/pagina-".($i + 1))).'">' . ($i + 1) . '</a></li>';
            endif;

        endfor;
        ?>

        <?php
        if ($page == $totalPage): ?>

            <li class="disabledPage">

        <?php else: ?>

            <li>

        <?php endif;
            echo '<a class="linkPage" href="'.(url("{$url}/pagina-".($i))).'">Próximo</a>';
        ?>
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
