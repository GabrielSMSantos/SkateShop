<?php
$v->layout("_theme");

      $v->start("cssThisPage"); ?>
            <link rel="stylesheet" href="<?= url("view/css/style.css"); ?>">
<?php $v->end(); ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">

        <div class="carousel-item active">

            <img class="d-block w-100" src="media/images/Bannerdisfocado.jpg" alt="First slide">

        </div>

        <div class="carousel-item">

            <img class="d-block w-100" src="media/images/bannersupreme.jpg" alt="Second slide">

        </div>

        <div class="carousel-item">

            <img class="d-block w-100" src="media/images/goldpromodel.jpg" alt="Third slide">

        </div>

    </div>

</div>

<!-- marcas fornecedoras -->
<div class="gtco-client">
    <div class="gtco-container">
        <div id ="marcas" class=" container">
            <a href="<?= url("Grizzly/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/grizzly.png") ?>"  class="img-responsive"></a>
            <a href="<?= url("Dc-Shoes/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/dc-shoes.png") ?>" class="img-responsive"></a>
            <a href="<?= url("Diamond/pagina-1");  ?>"><img src="<?=  url("media/images/marcas/diamond.png") ?>" class="img-responsive"></a>
            <a href="<?= url("Stussy/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/stussy.png") ?>" class="img-responsive"></a>
            <a href="<?= url("High/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/high.png") ?>" class="img-responsive"></a>
            <a href="<?= url("Supreme/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/supreme.png") ?>" class="img-responsive"></a>
            <a href="<?= url("Primitive/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/primitive.png") ?>" class="img-responsive"></a>
            <a href="<?= url("Nike/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/nike.png") ?>" class="img-responsive"></a>
            <a href="<?= url("Vans/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/vans.png") ?>" class="img-responsive"></a>
            <a href="<?= url("Dgk/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/dgk.png") ?>" class="img-responsive"></a>
            <a href="<?= url("Adidas/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/adidas.png") ?>" class="img-responsive"></a>
            <a href="<?= url("Puma/pagina-1"); ?>"><img src="<?=  url("media/images/marcas/puma.png") ?>" class="img-responsive"></a>
        </div>
    </div>
</div>


<main id="conteudo">
    <div id="colecao1">
        <a href="<?= url("Grizzly/pagina-1"); ?>"><img src="<?= url("media/images/colecao5.jpg"); ?>"></a>

        <figcaption id="col5" class="colecaoDiv">
            <a href="<?= url("Grizzly/pagina-1"); ?>">Loja</a>
        </figcaption>
    </div>


    <section id="destaques">
        <div id="titulo">
            <h1><b>Destaques</b></h1>
        </div>

        <div id="dvProduto">
            <?php foreach ($products as $product):

                echo '
                  <div class="Produtos shadow-sm p-3 mb-5 bg-white rounded">
                              <a href="'.(url("Produto/".str_replace(" ", "-", $product["nomeProduto"]))).'"><img class="Imagem" src="'.$product["imagem"].'"></a>
                              <div class="descricao">
                                <h6>'.$product["nomeProduto"].'</h6>
                                <b>R$ '.number_format($product["preco"],2,",",".").'</b>
                              </div>';

                if(isset($_SESSION["Permicao"]) == "TRUE"):
                    echo '<a href="view/editarProduto.php?acao=Editar&id='.$product["id"].'" class="btn btn-outline-success botoes">Editar</a>
                                <button id="'.$product["id"].'" type="button" class="btn btn-outline-danger botoes" data-toggle="modal" data-target="#exampleModal" onclick="excluirProduto(this.id)">Excluir</button>';
                else:
                    echo '<a href="'.(url("Produto/".str_replace(" ", "-", $product["nomeProduto"]))).'" class="btn btn-outline-success botoes"><b>Detalhes</b></a>';
                endif;

                echo '</div>';

            endforeach;
            ?>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="modalExcluir" type="button" class="btn btn-primary" style="color:#fff">Excluir</a>
                </div>
            </div>
        </div>
    </div>

    <div id="colecao">
        <div id="colecao2">
            <a href="<?= url("Grizzly/pagina-1"); ?>"><img src="<?= url("media/images/colecao1.jpg"); ?>"></a>

            <figcaption id="col2" class="colecaoDiv">
                <a href="<?= url("Grizzly/pagina-1"); ?>">Loja</a>
            </figcaption>

        </div>

        <div id="colecao3">
            <a href="<?= url("Dgk/pagina-1"); ?>"><img src="<?= url("media/images/colecao2.jpg"); ?>"></a>

            <figcaption id="col3" class="colecaoDiv">
                <a href="<?= url("Dgk/pagina-1"); ?>">Loja</a>
            </figcaption>

        </div>
    </div>


</main>

<?php $v->start("scripts"); ?>
<script type="text/javascript">
    function excluirProduto(id){
        document.getElementById("modalExcluir").href = "controler/deletarProduto.php?acao=Deletar&id="+ id;
    }

    $('.carousel').carousel({
        interval: 3000
    });
</script>
<?php $v->end(); ?>

</body>
</html>
