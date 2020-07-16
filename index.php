<?php

require __DIR__."/libs/autoload.php";

$router = new \CoffeeCode\Router\Router(URL_BASE);

/*
 * namespace dos Controladores
 */
$router->namespace("Source\Controllers");


/*
 * Home
 */
$router->group(null);
$router->get("/", "Web:home", "web.home");

/*
 * Carrinho
 */
$router->get("/Carrinho", "Web:cart", "web.cart");
$router->post("/Adicionar-Carrinho", "Web:buy", "web.buy");
$router->post("/Alterar-Quantidade-Carrinho", "Web:alterarquantidadecarrinho", "web.alterarquantidadecarrinho");

/*
 * Login
 */
$router->get("/Login", "Web:loginScreen", "web.loginscreen");
$router->get("/Esqueci-Senha", "Web:forgotPassword", "web.forgotpassword");
$router->get("/Nova-Senha", "Web:newPassword", "web.newpassword");

$router->post("/Entrar", "Usuario:login", "usuario.login");
$router->post("/Logout", "Usuario:logout", "usuario.logout");
$router->post("/Cadastrar", "Usuario:register", "usuario.register");
$router->post("/Enviar-Email", "SendEmail:send", "sendemail.send");

/*
 * Cadastrar
 */
$router->get("/Cadastrar", "Web:register", "web.register");
$router->post("/verificar-cpf", "Usuario:verifyAvailableCpf", "usuario.verifyavailablecpf");

/*
 * Minha Conta
 */
$router->get("/Minha-Conta", "Web:myaccount", "web.myaccount");
$router->post("/Editar-Conta", "Usuario:updateAccount", "usuario.updateAccount");

/*
 * Painel do Administrador
 */
$router->get("/Dashboard", "Web:admin", "web.admin");
$router->get("/Configuracoes", "Web:adminconfigs", "web.adminconfigs");

/*
 * Produtos
 */
$router->get("/{category}/pagina-{page}", "Web:products");
$router->get("/{category}/{subCategory}/pagina-{page}", "Web:products");

$router->group("/Produto");
$router->get("/{nameProduct}", "Web:detailProduct");

$router->group("/Busca");
$router->post("/pagina-{page}", "Web:products");

/*
 * Tela de Erro
 */
$router->group("/ooops");
$router->get("/{errCode}", "Web:error");

/*
 * Executando o roteamento
 */
$router->dispatch();


/*
 * Redirecionando para a pagina de erro
 */
if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}