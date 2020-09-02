<?php

namespace Source\Models;

class Produtos
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

    public static function totalNumRowsFiltro(string $category, string $marca, string $tamanho, string $cor, string $genero): array
    {
        try{

            if ($category == "Roupas" || $category == "Calcados" || $category == "Acessorios") {

                if (in_array($marca, MARCAS)) {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND marca= :marca");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':marca', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->execute();

                } else if (!empty($tamanho)) {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND tamanho= :tamanho");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':tamanho', $tamanho, \PDO::PARAM_STR, 2);
                    $stmt->execute();

                } else if (!empty($cor)) {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND cor= :cor");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':cor', $cor, \PDO::PARAM_STR, 2);
                    $stmt->execute();

                } else if (!empty($genero)) {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND genero= :genero");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':genero', $genero, \PDO::PARAM_STR, 2);
                    $stmt->execute();
                }

            }

            self::$inicioExibir = (self::$produtos_por_pagina * $paginaTemp) - self::$produtos_por_pagina;
            self::$totalPaginas = ceil($stmt->rowCount() / self::$produtos_por_pagina);

            return Produtos::searchProducts($category, $subCategory, self::$inicioExibir);

        } catch(\PDOException $e) {
            echo "ERROR: ".$e->getMessage();
        }
    }    

    public static function calculoPaginacao(int $statement, int $paginaAtual): void
    {
        self::$inicioExibir = (self::$produtos_por_pagina * $paginaAtual) - self::$produtos_por_pagina;
        self::$totalPaginas = ceil($statement / self::$produtos_por_pagina);
    }  


    public static function searchProducts(string $category, string $subCategory, int $paginaTemp): array
    {
        try {

            if ($category == "Roupas" || $category == "Calcados" || $category == "Acessorios") {

                if (in_array($subCategory, MARCAS)) {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND marca= :marca");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':marca', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->execute();
                    self::calculoPaginacao($stmt->rowCount(), $paginaTemp);

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND marca= :marca ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':marca', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else if (in_array($subCategory, ROUPAS) || in_array($subCategory, ACESSORIOS)) {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND subCategoria= :subCategoria");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':subCategoria', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->execute();
                    self::calculoPaginacao($stmt->rowCount(), $paginaTemp);

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND subCategoria= :subCategoria ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':subCategoria', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else if ($subCategory == "Masculino" || $subCategory == "Feminino" || $subCategory == "Unissex") {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND genero= :genero");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':genero', $subCategory, \PDO::PARAM_STR, 10);
                    $stmt->execute();
                    self::calculoPaginacao($stmt->rowCount(), $paginaTemp);

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND genero= :genero ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':genero', $subCategory, \PDO::PARAM_STR, 10);
                    $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else {
                    $stmt = Conexao::prepare("SELECT * FROM produtos where categoria= :categoria");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->execute();
                    self::calculoPaginacao($stmt->rowCount(), $paginaTemp);

                    $stmt = Conexao::prepare("SELECT * FROM produtos where categoria= :categoria ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();
                }


            } else if (in_array($category, MARCAS)) {
                $stmt = Conexao::prepare("SELECT * FROM produtos where marca= :categoria");
                $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                $stmt->execute();
                self::calculoPaginacao($stmt->rowCount(), $paginaTemp);

                $stmt = Conexao::prepare("SELECT * FROM produtos where marca= :categoria ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                $stmt->execute();

            } else if ($category == "Promocao" || $category == "PromocaoHome") {

                $stmt = Conexao::prepare("SELECT * FROM produtos WHERE promocao > 0");
                $stmt->execute();
                self::calculoPaginacao($stmt->rowCount(), $paginaTemp);

                if ($category == "Promocao") {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE promocao > 0 ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else {
                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE promocao > 0 ORDER BY id desc limit :inicioExibir, 4");
                    $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                    $stmt->execute();
                }

            } else if ($category == "Busca") {

                $busca = "%".$subCategory."%";
                $stmt = Conexao::prepare("SELECT * FROM produtos where nomeProduto LIKE :busca");
                $stmt->bindParam(':busca', $busca, \PDO::PARAM_STR);
                $stmt->execute();
                self::calculoPaginacao($stmt->rowCount(), $paginaTemp);

                $stmt = Conexao::prepare("SELECT * FROM produtos where nomeProduto LIKE :busca ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                $stmt->bindParam(':busca', $busca, \PDO::PARAM_STR);
                $stmt->bindParam(':inicioExibir',self::$inicioExibir, \PDO::PARAM_INT);
                $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                $stmt->execute();

            } else {
                $stmt = Conexao::prepare("SELECT * FROM produtos");
                $stmt->execute();
                self::calculoPaginacao($stmt->rowCount(), $paginaTemp);

                $stmt = Conexao::prepare("SELECT * FROM produtos ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
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