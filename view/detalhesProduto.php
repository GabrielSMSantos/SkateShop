<?php
$v->layout("_theme");

      $v->start("cssThisPage");
?>      <link rel="stylesheet" href="<?= url("view/css/detalhesProduto.css"); ?>">
<?php $v->end(); ?>

<div id="fotosProduto">

    <img src="<?= url($product["imagem"]); ?>" class="fotosEmAngulosDiferentes">


    <!-- $data2 = $conn->query("SELECT * FROM produtos WHERE categoria='".$categoria."' and subCategoria='".$subCategoria."' and modelo='".$modelo."'"); -->

</div>
<div id="imagemProduto">

    <img id="imgProduto" src="<?= url($product["imagem"]); ?>">
</div>
<div id="fotosProdutoMobile">
    <img src="<?= url($product["imagem"]); ?>" class="fotosEmAngulosDiferentes">
</div>

<div id="infoCompra">
                <h2><?= $product["subCategoria"]." ".$product["marca"]." ".$product["modelo"]; ?></h2>
                <br>


                <p>Preço  <h3 id="<?php if($product["promocao"] != 0){ echo "precoVelho"; }else{ echo "preco";} ?>">
    R$ <?= number_format($product["preco"], 2, ",", "."); ?></h3></p>

    <?php if ($product["promocao"] != 0): ?>

        <p><h3 id="preco">R$ <?= number_format($product["promocao"], 2, ",", "."); ?></h3></p>

    <?php endif; ?>

    <p>Cor <br>
        <a href="detalhesProduto.php?id=<?= $product["id"] ?>">
            <div class="cor" style="background: #<?= $product["cor"] ?>"></div>
        </a>


        <!-- <button type="button" class="cor" style="background: #<?php // echo $cor; ?>"></button> -->
    </p>

    <?php if ($product["tamanho"] != "none"): ?>
        <p>Tamanho</p>

        <?php if ($product["categoria"] == "Roupas"): ?>
            <p>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto" value="P"
                           style="display: none;">
                    <b class="tamanhoProduto">P</b>
                </label>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto" value="M"
                           style="display: none;" onclick="getTamanho(this)">
                    <b class="tamanhoProduto">M</b>
                </label>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto" value="G"
                           style="display: none;">
                    <b class="tamanhoProduto">G</b>
                </label>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto"
                           value="GG" style="display: none;">
                    <b class="tamanhoProduto">GG</b>
                </label>


            </p>
        <?php else: ?>

            <p>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto"
                           value="37" style="display: none;">
                    <b class="tamanhoProduto">37</b>
                </label>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto"
                           value="38" style="display: none;">
                    <b class="tamanhoProduto">38</b>
                </label>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto"
                           value="39" style="display: none;">
                    <b class="tamanhoProduto">39</b>
                </label>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto"
                           value="40" style="display: none;">
                    <b class="tamanhoProduto">40</b>
                </label>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto"
                           value="41" style="display: none;">
                    <b class="tamanhoProduto">41</b>
                </label>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto"
                           value="42" style="display: none;">
                    <b class="tamanhoProduto">42</b>
                </label>

                <label>
                    <input type="radio" onclick="habilitarCompra()" class="radioProduto" name="tamanhoProduto"
                           value="43" style="display: none;">
                    <b class="tamanhoProduto">43</b>
                </label>


            </p>

    <?php   endif;

        endif; ?>
    <p>Quantidade <br> <input style="padding-left: 10px;" type="text" id="qnt" name="qnt" value="1" disabled></p>

    <?php if ($product["tamanho"] != "none"): ?>

        <label id="msg">Por favor selecione o tamanho para adicionar ao carrinho</label><br>

    <?php endif; ?>

    <button id="comprar" data-action="<?= $router->route("web.buy"); ?>" data-id="<?= $product["id"]; ?>">

        <img src="../media/images/icons/btnCarrinho.png">
        Adicionar ao Carrinho

    </button>
    <br><br><br><br>


</div>
</body>

<?php $v->start("scripts"); ?>
<script type="text/javascript">
    $(document).ready(function () {

        //  caso o produto nao tenha tamanho para escolher o botao de compra ja fica desbloqueado
        if ($("#comprar").attr("class") == "none") {
            document.getElementById("comprar").disabled = false;
        } else {
            document.getElementById("comprar").disabled = true;
        }

    });

    // muda a imagem principal do produto para a selecionada, para ver a imagem maior
    $(".fotosEmAngulosDiferentes").click(function () {
        var imgAlternativa = $(this).attr("src");
        document.getElementById("imgProduto").src = imgAlternativa;
    });


    // desbloqueando o botao de compra quando o usuario seleciona o tamanho do produto
    function habilitarCompra() {

        if ($(".radioProduto").checked == true) {
            document.getElementById("comprar").disabled = false;
            document.getElementById("msg").style.display = "none";
        } else {
            document.getElementById("comprar").disabled = false;
            document.getElementById("msg").style.display = "none";
        }

    }



    $(".radioProduto").on("click", function(e){
        var tamanho = e.target.value;
        var btnComprar = document.querySelector("#comprar");

        btnComprar.setAttribute("data-tamanho", tamanho);
    });


    $("#comprar").on("click", function(e){
        e.preventDefault();

        var quantidade = document.querySelector("#qnt").value;
        var btnComprar = document.querySelector("#comprar");
        btnComprar.setAttribute("data-quantidade", quantidade);

        var data = $(this).data();

        $.post(data.action, data, function(){
            document.location.href = "<?= $router->route("web.cart"); ?>";

        }, "json").fail(function(){
            alert("Erro ao adicionar ao carrinho.");
        });
    });

</script>
<?php $v->end(); ?>
</html>
