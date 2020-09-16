<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Produtos;
use Source\Models\Usuarios;

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
        $products = Produtos::searchProducts("PromocaoHome", "", 1);

        echo $this->view->render("home", [
            "title" => "Home",
            "products" => $products
        ]);
    }

    public function filtroProducts(array $data): void
    {        
        $marca = empty($data["chkMarca"]) ? "" : $data["chkMarca"];
        $tamanho = empty($data["chkTamanho"]) ? "" : $data["chkTamanho"];
        $cor = empty($data["chkCor"]) ? "" : $data["chkCor"];
        $genero = empty($data["chkGenero"]) ? "" : $data["chkGenero"];
        $page = empty($data["page"]) ? 1 : str_replace("-", "",filter_var($data["page"], FILTER_SANITIZE_NUMBER_INT));
        $result = "";

        echo $_SERVER["REQUEST_URI"];

        if (!empty($marca) || !empty($tamanho) || !empty($cor) || !empty($genero)) {

            $result = Produtos::FiltroProducts($_SESSION["category"], $marca, $tamanho, $cor, $genero, $page);
        }

        echo $this->view->render("produtos", [
            "title" => "Produtos",
            "products" => $result,
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
        $busca = empty($_POST["busca"]) ? "" : filter_var($_POST["busca"], FILTER_SANITIZE_STRING);
        $_SESSION["category"] = $category;

        echo $_SERVER["REQUEST_URI"];
        
        $objProdutos = new Produtos();


        if (!empty($category) || !empty($subCategory)) {
            $products = Produtos::searchProducts($category, $subCategory, $page);

        } else if (!empty($busca)) {
            $url = "Busca";
            $products = Produtos::searchProducts("Busca", $busca, $page);

        } else {
            $products = Produtos::searchProducts($category, $subCategory, $page);
        }

        echo $this->view->render("produtos", [
            "title" => "Produtos",
            "products" => $products,
            "page" => $page,
            "totalPage" => Produtos::$totalPaginas,
            "url" => $url
        ]);
    }

    public function detailProduct(array $data): void
    {
        $nameProduct = empty($data["nameProduct"]) ? "" : str_replace("-", " ", $data["nameProduct"]);

        $product = Produtos::detalhesProduto($nameProduct);

        echo $this->view->render("detalhesProduto", [
            "title" => $data["nameProduct"],
            "product" => $product
        ]);
    }

    public function cart(): void
    {
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
        echo $this->view->render("cadastro", [
            "title" => "Tela de Cadastro"
        ]);
    }

    public function admin(): void
    {
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
        $quantidade = empty($data["quantidade"]) ? "" : filter_var($data["quantidade"], FILTER_SANITIZE_NUMBER_INT);
        $tamanho = empty($data["tamanho"]) ? "" : $data["tamanho"];


        if (!isset($_SESSION["carrinho"]) || !in_array($id, $_SESSION["carrinho"])) {
            $_SESSION["carrinho"][] = $id;
            $_SESSION["quantidade"][$id] = $quantidade;
            $_SESSION["tamanho"][$id] = $tamanho;

        } else {
            $_SESSION["quantidade"][$id] += $quantidade;
        }

        echo json_encode("Produto adicionado!");
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