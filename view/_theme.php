<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" href="<?= url("media/images/icons/favicon.png"); ?>" type="img/x-png">
        <link rel="stylesheet" href="<?= url("bootstrap/bootstrap.css"); ?>" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= url("view/css/header_Footer.css"); ?>">

        <?= $v->section("cssThisPage");  ?>

        <title><?= $title ?></title>
    </head>

    <body>
        <header id="topo">

            <div class="divCima">
                <div id="logo"><a href="<?= $router->route("web.home"); ?>"><img src="<?= url("media/images/logo.png"); ?>"></a></div>

                <form id="procurar" method="post" action="<?= url("Busca/pagina-1"); ?>">
                    <img id="icon-search" src="<?= url("media/images/icons/icon-buscar.png"); ?>">

                    <input name="busca" type="text" placeholder="O que está procurando?">
                    <button type="submit" id="btn-buscar">Buscar</button>
                </form>


                <div id="dvCarrinhoUser">
                    <div id="carrinho">
                        <a href="<?= $router->route("web.cart"); ?>">
                            <img id="iconCarrinho" src="<?= url("media/images/icons/carrinho.png"); ?>" align="left">
                            <p>Meu Carrinho <br>
                                <?php
                                if(isset($_SESSION["carrinho"])){
                                    echo count($_SESSION["carrinho"]);
                                }else{
                                    echo "0";
                                }

                                ?> itens</p>
                        </a>
                    </div>


                    <div id="User">
                        <img class="icon" src="<?= url("media/images/icons/usuario.png"); ?>" align="left">



                        <div id="dropdown">
                            <img id="arrow" src="<?= url("media/images/icons/setaDropdown.png"); ?>">
                            <?php
                            if(!isset($_SESSION["logado"])): ?>

                                <p id ="makeLogin">Entrar/Cadastrar-se</p>
                                <p></p>
                                <img class="iconDrop" src="<?= url("media/images/icons/entrar.png"); ?>" align="left">
                                <a href="<?= $router->route("web.loginscreen"); ?>">Logar</a>
                                <p></p>
                                <img class="iconDrop" src="<?= url("media/images/icons/addUser.png"); ?>" align="left">
                                <a href="<?= $router->route("web.register"); ?>">Cadastrar</a>
                                <p></p>

                            <?php endif; ?>

                            <?php

                            if(isset($_SESSION["logado"])): ?>
                                <p id="hiUser">Olá, <?= $_SESSION["nomeUsuario"]; ?></p>

                                <img class="iconDrop" src="<?= url("media/images/icons/minhaConta.png"); ?>">
                                <a href="<?= $router->route("web.myaccount"); ?>" class="subItem">Minha Conta</a>
                                <p></p>


                                <?php if($_SESSION["permissao"] == "TRUE"): ?>
                                        <img class="iconDrop" src="<?= url("media/images/icons/painelAdm.png"); ?>">
                                        <a href="<?= $router->route("web.admin"); ?>">Painel Adiministrativo</a>
                                        <p></p>
                                <?php endif; ?>

                                <img class="iconDrop" class="icon" src="<?= url("media/images/icons/sair.png"); ?>">
                                <a href="#" class="subItem logout" data-action="<?= $router->route("usuario.logout"); ?>">Sair</a>

                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>

            <a href="<?= $router->route("web.carrinho"); ?>">
                <img class="carrinhoMobile" src="https://img.icons8.com/ios/30/ffffff/shopping-bag-filled.png">
            </a>

            <input type="checkbox" id="menuHamburger" name="menuHamburger" onchange="FecharDropUsuario()">
            <label for="menuHamburger"><img class="imgMenu" src="https://img.icons8.com/ios/30/ffffff/menu-filled.png"></label>

            <nav id="menuMobile">
                <label for="menuHamburger"><img id="close" src="https://img.icons8.com/metro/30/ffffff/multiply.png"></label>

                <?php if(isset($_SESSION["logado"])): ?>
                    <input type="checkbox" id="dropUsuario" name="dropUsuario" onchange="pegarValorCheck(this.checked)">
                    <label for="dropUsuario"><p id="logarMobile"><img id="iconUsuarioMobile" src="media/images/icons/usuario.png"> Olá, <?php echo $_SESSION["nomeUsuario"]; ?><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABmJLR0QA/wD/AP+gvaeTAAAAeklEQVQ4je3RQQrCMBBA0VaoxPsLLjyFuLCe7nXTQipjk9iNi37IbvIYkq47+v8woK+Y6zGUhs544I5TAbvihVTClkI0w5ZidAaf1q3QAIM3LltbhmgzlqEJ48fF23zyxq/vV7lp22YNaDu2gf6OBeh+LENT9Qcc7W4CeCtONCyKZ+wAAAAASUVORK5CYII="></p></label>

                    <ul id="subItemUsuario">
                        <li><a href="<?= $router->route("web.myaccount"); ?>">Minha Conta</a></li>
                        <li><a class="logout" href="#" data-action="<?= $router->route("usuario.logout"); ?>">Sair</a></li>
                    </ul>


                <?php else: ?>
                        <a id="logarMobile" href="<?= $router->route("web.loginscreen"); ?>">
                            <img id="iconUsuarioMobile" src="<?= url("media/images/icons/usuario.png"); ?>">
                            Entrar/Cadastrar-se
                        </a>
                <?php endif; ?>

                <ul>
                    <li><a href="<?= url("Roupas/pagina-1"); ?>">Roupas</a></li>
                    <li><a href="<?= $router->route("web.home"); ?>">Home</a></li>
                    <li><a href="<?= url("Calcados/pagina-1"); ?>">Calçados</a></li>
                    <li><a href="<?= url("Acessorios/pagina-1"); ?>">Acessórios</a></li>
                    <li><a href="<?= url("Promocao/pagina-1"); ?>">
                            Promoções
                        </a>
                    </li>
                    <li><a href="#">Atletas</a></li>


                </ul>


            </nav>


            <nav id="menu">
                <ul id="menu-web" class="nav justify-content-center">
                    <li class="nav-item ">
                        <a class="nav-link pagMenu" href="<?= $router->route("web.home"); ?>">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link pagMenu" href="<?= url("Roupas/pagina-1"); ?>">Roupas</a>

                        <ul class="subCategorias">
                            <li class="categ">
                                <b>Marcas</b>
                                <ul class="opcoes">
                                    <?php
                                        foreach (MARCAS as $indice => $value):
                                            
                                            echo "<li><a class='subOpcoes' href='". url("Roupas/$value/pagina-1"). "'>$value</a></li>";
                                            
                                        endforeach;

                                    ?>

                                </ul>
                            </li>
                            <li class="categ">
                                <b>Categorias</b>
                                <ul class="opcoes">
                                    <?php
                                        foreach (ROUPAS as $indice => $value):
                                            
                                                echo "<li>
                                                        <a class='subOpcoes' href='".url("Roupas/$value/pagina-1")."'>
                                                            $value
                                                        </a>
                                                      </li>";

                                        endforeach;
                                    ?>

                                </ul>
                            </li>
                            <li class="categ">
                                <b>Gênero</b>
                                <ul class="opcoes">
                                    <li><a class="subOpcoes" href="<?= url("Roupas/Masculino/pagina-1"); ?>">Masculino</a></li>
                                    <li><a class="subOpcoes" href="<?= url("Roupas/Feminino/pagina-1");  ?>">Feminino</a></li>
                                </ul>
                            </li>

                        </ul>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link pagMenu" href="<?= url("Calcados/pagina-1"); ?>">Calçados</a>

                        <ul class="subCategorias">
                            <li class="categ">
                                <b>Marcas</b>
                                <ul class="opcoes">
                                    <?php
                                        foreach (MARCAS as $indice => $value):
                                            
                                            echo "<li><a class='subOpcoes' href='". url("Calcados/$value/pagina-1"). "'>$value</a></li>";
                                            
                                        endforeach;

                                    ?>

                                </ul>
                            </li>

                            <li class="categ">
                                <b>Gênero</b>
                                <ul class="opcoes">
                                    <li><a class="subOpcoes" href="<?=url("Calcados/Masculino/pagina-1"); ?>">Masculino</a></li>
                                    <li><a class="subOpcoes" href="<?=url("Calcados/Feminino/pagina-1"); ?>">Feminino</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link pagMenu" href="<?= url("Acessorios/pagina-1"); ?>">Acessórios</a>

                        <ul class="subCategorias">
                            <li class="categ">
                                <b>Marcas</b>
                                <ul class="opcoes">
                                    <?php
                                        foreach (MARCAS as $indice => $value):
                                            
                                            echo "<li><a class='subOpcoes' href='". url("Acessorios/$value/pagina-1"). "'>$value</a></li>";
                                            
                                        endforeach;

                                    ?>

                                </ul>
                            </li>
                            <li class="categ">
                                <b>Categorias</b>
                                <ul class="opcoes">
                                    <li><a class="subOpcoes" href="<?= url("Acessorios/Bone/pagina-1"); ?>">Boné</a></li>
                                    <li><a class="subOpcoes" href="<?= url("Acessorios/Meia/pagina-1"); ?>">Meia</a></li>
                                    <li><a class="subOpcoes" href="<?= url("Acessorios/Gorro/pagina-1"); ?>">Gorro</a></li>
                                    <li><a class="subOpcoes" href="<?= url("Acessorios/Mochila/pagina-1"); ?>">Mochila</a></li>
                                    <li><a class="subOpcoes" href="<?= url("Acessorios/Carteira/pagina-1"); ?>">Carteira</a></li>
                                    <li><a class="subOpcoes" href="<?= url("Acessorios/Chaveiro/pagina-1"); ?>">Chaveiro</a></li>
                                </ul>
                            </li>
                            <li class="categ">
                                <b>Gênero</b>
                                <ul class="opcoes">
                                    <li><a class="subOpcoes" href="<?= url("Acessorios/Masculino/pagina-1"); ?>">Masculino</a></li>
                                    <li><a class="subOpcoes" href="<?= url("Acessorios/Feminino/pagina-1"); ?>">Feminino</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li id="lipromocao" class="nav-item">
                        <a id="promocao" class="nav-link pagMenu" href="<?= url("Promocao/pagina-1"); ?>">Promoções</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pagMenu" href="#">Atletas</a>
                    </li>
                </ul>
            </nav>
        </header>


        <form action="view/produtos.php?busca" method="post" id="pesquisaMobile">
            <input type="search" name="campoBusca" placeholder="O que está procurando?">

            <button type="submit">
                <img id="iconSearch" src="https://img.icons8.com/material-sharp/25/757575/search.png">
            </button>
        </form>

        <main id="conteudo">
            <?= $v->section("content"); ?>
        </main>

        <footer id="rodape">

            <div id="newslatters">

                <div id="esquerda">
                    <h3>Christ Board Shop</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sagittis blandit semper. Nam ut maximus orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi finibus erat ac nunc lobortis, eu imperdiet ex sollicitudin. Proin vitae eros convallis, laoreet tortor ac, tincidunt lacus. In malesuada suscipit gravida.</p>
                </div>

                <div id="direita">
                    <h3>Assine nossa <b id="news">NEWSLATTER!</b></h3>
                    <input id="txtnews" type="email" placeholder="Digite seu E-mail">
                    <button id="btnOk"><b>OK</b></button>

                    <div id="RedesSociais">
                        <div id="face" class="redes"></div>
                        <div id="insta" class="redes"></div>
                        <div id="you" class="redes"></div>
                    </div>
                </div>

            </div>

            <div id="dvcopy">
                <p id="copy">© <?= date("Y"); ?> Copyright Todos direitos reservados.</p>

            </div>
        </footer>
    </body>

    <script type="text/javascript" src="<?= url("jq/jquery-3.3.1.min.js"); ?>"></script>
    <script type="text/javascript" src="<?= url("bootstrap/bootstrap.js"); ?>"></script>

    <script type="text/javascript">
        $(".logout").on("click", function(e) {
            e.preventDefault();

            var data = $(this).data();


            console.log(data.action);

            $.post(data.action, function(){
                document.location.reload(true);

            }, "json").fail(function(){
                alert("Erro ao deslogar.");
            });
        });

    </script>

    <?= $v->section("scripts"); ?>
</html>
