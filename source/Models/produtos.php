<?php

namespace Source\Models;

class Produtos extends Conexao
{
    private static $produtos_por_pagina = 12;
    public static $inicioExibir;
    public static $totalPaginas;
    public static $quantLinhas;


    public static function cadastrarProduto(string $nomeProduto, float $preco, string $cor, string $tamanho,
                                            string $categoria, string $subCategoria, string $marca, string $modelo,
                                            string $genero, string $imagem, string $descricao): int
    {
        try {
            $stmt = Conexao::getInstance()->prepare(
                "INSERT INTO produtos (
                                    id, 
                                    nomeProduto,
                                    preco,
                                    cor,
                                    tamanho,
                                    categoria,
                                    subCategoria,
                                    marca,
                                    modelo,
                                    genero,
                                    imagem,
                                    descricao,
                                    promocao )
                        VALUES (
                                :id,
                                :nomeProduto,
                                :preco,
                                :cor,
                                :tamanho,
                                :categoria,
                                :subCategoria,
                                :marca,
                                :modelo,
                                :genero,
                                :imagem,
                                :descricao,
                                :promocao )");

            $stmt->execute(array(
                ':id' => '',
                ':nomeProduto' => $nomeProduto,
                ':preco' => $preco,
                ':cor' => $cor,
                ':tamanho' => $tamanho,
                ':categoria' => $categoria,
                ':subCategoria' => $subCategoria,
                ':marca' => $marca,
                ':modelo' => $modelo,
                ':genero' => $genero,
                ':imagem' => $imagem,
                ':descricao' => $descricao,
                ':promocao' => 00.00
            ));

            return $stmt->rowCount();

        } catch (\PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function detalhesProduto(string $name): array
    {
        $stmt = Conexao::prepare("SELECT * FROM produtos WHERE nomeProduto= :name");
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->execute();

        Produtos::$quantLinhas = $stmt->rowCount();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function detalhesProdutoCart(int $id): array
    {
        $stmt = Conexao::prepare("SELECT * FROM produtos WHERE id= :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        Produtos::$quantLinhas = $stmt->rowCount();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


    // ESTA FUNCAO É PARA PEGAR O NUMERO TOTAL DE LINHAS DE REGISTROS NO BANCO DE ACORDO COM CADA CATEGORIA DE PRODUTOS SELECIONADO
    public static function paginacaoProdutos(string $category, string $subCategory, int $paginaTemp): array
    {
        try {

            if ($category == "Roupas" || $category == "Calcados" || $category == "Acessorios") {

                if ($subCategory == "Grizzly" || $subCategory == "Diamond" || $subCategory == "Dgk" ||
                    $subCategory == "Supra" || $subCategory == "Stussy" || $subCategory == "Primitive" ||
                    $subCategory == "Huf" || $subCategory == "Nike" || $subCategory == "Adidas" ||
                    $subCategory == "Puma" || $subCategory == "Supra" || $subCategory == "Vans" ||
                    $subCategory == "New Balance" || $subCategory == "Asics") {

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND marca= :marca");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':marca', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->execute();

                } else if ($subCategory == "Camiseta" || $subCategory == "Camisa" || $subCategory == "Moletom" ||
                    $subCategory == "Jaqueta" || $subCategory == "Calca" || $subCategory == "Bermuda" ||
                    $subCategory == "Bone" || $subCategory == "Meia" || $subCategory == "Gorro" ||
                    $subCategory == "Gorro" || $subCategory == "Mochila" || $subCategory == "Carteira" ||
                    $subCategory == "Chaveiro") {

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND subCategoria= :subCategoria");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':subCategoria', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->execute();

                } else if ($subCategory == "Masculino" || $subCategory == "Feminino") {

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND genero= :genero");
                    $stmt->bindParam(':categoria', $categorys, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':genero', $subCategory, \PDO::PARAM_STR, 10);
                    $stmt->execute();

                } else {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->execute();
                }


            } else if ($category == "Grizzly" || $category == "Diamond" || $category == "Dgk" ||
            $category == "Supra" || $category == "Stussy" || $category == "Primitive" ||
            $category == "Huf" || $category == "Nike" || $category == "Adidas" ||
            $category == "Puma" || $category == "Supra" || $category == "Vans" ||
            $category == "New Balance" || $category == "Asics") {
                
                $stmt = Conexao::prepare("SELECT * FROM produtos WHERE marca= :categoria");
                $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR);
                $stmt->execute();

            } else if ($category == "Promocao") {

                $stmt = Conexao::prepare("SELECT * FROM produtos WHERE promocao > 0");
                $stmt->execute();

            } else if ($category == "Busca") {

                $busca = "%".$subCategory."%";
                $stmt = Conexao::prepare("SELECT * FROM produtos WHERE nomeProduto LIKE :busca");
                $stmt->bindParam(':busca', $busca, \PDO::PARAM_STR);
                $stmt->execute();

            } else {
                $stmt = Conexao::prepare("SELECT * FROM produtos");
                $stmt->execute();
            }

            self::$inicioExibir = (self::$produtos_por_pagina * $paginaTemp) - self::$produtos_por_pagina;
            self::$totalPaginas = ceil($stmt->rowCount() / self::$produtos_por_pagina);


            return Produtos::buscarPorTipo($category, $subCategory, self::$inicioExibir);

        } catch (\PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }


    public static function buscarPorTipo(string $category, string $subCategory, int $inicioExibirTemp): array
    {
        try {

            if ($category == "Roupas" || $category == "Calcados" || $category == "Acessorios") {

                if ($subCategory == "Grizzly" || $subCategory == "Diamond" || $subCategory == "Dgk" ||
                    $subCategory == "Supra" || $subCategory == "Stussy" || $subCategory == "Primitive" ||
                    $subCategory == "Huf" || $subCategory == "Nike" || $subCategory == "Adidas" ||
                    $subCategory == "Puma" || $subCategory == "Supra" || $subCategory == "Vans" ||
                    $subCategory == "New Balance" || $subCategory == "Asics") {

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND marca= :marca ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':marca', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->bindParam(':inicioExibir', $inicioExibirTemp, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else if ($subCategory == "Camiseta" || $subCategory == "Camisa" || $subCategory == "Moletom" ||
                    $subCategory == "Jaqueta" || $subCategory == "Calca" || $subCategory == "Bermuda" ||
                    $subCategory == "Bone" || $subCategory == "Meia" || $subCategory == "Gorro" ||
                    $subCategory == "Gorro" || $subCategory == "Mochila" || $subCategory == "Carteira" ||
                    $subCategory == "Chaveiro") {

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND subCategoria= :subCategoria ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':subCategoria', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->bindParam(':inicioExibir', $inicioExibirTemp, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else if ($subCategory == "Masculino" || $subCategory == "Feminino") {

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND genero= :genero ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':genero', $subCategory, \PDO::PARAM_STR, 10);
                    $stmt->bindParam(':inicioExibir', $inicioExibirTemp, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else {
                    $stmt = Conexao::prepare("SELECT * FROM produtos where categoria= :categoria ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':inicioExibir', $inicioExibirTemp, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();
                }


            } else if ($category == "Grizzly" || $category == "Diamond" || $category == "Dgk" ||
            $category == "Supra" || $category == "Stussy" || $category == "Primitive" ||
            $category == "Huf" || $category == "Nike" || $category == "Adidas" ||
            $category == "Puma" || $category == "Supra" || $category == "Vans" ||
            $category == "New Balance" || $category == "Asics") {

                $stmt = Conexao::prepare("SELECT * FROM produtos where marca= :categoria ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                $stmt->bindParam(':inicioExibir', $inicioExibirTemp, \PDO::PARAM_INT);
                $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                $stmt->execute();

            } else if ($category == "Promocao" || $category == "PromocaoHome") {

                if ($category == "Promoca") {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE promocao > 0 ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':inicioExibir', $inicioExibirTemp, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE promocao > 0 ORDER BY id desc limit :inicioExibir, 4");
                    $stmt->bindParam(':inicioExibir', $inicioExibirTemp, \PDO::PARAM_INT);
                    $stmt->execute();
                }

            } else if ($category == "Busca") {

                $busca = "%".$subCategory."%";
                $stmt = Conexao::prepare("SELECT * FROM produtos where nomeProduto LIKE :busca ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                $stmt->bindParam(':busca', $busca, \PDO::PARAM_STR);
                $stmt->bindParam(':inicioExibir',$inicioExibirTemp, \PDO::PARAM_INT);
                $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                $stmt->execute();

            } else {
                $stmt = Conexao::prepare("SELECT * FROM produtos ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                $stmt->bindParam(':inicioExibir', $inicioExibirTemp, \PDO::PARAM_INT);
                $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                $stmt->execute();
            }

            Produtos::$quantLinhas = $stmt->rowCount();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            echo "Error ".$e->getMessage();
        }

    }

    public static function updateProduto(string $nomeProduto, float $preco, string $cor, string $tamanho,
                                         string $categoria, string $subCategoria, string $marca, string $modelo,
                                         string $genero, string $imagem, stirng $descricao,
                                         float $promocao, int $id): int
    {
        try {
            $stmt = Conexao::prepare("UPDATE produtos SET nomeProduto= :nomeProduto, 
                                                              preco= :preco, 
                                                              cor= :cor, 
                                                              tamanho= :tamanho, 
                                                              categoria= :categoria, 
                                                              subCategoria= :subCategoria, 
                                                              marca= :marca, 
                                                              modelo= :modelo, 
                                                              genero= :genero, 
                                                              imagem= :imagem, 
                                                              descricao= :descricao, 
                                                              promocao= :promocao WHERE id= :id");
            $stmt->execute(array(
                ':nomeProduto' => $nomeProduto,
                ':preco' => $preco,
                ':cor' => $cor,
                ':tamanho' => $tamanho,
                ':categoria' => $categoria,
                ':subCategoria' => $subCategoria,
                ':marca' => $marca,
                ':modelo' => $modelo,
                ':genero' => $genero,
                ':imagem' => $imagem,
                ':descricao' => $descricao,
                ':promocao' => $promocao,
                ':id' => $id
            ));

            return $stmt->rowCount();

        } catch (\PDOException $e) {
            echo "Error".$e->getMessage();
        }
    }

    public static function deletarProduto(int $id): bool
    {
        $stmt = Conexao::prepare("DELETE FROM produtos WHERE id= :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);


        return $stmt->execute();
    }

}