<?php

/*
 * Url do site
 */
define("URL_BASE", "http://localhost/SkateShop");

/*
 * Banco de Dados
 */
define("DATABASE", [
    "host" => "localhost",
    "db_name" => "christboardshop",
    "username" => "root",
    "password" => ""
]);

define("MAIL", [
    "host" => "smtp.gmail.com",
    "port" => "587",
    "user" => "gabrielsaomartin@gmail.com",
    "passwd" => "snoopy@2000",
    "from_name" => "Gabriel São Martin Santos",
    "from_email" => "gabrielsaomartin@hotmail.com"
]);

define("MARCAS",
    array(
        "Grizzly",
        "Dc-Shoes",
        "Diamond",
        "Stussy",
        "High",
        "Supreme",
        "Primitive",
        "Nike Sb",
        "Vans",
        "Dgk",
        "Adidas",
        "Puma" ,
        "Champion"
    
));

define("CORES",
    array(
        "Preto" => "000000",
        "Branco" => "ffffff",
        "Laranja" => "FFA200",
        "Vermelho" => "ed1c24",
        "Verde" => "00B04E",
        "Azul" => "2162EB",
        "Rosa" => "F27EAA",
        "Amarelo" => "FFCD00",
    ));

define("ROUPAS",[
    "Camiseta",
    "Camisa",
    "Moletom",
    "Jaqueta",
    "Calca" => "Calça",
    "Bermuda"
]);

define("ACESSORIOS", [
    "Boné",
    "Meia",
    "Gorro",
    "Mochila",
    "Carteira",
    "Chaveiro"
]);

/*
 * Helper
 */
function url(string $uri = null): string
{
    if ($uri)
    {
        return URL_BASE."/{$uri}";
    }

    return URL_BASE;
}