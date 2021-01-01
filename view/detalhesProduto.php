<?php
$v->layout("_theme2");

      $v->start("cssThisPage");
?>      <link rel="stylesheet" href="<?= url("view/css/detalhesProduto.css"); ?>">
<?php $v->end(); 
?>

<div id="fotosProduto">

    <?php 
        foreach ($product as $value):
    ?>
            <img src="<?= url($value["imagem"]); ?>" class="fotosEmAngulosDiferentes" data-color="<?= $value["cor"]; ?>">

    <?php
        endforeach;
    ?>

    <!-- $data2 = $conn->query("SELECT * FROM produtos WHERE categoria='".$categoria."' and subCategoria='".$subCategoria."' and modelo='".$modelo."'"); -->

</div>
<div id="imagemProduto">

    <img id="imgProduto" src="<?= url($product[0]["imagem"]); ?>" >
</div>
<div id="fotosProdutoMobile">
    <img src="<?= url($product[0]["imagem"]); ?>" class="fotosEmAngulosDiferentes" data-color="<?= $product["cor"]; ?>">
</div>

<div id="infoCompra">
            <h1><?= $product[0]["subCategoria"]." ".$product[0]["marca"]." ".$product[0]["modelo"]; ?></h1>
            <br>


            <p id="<?php if($product[0]["promocao"] != 0){ echo "precoVelho"; }else{ echo "preco";} ?>">
                R$ <?= number_format($product[0]["preco"], 2, ",", "."); ?>
            </p>

    <?php if ($product[0]["promocao"] != 0): ?>

        <h3 id="precoPromocao">R$ <?= number_format($product[0]["promocao"], 2, ",", "."); ?></h3>

    <?php endif; ?>

    <p>Cor</p>

        <?php 
            foreach ($product as $value):
        ?>

            <input id="<?= $value["cor"]; ?>" type="radio" name="color" value="<?= $value["id"]; ?>" <?= ($value["cor"] == $colorSelected) ? "checked" : "" ?>>

            <label for="<?= $value["cor"]; ?>" class="cor"><?= $value["cor"]; ?></label>

        <?php 
            endforeach;
        ?>


        <!-- <button type="button" class="cor" style="background: #<?php // echo $cor; ?>"></button> -->
    

    <?php if ($product[0]["tamanho"] != "none"): ?>
        <p style="margin-top: 15px;">Tamanho</p>

        <?php if ($product[0]["categoria"] == "Roupas"): ?>
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
    <p>Quantidade <br> 
        
        <button class="alterarQuantidade" data-method="decremento">-</button>
        
        <input style="padding-left: 10px;" type="text" id="qnt" name="qnt" value="1" disabled>

        <button class="alterarQuantidade" data-method="incremento">+</button>
    </p>


    <?php if ($product[0]["tamanho"] != "none"): ?>

        <label id="msg">Por favor selecione o tamanho para adicionar ao carrinho</label><br>

    <?php endif; ?>

    <button id="comprar" data-action="<?= $router->route("web.buy"); ?>">

        <img src="<?= url("media/images/icons/btnCarrinho.png"); ?>">
        Adicionar ao Carrinho

    </button>
    <br><br><br><br>


</div>
</body>

<?php $v->start("scripts"); ?>
<script type="text/javascript">
    $(document).ready(function () {

        var checkedValue = $("input[name='color']:checked").attr("id");


        $(".fotosEmAngulosDiferentes[data-color="+ checkedValue + "]").click();

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

    function getProductSelected() {
        return $("input[name='color']:checked").val();
    }


    $(".radioProduto").on("click", function(e){
        var tamanho = e.target.value;
        var btnComprar = document.querySelector("#comprar");

        btnComprar.setAttribute("data-tamanho", tamanho);
    });

    $(".alterarQuantidade").on("click", function(){

        var quantidade = parseInt($("#qnt").val());
        var tipo = $(this).attr("data-method");

        if (tipo == "incremento")
            quantidade += 1;
        else
            if (quantidade > 1)
                quantidade -= 1;

        $("#qnt").val(quantidade);
        
    });


    $("#comprar").on("click", function(e){
        e.preventDefault();

        var quantidade = document.querySelector("#qnt").value;
        var btnComprar = document.querySelector("#comprar");
        btnComprar.setAttribute("data-quantidade", quantidade);
        var tamanho = $("input[name='tamanhoProduto']:checked").val();
        var quantidade = $("#qnt").val();        

        var data = $(this).data();

        $.post(data.action,{ 
            "data": data,
            "id": getProductSelected(),
            "tamanho": tamanho,
            "quantidade": quantidade
            }, function(){
                
            document.location.href = "<?= $router->route("web.cart"); ?>";

        }, "json").fail(function(){
            alert("Erro ao adicionar ao carrinho.");
        });
    });

</script>
<?php $v->end(); ?>
</html>
