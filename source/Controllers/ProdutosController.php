<?php 

namespace Source\Controllers;

use Source\Models\Produtos;

class ProdutosController{
    private $marca;
    private $tamanho;
    private $cor;
    private $genero;
    private $categoria;

    public static function getValuesFiltro ($marca, $tamanho, $cor, $genero) {

    } 

    public static function getValuesPageProdutos ($marca, $categoria, $genero) {

    }

    public static function alterarOrdem (array $data) {
        


        echo json_encode($data);
    }
    

    

}