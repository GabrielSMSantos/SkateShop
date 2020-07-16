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
    "port" => "465",
    "user" => "gabrielsaomartin@gmail.com",
    "passwd" => "snoopy@2000",
    "from_name" => "Gabriel São Martin Santos",
    "from_email" => "gabrielsaomartin@hotmail.com"
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