<?php
$v->layout("_theme");

      $v->start("cssThisPage");
?>      <link rel="stylesheet" href="<?= url("view/css/carrinho.css"); ?>">
<?php $v->end(); ?>

<div id="divGeral">
    <?php if (isset($_SESSION["carrinho"]) && count($_SESSION["carrinho"]) != 0): ?>
        <table class="table ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Produto</th>
                <th class="align" scope="col"></th>
                <th class="align" scope="col">Quantidade</th>
                <th class="align" scope="col">Preco</th>
                <th class="align" scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
            <?php for($i = 0; $i < count($_SESSION["carrinho"]); $i++): ?>
            

                    <tr>
                        <td><img class="imgProduto" src="<?= $products[$i]["imagem"]; ?>" align="left"/>
                            <label class="nomeProduto"><b><?= $products[$i]["nomeProduto"]; ?></b>
                                <br><?= $_SESSION["tamanho"][$products[$i]["id"]]; ?></label>


                        </td>
                        <td class="align">
                            <button class="alterarValor" data-action="<?= $router->route("web.alterarquantidadecarrinho"); ?>" data-method="deletar" data-id="<?= $products[$i]["id"]; ?>" style="background-color: transparent">
                                <img id="excluir" src="<?= url("media/images/icons/trash.png"); ?>">
                            </button>
                        </td>
                        <td class="align">

                            <button class="alterarValor" data-action="<?= $router->route("web.alterarquantidadecarrinho"); ?>" data-method="decremento" data-id="<?= $products[$i]["id"]; ?>">-</button>

                            <input id="<?= $products[$i]["id"]; ?>" class="qntProduto" type="text" name="qntProduto"
                                   value="<?= $_SESSION["quantidade"][$products[$i]["id"]]; ?>" disabled>

                            <button class="alterarValor" data-action="<?= $router->route("web.alterarquantidadecarrinho"); ?>" data-method="incremento" data-id="<?= $products[$i]["id"]; ?>">+</button>

                        </td>
                        <td class="align">
                            R$
                            <?php
                            if ($products[$i]["promocao"] != 0):
                                echo number_format($products[$i]["promocao"], 2, ",", ".");

                            else:
                                echo number_format($products[$i]["preco"], 2, ",", ".");

                            endif;

                            ?>

                        </td>
                        <td class="align">
                            <?php

                            $qnt = $_SESSION["quantidade"][$products[$i]["id"]];

                            if ($products[$i]["promocao"] != 0):
                                $total[$products[$i]["promocao"]] = $products[$i]["promocao"] * $qnt;
                                echo "R$ " . number_format($total[$products[$i]["promocao"]], 2, ",", ".");
                            
                            else:
                                $total[$products[$i]["preco"]] = $products[$i]["preco"] * $qnt;
                                echo "R$ " . number_format($total[$products[$i]["preco"]], 2, ",", ".");

                            endif;


                            ?>
                        </td>

                    </tr>
                    <?php

                endfor;

            ?>

            </tbody>
        </table>
    <?php else: ?>

        <h1 class="carrVazio">Carrinho Vazio!</h1>

    <?php endif; ?>

    <div class="espacosub">
        <b>Subtotal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R$
            <?php
            if (isset($total)) { // SE EXISTIR O ARRAY TOTAL QUER DIZER QUE TEM PRODUTOS NO CARRINHO
                $subtotal = 0;
                foreach ($total as $valor) {
                    $subtotal += $valor;
                }

                echo number_format($subtotal, 2, ",", ".");

            } else {
                $subtotal = 0;
                echo "00,00";
            }

            ?>
        </b>

    </div>

    <div class="espaco">
        <div id="calcFrete">
            <p><label class="texto">Informe o CEP do endereço de entrega para calcular o valor do frete:</label>
                <input class="tamanhoPadrao campoFrete" type="text" name="calcFrete" placeholder="Digite seu CEP">
                <button id="buttonFrete" class="tamanhoPadrao" type="submit">calcular frete</button>

                <a id="ConsultarCep" href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="blank">Consultar
                    Cep</a>
            </p>
        </div>
        <b>Frete &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R$ 00,00</b>

    </div>

    <div class="espaco">
        <form id="calcFrete" class="formFrete">
            <p><label class="texto">Informe seu Cupom ou Vale-Compra para calcular seu desconto:</label>
                <input class="tamanhoPadrao" type="text" name="cupomDesconto">
                <button class="tamanhoPadrao" type="submit">calcular desconto</button>
            </p>
        </form>
        <b>Desconto &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R$ 00,00</b>
    </div>

    <div id="espacoTotal">
        <b>Total: &nbsp;&nbsp;&nbsp;&nbsp;</b>
        <?php if ($subtotal != 0) { ?>
            <b id="total">R$ <?php echo number_format($subtotal, 2, ",", "."); ?></b>
            <p id="descontoAvista">à vista <b>com 5% de desconto</b> <br> <label id="parcelado">ou em até <b>6x</b> de
                    <b>R$ <?php echo number_format($subtotal / 6, 2, ",", "."); ?></b> sem juros.</label></p>
        <?php } else { ?>
            <b id="total">R$ 00,00</b>
        <?php } ?>
    </div>

    <div class="opcoesCompra">
        <button id="continuar"><a href="produtos.php">Continuar Comprando</a></button>
        <button id="finalizar"><a href="#">Finalizar Compra</a></button>
    </div>

    <h1 id="teste"></h1>
</div>

</body>

<?php $v->start("scripts"); ?>
<script type="text/javascript" src="<?= url("jq/jquery.mask.js"); ?>"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $(".campoFrete").mask("99999-999");
        $(".qntProduto").mask("999");
    });

    $("#buttonFrete").click(function () {

        $('.formFrete').ajaxForm({
            url: '../PHP/calcularFrete.php',
            type: 'post',
            success: function (data) {
                alert(data);
            }
        }).submit();

        window.location.reload();

    });

    $(".alterarValor").click(function () {
        var data = $(this).data();

        $.post(data.action, data, function(){
            document.location.reload(true);

        }, "json").fail(function(){
            alert("Erro ao alterar a quantidade!");
        });
    });

    // $(".qntProduto").keyup(function(){
    //     // FUNCAO PARA PEGA O ID E A QUANTIDADE QUE ELE DESEJA DO PRODUTO E RECALCULANDO O VALOR TOTAL
    //     var id = $(this).attr("id");
    //     var quantidade = $("#"+id).val();

    //     window.location.href = "../PHP/atualizarPreco.php?id="+id+"&qnt="+quantidade;
    // });
</script>
<?php $v->end(); ?>

</html>