<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= url("bootstrap/bootstrap.css"); ?>" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url("view/css/dashboard.css"); ?>">
    <?= $v->section("cssThisPage"); ?>

    <title><?= $title ?></title>
</head>
<body>
<header id="topo">
    <img id="logo" src="<?= url("media/images/logo2.png"); ?>"/>

    <a  href="<?= $router->route("web.home"); ?>" id="linkHome">
        <img src="https://png.icons8.com/material-rounded/20/2980b9/globe.png">
        Visite o Site
    </a>

    <div id="divUser">
        <img id="iconUser" src="https://png.icons8.com/color/40/000000/manager.png">
        <a href="#">Administrador</a>
        <img src="https://png.icons8.com/windows/15/ffffff/circled-chevron-down.png">

        <div id="dropdown">
            <img class="iconDrop" src="<?= url("media/images/icons/minhaConta.png"); ?>">
            <a href="<?= $router->route("web.myaccount"); ?>" class="subItem">Minha Conta</a>
            <p></p>
            <img class="iconDrop" src="<?= url("media/images/icons/painelAdm.png"); ?>">
            <a href="<?= $router->route("web.admin"); ?>" class="subItem">Painel Adiministrativo</a>
            <p></p>
            <img class="iconDrop" class="icon" src="<?= url("media/images/icons/sair.png"); ?>">
            <a href="../index.php?sair" class="subItem">Sair</a>
        </div>
    </div>
</header>

<div id="menuLateral">
    <div id="UserLogado">
        <img id="iconUser2" src="https://png.icons8.com/color/60/cccccc/manager.png" align="left">
        <h4 href="#"><b>Olá,</b><br> Administrador</h4>
    </div>
    <ul>
        <a href="<?= $router->route("web.admin"); ?>">
            <li class="pgActive">
                <img class="active" src="https://png.icons8.com/material-rounded/15/ffffff/home.png">
                Dashboard
            </li>
        </a>

        <a href="<?= $router->route("web.adminconfigs"); ?>">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material-sharp/15/ffffff/settings.png">
                Configurações
            </li>
        </a>

        <a href="../index.php?sair">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/metro/15/ffffff/shutdown.png">
                Sair / Logout
            </li>
        </a>

        <div class="Categoria">
            <b>Conteúdo</b>
            <img class="iconCategoria" src="https://png.icons8.com/material-sharp/20/ffffff/view-details.png">
        </div>

        <a href="depoimentos.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material/15/ffffff/megaphone.png">
                Depoimentios
            </li>
        </a>

        <a href="parceiros.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material-rounded/15/ffffff/handshake.png">
                Parceiros
            </li>
        </a>

        <a href="equipe.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material-rounded/15/ffffff/conference-call.png">
                Equipe
            </li>
        </a>

        <a href="servicos.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material-sharp/15/ffffff/briefcase.png">
                Serviços
            </li>
        </a>

        <a href="blog.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material-rounded/15/ffffff/edit.png">
                Blog
            </li>
        </a>

        <a href="portfolio.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/ios-glyphs/15/ffffff/wrench.png">
                Portifólio
            </li>
        </a>

        <a href="videos.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material-rounded/15/ffffff/youtube-play.png">
                Vídeos
            </li>
        </a>

        <a href="newsletter.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material-rounded/15/ffffff/new-post.png">
                Newsletter
            </li>
        </a>

        <div class="Categoria">
            <b>Configuração</b>
            <img class="iconCategoria" src="https://png.icons8.com/material-sharp/15/ffffff/settings.png">
        </div>

        <a href="usuarios.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material-sharp/15/ffffff/user.png">
                Usuário
            </li>
        </a>

        <a href="seo.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material-rounded/15/ffffff/globe.png">
                SEO
            </li>
        </a>

        <a href="redesSociais.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material/15/ffffff/facebook-f.png">
                Redes Sociais
            </li>
        </a>

        <a href="contato.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/android/15/ffffff/phone.png">
                Contato
            </li>
        </a>

        <a href="smtp.php">
            <li class="pgDesative">
                <img class="icon" src="https://png.icons8.com/material-outlined/15/ffffff/new-post.png">
                SMTP
            </li>
        </a>

        <div class="Categoria"></div>
    </ul>

</div>


<main>
    <?= $v->section("content"); ?>
</main>

</body>


<script type="text/javascript" src="<?= url("jq/jquery-3.3.1.min.js"); ?>"></script>
<script type="text/javascript" src="<?= url("bootstrap/bootstrap.js"); ?>"></script>
<?= $v->section("scripts"); ?>

</html>

