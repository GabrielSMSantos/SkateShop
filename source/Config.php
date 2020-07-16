<?php

/*
 * Url do site
 */
define("URL_BASE", "http://localhost/site-christ");

/*
 * Banco de Dados
 */
define("HOST","localhost");
define("NAME_DB","christboardshop");
define("USER","root");
define("PASSWORD","");

define("MAIL", [
    "host" => "",
    "port" => "",
    "user" => "",
    "passwd" => ""
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