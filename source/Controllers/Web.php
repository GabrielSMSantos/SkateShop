<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Produtos;
use Source\Models\Usuarios;
use Source\Controllers\ProdutosController;

class Web
{
    /** @view Engine  */
    private $view;

    public function __construct($router)
    {
        session_start();

        $this->view = Engine::create(
            dirname(__DIR__, 2)."/view",
            "php"
        );

        $this->view->addData(["router" => $router]);
    }

    public function home(): void
    {
        unset($_SESSION["busca"]);
        unset($_SESSION["dataFiltro"]);
        
        $products = Produtos::searchProducts("PromocaoHome", "", 1, "Lancamentos");

        echo $this->view->render("home", [
            "title" => "Home",
            "products" => $products
        ]);
    }

    public function ordemProducts(array $data): void
    {
        $page = empty($data["page"]) ? 1 : str_replace("-", "",filter_var($data["page"], FILTER_SANITIZE_NUMBER_INT));
        $ordem = empty($data["order"]) ? "Lancamentos" : $data["order"];

        if (isset($data["category"]) || isset($data["subCategory"])) {
            $category = empty($data["category"]) ? "" : $data["category"];
            $subCategory = empty($data["subCategory"]) ? "" : $data["subCategory"];
            $url = $category.(empty($data["subCategory"]) ? "" : "/".$data["subCategory"]);
            $busca = empty($_POST["busca"]) ? " " : filter_var($_POST["busca"], FILTER_SANITIZE_STRING);
            // $dataProducts = array($category, $subCategory, $url, $busca, $page, "Header");
            
            if (!empty($category) || !empty($subCategory)) {
                $products = Produtos::searchProducts($category, $subCategory, $page, $ordem);

            } else if (!empty($busca)) {
                $url = "Busca";
                $products = Produtos::searchProducts("Busca", $busca, $page, $ordem);

            } else {
                $products = Produtos::searchProducts($category, $subCategory, $page, $ordem);
            }

        } else if (isset($_SESSION["busca"])) {
                $products = Produtos::FiltroProducts("Busca", "", "", "", "", $_SESSION["busca"], $page, $ordem);

                $url = "Busca";

        } else {
            if (isset($_SESSION["dataFiltro"][0]) || isset($_SESSION["dataFiltro"][1]) || isset($_SESSION["dataFiltro"][2]) || isset($_SESSION["dataFiltro"][3])) {
                $products = Produtos::FiltroProducts($_SESSION["category"], $_SESSION["dataFiltro"][0], $_SESSION["dataFiltro"][1], 
                                                   $_SESSION["dataFiltro"][2], $_SESSION["dataFiltro"][3], " ", $page, $ordem);

                $url = "Filtro";
            }
        }
 

        echo $this->view->render("produtos", [
            "title" => "Produtos",
            "products" => $products,
            "order" => $ordem,
            "page" => $page,
            "totalPage" => Produtos::$totalPaginas,
            "url" => $url
        ]);
    }

    public function filtroProducts(array $data): void
    {       
        $page = empty($data["page"]) ? 1 : str_replace("-", "", filter_var($data["page"], FILTER_SANITIZE_NUMBER_INT));
        
        if ($_POST) {
            $marca = empty($data["chkMarca"]) ? "" : $data["chkMarca"];
            $tamanho = empty($data["chkTamanho"]) ? "" : $data["chkTamanho"];
            $cor = empty($data["chkCor"]) ? "" : $data["chkCor"];
            $genero = empty($data["chkGenero"]) ? "" : $data["chkGenero"];
            $_SESSION["dataFiltro"] = array($marca, $tamanho, $cor, $genero);
        }
            
        if (isset($_SESSION["busca"])) {
            $result = Produtos::FiltroProducts("Busca", $_SESSION["dataFiltro"][0], $_SESSION["dataFiltro"][1], 
                                               $_SESSION["dataFiltro"][2], $_SESSION["dataFiltro"][3], $_SESSION["busca"], $page, "Lancamentos");

        } else if (isset($_SESSION["dataFiltro"][0]) || isset($_SESSION["dataFiltro"][1]) || isset($_SESSION["dataFiltro"][2]) || isset($_SESSION["dataFiltro"][3])) {
            $result = Produtos::FiltroProducts($_SESSION["category"], $_SESSION["dataFiltro"][0], $_SESSION["dataFiltro"][1], 
                                               $_SESSION["dataFiltro"][2], $_SESSION["dataFiltro"][3], "", $page, "Lancamentos");
        } else {
            $result = "";
        }
        
        echo $this->view->render("produtos", [
            "title" => "Produtos",
            "products" => $result,
            "order" => "Lancamentos",
            "page" => $page,
            "totalPage" => Produtos::$totalPaginas,
            "url" => "Filtro"
        ]);
    }

    public function products(array $data): void
    {
        $category = empty($data["category"]) ? "" : $data["category"];
        $subCategory = empty($data["subCategory"]) ? "" : $data["subCategory"];
        $page = empty($data["page"]) ? 1 : str_replace("-", "",filter_var($data["page"], FILTER_SANITIZE_NUMBER_INT));
        $url = $category.(empty($data["subCategory"]) ? "" : "/".$data["subCategory"]);
        $_SESSION["category"] = $category;


        if (!empty($_POST["busca"]) || (empty($_POST["busca"]) && empty($_SESSION["category"]))) {
            $_SESSION["busca"] = empty($_POST["busca"]) ? " " : filter_var($_POST["busca"], FILTER_SANITIZE_STRING);
        }

        if (!empty($_SESSION["busca"]) && empty($category) || $category == "Busca") {           
            $url = "Busca";
            $products = Produtos::searchProducts("Busca", $_SESSION["busca"], $page, "Lancamentos");

        } else if (!empty($category) || !empty($subCategory)) {
            unset($_SESSION["busca"]);
            $products = Produtos::searchProducts($category, $subCategory, $page, "Lancamentos");

        } else {
            unset($_SESSION["busca"]);
            $products = Produtos::searchProducts($category, $subCategory, $page, "Lancamentos");
        }

        echo $this->view->render("produtos", [
            "title" => "Produtos",
            "products" => $products,
            "order" => "Lancamentos",
            "page" => $page,
            "totalPage" => Produtos::$totalPaginas,
            "url" => $url
        ]);
    }

    public function detailProduct(array $data): void
    {
        unset($_SESSION["busca"]);
        unset($_SESSION["dataFiltro"]);
        
        $nameProduct = empty($data["nameProduct"]) ? "" : str_replace("-", " ", $data["nameProduct"]);

        $product = Produtos::detalhesProduto($nameProduct);

        echo $this->view->render("detalhesProduto", [
            "title" => str_replace("-", " ", $data["nameProduct"]),
            "product" => $product,
            "colorSelected" => $data["color"]
        ]);
    }

    public function cart(): void
    {
        unset($_SESSION["busca"]);
        unset($_SESSION["dataFiltro"]);
        
        $products = array();

        if (isset($_SESSION["carrinho"]) && count($_SESSION["carrinho"]) != 0) {

            foreach ($_SESSION["carrinho"] as $id) {
                $result = Produtos::detalhesProdutoCart($id);
                $products[] = $result;
            }

        }

        echo $this->view->render("carrinho", [
            "title" => "Carrinho de Compras",
            "products" => $products
        ]);
    }

    public function loginScreen(): void
    {
        unset($_SESSION["busca"]);
        unset($_SESSION["dataFiltro"]);
        
        echo $this->view->render("login", [
            "title" => "Tela de Login"
        ]);
    }
    
    public function forgotPassword(): void
    {
        echo $this->view->render("forgotPassword", [
            "title" => "Esqueci a Senha"
        ]);
    }

    public function newPassword(): void
    {
        if (isset($_GET["dataConfirm"])) {
            $_SESSION["confirm"] = $_GET["dataConfirm"];

            header("Location: http://localhost/SkateShop/Nova-Senha");
        }
        
        echo $this->view->render("newPassword", [
            "title" => "Criar nova senha"
        ]);
    }

    public function myaccount(): void
    {
        unset($_SESSION["busca"]);
        
        if (isset($_SESSION["logado"])) {
            $id = isset($_SESSION["logado"]) ? $_SESSION["idUsuario"] : "";

            $user = Usuarios::infoConta($id);

            echo $this->view->render("minhaConta", [
                "title" => "Minha Conta",
                "user" => $user
            ]);

        } else {
            header("Location: /SkateShop");
        }



    }

    public function register(array $data): void
    {
        unset($_SESSION["busca"]);
        
        echo $this->view->render("cadastro", [
            "title" => "Tela de Cadastro"
        ]);
    }

    public function admin(): void
    {
        unset($_SESSION["busca"]);
        
        if($_SESSION["permissao"] == "FALSE" || !isset($_SESSION["logado"])){
            header("Location: /SkateShop");
        }

        echo $this->view->render("adminPanel", [
            "title" => "Painel de Administrador"
        ]);
    }

    public function adminconfigs(): void
    {
        echo $this->view->render("configuracoes", [
            "title" => "Configurações do Site"
        ]);
    }


    public function buy(array $data): void
    {
        $id = empty($data["id"]) ? "" : filter_var($data["id"], FILTER_SANITIZE_NUMBER_INT);
        $quantidade = empty($data["quantidade"]) ? 1 : filter_var($data["quantidade"], FILTER_SANITIZE_NUMBER_INT);
        $tamanho = empty($data["tamanho"]) ? "" : $data["tamanho"];

        if (!isset($_SESSION["carrinho"]) || !in_array($id, $_SESSION["carrinho"])) {
            $_SESSION["carrinho"][] = $id;
            $_SESSION["quantidade"][$id] = $quantidade;
            $_SESSION["tamanho"][$id] = $tamanho;

        } else {
            $_SESSION["quantidade"][$id] += $quantidade;
        }

        echo json_encode("Produto Adicionado!");
    }

    public function alterarquantidadecarrinho(array $data): void
    {
        if ($data["method"] == "incremento") {
            $_SESSION["quantidade"][$data["id"]] += 1;

        } else if ($data["method"] == "decremento") {

            if ($_SESSION["quantidade"][$data["id"]] == 1) {
                $idExcluir = array_search($data["id"], $_SESSION["carrinho"]);
                unset($_SESSION["carrinho"][$idExcluir]);
                unset($_SESSION["quantidade"][$data["id"]]);
                unset($_SESSION["tamanho"][$data["id"]]);

            } else {
                $_SESSION["quantidade"][$data["id"]] -= 1;
            }

        } else {
            $idExcluir = array_search($data["id"], $_SESSION["carrinho"]);
            unset($_SESSION["carrinho"][$idExcluir]);
            unset($_SESSION["quantidade"][$data["id"]]);
            unset($_SESSION["tamanho"][$data["id"]]);
        }

        echo json_encode("Quantidade Alterada!");
    }

    public function error(array $data): void
    {
        echo "</h1>Erro {$data["errCode"]}</h1>";
    }
}