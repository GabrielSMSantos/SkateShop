<?php 

namespace Source\Controllers;

use Source\Models\Produtos;

class ProdutosCtrl{
    private $categoria;
    private $marcaProduto;
    private $subCategoria;
    private $genero;
    private $busca; 
    private $url;

    public static function getCategoria(){
        return self::$categoria;
    }

    public static function getMarcaProduto(){
        return self::$marcaProduto;
    }

    public static function getSubCategoria(){
        return self::$subCategoria;
    }

    public static function getGenero(){
        return self::$genero;
    }

    public static function getBusca(){
        return self::$busca;
    }

    public static function getUrl(){
        return self::$url;
    }

    public static function setCategoria($valor){
        self::$categoria = $valor;
    }

    public static function setMarcaProduto($valor){
        self::$marcaProduto = $valor;
    }

    public static function setSubCategoria($valor){
        self::$subCategoria = $valor;
    }

    public static function setGenero($valor){
        self::$genero = $valor;
    }

    public static function setBusca($valor){
        self::$busca = $valor;
    }

    public static function setUrl($valor){
        self::$url = $valor;
    }


    public static function cadastrarProduto(){

    }

    public static function detalhesProduto(){

    }

    /*public static function paginacaoProdutosCtrl($categoria, $marcaProduto, $subCategoria, $genero, $busca){

        if(isset($_GET["pagina"])){ // TIRANDO O GET PAGINA DA URL PARA PASSAR NOVAMENTE SOMENTE OS FILTROS DE CATEGORIA PARA OS BOTOES DE PAGINA
            $url = strstr($_SERVER["REQUEST_URI"], "?");
            self::$url = substr_replace($url, "", -9, 10);
  
        }else{
            self::$url = strstr($_SERVER["REQUEST_URI"], "?");
        }
  
        self::$categoria = isset($_GET["categoria"]) ? $_GET["categoria"] : "";
        $categoriaParam = isset($_GET["categoria"]) ? "Categoria" : "";
  
        self::$marcaProduto = isset($_GET["marca"]) ? $_GET["marca"] : "";
        $marcaProdutoParam = isset($_GET["marca"]) ? "Marca" : "";
  
        self::$subCategoria = isset($_GET["subCategoria"]) ? $_GET["subCategoria"] : "";
        $subCategoriaParam = isset($_GET["subCategoria"]) ? "subCategoria" : "";
  
        self::$genero = isset($_GET["genero"]) ? $_GET["genero"] : "";
        $generoParam = isset($_GET["genero"]) ? "genero" : "";
  
        self::$busca = isset($_GET["busca"]) ? $_GET["busca"] : "";
        $buscaParam = isset($_GET["busca"]) ? "busca" : "";
  
        $paramUrl = array(self::$categoria, self::$marcaProduto, self::$subCategoria, self::$genero, self::$busca);
        $param = implode("-", array($categoriaParam, $marcaProdutoParam, $subCategoriaParam, $generoParam, $buscaParam));
  
        // pagina atual
        $paginaAtual = (!isset($_GET["pagina"])) ? 1 : $_GET["pagina"];
  
        $produtos = Produtos::paginacaoProdutos($param, $paramUrl, $paginaAtual);
        

        return $produtos;
    }*/

    public static function filtro(array $data) 
    {
        $marca = empty($data["chkMarca"]) ? "" : $data["chkMarca"];
        $tamanho = empty($data["chkTamanho"]) ? "" : $data["chkTamanho"];
        $cor = empty($data["chkCor"]) ? "" : $data["chkCor"];
        $genero = empty($data["chkGenero"]) ? "" : $data["chkGenero"];

        if (!(empty($marca) || empty($tamanho) || empty($cor) || empty($genero))) {

            $result = Produtos::totalNumRowsFiltro($_SESSION["category"], $marca, $tamanho, $cor, $genero);
        }

        echo json_encode($data);
    }

    public static function buscarPorTipo(){
        
    }

    public static function updateProduto(){
        
    }

    public static function deletarProduto(){
        
    }

}