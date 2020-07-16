<?php
$v->layout("_theme");

      $v->start("cssThisPage");
?>      <link rel="stylesheet" href="<?= url("view/css/produtos.css"); ?>">
<?php $v->end();

    if(count($products) > 0):
?>
        <div id="filtros">
            <div class="filtro">
                <input type="checkbox" id="chkFiltro" name="chkFiltro" style="display: none;">

                <label for="chkFiltro">
                    <h2>Marca</h2>
                </label>

            </div>


        </div>
<?php endif; ?>


<div id="filtrosMobile">
    <select class="filtroMobile">
        <option selected>Tamanho</option>
        <option value="p">P</option>
        <option value="m">M</option>
        <option value="g">G</option>
        <option value="gg">GG</option>
    </select>

    <select class="filtroMobile">
        <option selected>Categoria</option>
        <option value="camiseta">Camiseta</option>
        <option value="camisa">Camisa</option>
        <option value="moletom">Moletom</option>
        <option value="jaqueta">Jaqueta</option>
        <option value="calca">Calça</option>
        <option value="bermuda">Bermuda</option>
    </select>

    <select class="filtroMobile">
        <option selected>Marca</option>
        <option value="grizzly">Grizzly</option>
        <option value="diamond">Diamond</option>
        <option value="dgk">DGK</option>
        <option value="supra">Supra</option>
        <option value="stussy">Stussy</option>
        <option value="primitive">Primitive</option>
        <option value="huf">Huf</option>
    </select>
</div>

<div id="mainProdutos">


    <?php

    if(count($products) > 0):

    foreach ($products as $product): ?>



        <div class="Produtos shadow-sm p-3 mb-5 bg-white rounded">

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
    </li></ul>

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

        $('.collapse').collapse();
    </script>
    <?php $v->end(); ?>
</html>
