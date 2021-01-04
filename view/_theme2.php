<!DOCTYPE html>
    <html lang="pt-br">
    <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">

            <link rel="shortcut icon" href="<?= url("media/images/icons/favicon.png"); ?>" type="img/x-png">
            <link rel="stylesheet" href="<?= url("bootstrap/bootstrap.css"); ?>" type="text/css">
            <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="<?= url("view/css/header_Footer2.css"); ?>">

            <?= $v->section("cssThisPage");  ?>

            <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <div id="topo">
                
                <a href="<?= $router->route("web.home"); ?>">
                    <img id="logo" src="<?= url("media/images/logoNovo.png"); ?>" alt="Skate Board Shop">
                </a>


                <div id="busca_carrinho_usuario">
                    <input id="campoPesquisa" type="text" name="search" placeholder="O que Procura ?">
                    <!-- <img id="iconPesquisa" src="<?= url("media/images/icons/pesquisar.png") ?>" alt="Pesquisar"> -->

                    <a href="<?= $router->route("web.cart"); ?>" class="icons" style="position:relative;">
                            <img src="<?= url("media/images/icons/sacola-compras.png"); ?>" alt="Sacola de Compras">
                            <b id="quantidade">
                                <?php
                                    if(isset($_SESSION["carrinho"])){
                                        echo count($_SESSION["carrinho"]);
                                    }else{
                                        echo "0";
                                    }

                                ?>
                            </b>
                    </a>
                    <div id="usuario">
                        <img src="<?= url("media/images/icons/user.png"); ?>" alt="Interações de Usuário">

                        <div id="menuDropUsuario">
                            
                            <?php if(!isset($_SESSION["logado"])): ?>

                                <ul>
                                    <a href="<?= $router->route("web.loginscreen"); ?>"><li class="itemMenuDrop">Login</li></a>
                                    <a href="<?= $router->route("web.register"); ?>"><li class="itemMenuDrop">Cadastrar-se</li></a>
                                </ul>

                            <?php else: ?>

                                <p class="itemMenuDrop" style="border-bottom:1px solid #eee">Olá, <?= $_SESSION["nomeUsuario"] ?></p>

                                <ul>
                                    <a href="<?= $router->route("web.myaccount"); ?>"><li class="itemMenuDrop">Minha Conta</li></a>
                                    <a href="#" class="logout" data-action="<?= $router->route("usuario.logout"); ?>"><li class="itemMenuDrop">Sair</li></a>
                                </ul>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <nav>
                <ul>
                    <li class="navPags"> 
                        <a href="<?= $router->route("web.home"); ?>" style="color: #000">Home</a>
                    </li>
                    
                    <li class="navPags">
                        <a href="<?= url("Roupas/pagina-1"); ?>" >Roupas</a>
                        <ul class="subNav">
                            <li class="itensNav">
                                <b>Marcas</b>
                                <ul class="opcoes opcMarca">
                                    <?php
                                        foreach (MARCAS as $indice => $value):
                                            
                                            echo "<li><a class='subOpcoes' href='". url("Roupas/$value/pagina-1"). "'>$value</a></li>";
                                            
                                        endforeach;

                                    ?>

                                </ul>
                            </li>
                            <li class="itensNav"> 
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
                            <li class="itensNav">
                                <b>Gênero</b>
                                <ul class="opcoes">
                                    <li><a class="subOpcoes" href="<?= url("Roupas/Masculino/pagina-1"); ?>">Masculino</a></li>
                                    <li><a class="subOpcoes" href="<?= url("Roupas/Feminino/pagina-1");  ?>">Feminino</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="navPags">
                        <a href="<?= url("Calcados/pagina-1"); ?>" >Calçados</a>
                        <ul class="subNav">
                            <li class="itensNav">
                                <b>Marcas</b>
                                <ul class="opcoes opcMarca">
                                    <?php
                                        foreach (MARCAS as $indice => $value):
                                            
                                            echo "<li><a class='subOpcoes' href='". url("Calcados/$value/pagina-1"). "'>$value</a></li>";
                                            
                                        endforeach;

                                    ?>

                                </ul>
                            </li>

                            <li class="itensNav">
                                <b>Gênero</b>
                                <ul class="opcoes">
                                    <li><a class="subOpcoes" href="<?=url("Calcados/Masculino/pagina-1"); ?>">Masculino</a></li>
                                    <li><a class="subOpcoes" href="<?=url("Calcados/Feminino/pagina-1"); ?>">Feminino</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="navPags">
                        <a href="<?= url("Acessorios/pagina-1"); ?>" >Acessórios</a>
                        <ul class="subNav">
                            <li class="itensNav">
                                <b>Marcas</b>
                                <ul class="opcoes opcMarca">
                                    <?php
                                        foreach (MARCAS as $indice => $value):
                                            
                                            echo "<li><a class='subOpcoes' href='". url("Acessorios/$value/pagina-1"). "'>$value</a></li>";
                                            
                                        endforeach;

                                    ?>

                                </ul>
                            </li>
                            <li class="itensNav">
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
                            <li class="itensNav">
                                <b>Gênero</b>
                                <ul class="opcoes">
                                    <li><a class="subOpcoes" href="<?= url("Acessorios/Masculino/pagina-1"); ?>">Masculino</a></li>
                                    <li><a class="subOpcoes" href="<?= url("Acessorios/Feminino/pagina-1"); ?>">Feminino</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="navPags">
                        <a href="<?= url("Promocao/pagina-1"); ?>" >Promoções</a>
                    </li>
                    <li class="navPags">
                        <a href="#">
                            Skate
                        </a>
                    </li>
                </ul>
            </nav>
        </header>


    <main id="conteudo">
            <?= $v->section("content"); ?>
    </main>
        
    <footer>
        <img id="logoRodape" src="<?= url("media/images/logoNovoBranco.png"); ?>" alt="">

        <div id="sobre">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>

        <div id="medias">
            REDES:
            <a href="#"><img class="iconsFooter" src="<?= url("media/images/icons/iconFace.png"); ?>" alt="Facebook"></a>
            <a href="#"><img class="iconsFooter" src="<?= url("media/images/icons/iconInsta.png"); ?>" alt="Instagram"></a>
        </div>

        <div id="copy">
            © <?= date("Y"); ?> Copyright Todos direitos reservados.
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