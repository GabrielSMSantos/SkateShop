<?php 

namespace Source\Controllers;

use Source\Models\Produtos;

class ProdutosController{
    private static string $marca;
    private static string $tamanho;
    private static string $cor;
    private static string $genero;
    private static string $categoria;
    private static string $subCategoria;
    private static int $page;
    private static string $tipoProcura;

    public static function getValuesFiltro (string $marca, string $tamanho, string $cor, string $genero, int $page): void
    {
        self::$marca = $marca;
        self::$tamanho = $tamanho;
        self::$cor = $cor;
        self::$genero = $genero;
        self::$page = $page;

        self::$tipoProcura = "Filtro";
    } 

    public static function getValuesPageProdutos (string $categoria, string $subCategoria, int $page): void 
    {
        self::$categoria = $categoria;
        self::$subCategoria = $subCategoria;
        self::$page = $page;

        self::$tipoProcura = "header";
    }

    public static function alterarOrdem (array $data)
    {  
        var_dump($data);

        if ($data["dataProducts"][5] == "Filtro") {
            $result = Produtos::FiltroProducts($data["dataProducts"][0], $data["dataProducts"][1], $data["dataProducts"][2], $data["dataProducts"][3], $data["dataProducts"][4], $data["dropdown"]);

        } else {
            $result = Produtos::searchProducts($data["dataProducts"][0], $data["dataProducts"][1], $data["dataProducts"][4], $data["dropdown"]);
        }

        echo json_encode($result);  
    }
    

    

}