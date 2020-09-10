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

    public static function FiltroProducts(string $category, string $marca, string $tamanho, string $cor, string $genero, int $paginaTemp): array
    {
        $sql = "SELECT * FROM produtos WHERE ";

        if($category == "Roupas" || $category == "Calcados" || $category == "Acessorios"){

            if(in_array($marca, MARCAS)) {
                $sql .= "marca= '$marca' ";

                if(!empty($tamanho)) {
                    $sql .= "AND tamanho= '$tamanho' ";

                    if(!empty($cor)){
                        $sql .= "AND cor= '$cor' ";

                        if(!empty($genero)) {
                            $sql .= "AND genero= '$genero' ";
                        }
    
                    } else if(!empty($genero)) {
                        $sql .= "AND genero= '$genero' ";
                    }

                } else if(!empty($cor)){
                    $sql .= "AND cor= '$cor' ";

                    if(!empty($tamanho)) {
                        $sql .= "AND tamanho= '$tamanho' ";

                        if(!empty($genero)) {
                            $sql .= "AND genero= '$genero' ";    
                        }

                    } else if(!empty($genero)) {
                        $sql .= "AND genero= '$genero' ";    
                    }

                } else if(!empty($genero)) {
                    $sql .= "AND genero= '$genero' ";

                }

            } else if(!empty($tamanho)){
                $sql .= "tamanho= '$tamanho' ";

                if(in_array($marca, MARCAS)) {
                    $sql .= "AND marca= '$marca' ";

                    if(!empty($cor)) {
                        $sql .= "AND cor= '$cor' ";
    
                    } else if(!empty($genero)) {
                        $sql .= "AND genero= '$genero' ";
                    }

                } else if(!empty($cor)) {
                    $sql .= "AND cor= '$cor' ";

                    if(!empty($genero)) {
                        $sql .= "AND genero= '$genero' ";
                    }
                    
                } else if(!empty($genero)) {
                    $sql .= "AND genero= '$genero' ";
                }

            } else if(!empty($cor)) {
                $sql .= "cor= '$cor' ";

                if(in_array($marca, MARCAS)) {
                    $sql .= "AND marca= '$marca' ";

                } else if(!empty($tamanho)) {
                    $sql .= "AND cor= '$cor' ";

                } else if(!empty($genero)) {
                    $sql .= "AND genero= '$genero' ";
                }
                
            } else if(!empty($genero)) {
                $sql .= "genero= '$genero'";

                if(in_array($marca, MARCAS)) {
                    $sql .= "AND marca= '$marca' ";

                } else if(!empty($tamanho)) {
                    $sql .= "AND tamanho= '$tamanho' ";

                } else if(!empty($cor)) {
                    $sql .= "AND cor= '$cor' ";
                }
            }

            try{
                $numRows = Conexao::prepare($sql);
                $numRows->execute();
                self::calculoPaginacao($numRows->rowCount(), $paginaTemp);
                
                $sql .= "ORDER BY id desc limit ".self::$inicioExibir.", ".self::$produtos_por_pagina." ";
                $stmt = Conexao::prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(\PDO::FETCH_ASSOC);

            } catch (\PDOException $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
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
                    $numRows = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND marca= :marca");
                    $numRows->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $numRows->bindParam(':marca', $subCategory, \PDO::PARAM_STR, 15);
                    $numRows->execute();
                    self::calculoPaginacao($numRows->rowCount(), $paginaTemp);

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND marca= :marca ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':marca', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else if (in_array($subCategory, ROUPAS) || in_array($subCategory, ACESSORIOS)) {
                    $numRows = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND subCategoria= :subCategoria");
                    $numRows->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $numRows->bindParam(':subCategoria', $subCategory, \PDO::PARAM_STR, 15);
                    $numRows->execute();
                    self::calculoPaginacao($numRows->rowCount(), $paginaTemp);

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND subCategoria= :subCategoria ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':subCategoria', $subCategory, \PDO::PARAM_STR, 15);
                    $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else if ($subCategory == "Masculino" || $subCategory == "Feminino" || $subCategory == "Unissex") {
                    $numRows = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND genero= :genero");
                    $numRows->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $numRows->bindParam(':genero', $subCategory, \PDO::PARAM_STR, 10);
                    $numRows->execute();
                    self::calculoPaginacao($numRows->rowCount(), $paginaTemp);

                    $stmt = Conexao::prepare("SELECT * FROM produtos WHERE categoria= :categoria AND genero= :genero ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':genero', $subCategory, \PDO::PARAM_STR, 10);
                    $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();

                } else {
                    $numRows = Conexao::prepare("SELECT * FROM produtos where categoria= :categoria");
                    $numRows->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $numRows->execute();
                    self::calculoPaginacao($numRows->rowCount(), $paginaTemp);

                    $stmt = Conexao::prepare("SELECT * FROM produtos where categoria= :categoria ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                    $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                    $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                    $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                    $stmt->execute();
                }


            } else if (in_array($category, MARCAS)) {
                $numRows = Conexao::prepare("SELECT * FROM produtos where marca= :categoria");
                $numRows->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                $numRows->execute();
                self::calculoPaginacao($numRows->rowCount(), $paginaTemp);

                $stmt = Conexao::prepare("SELECT * FROM produtos where marca= :categoria ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                $stmt->bindParam(':categoria', $category, \PDO::PARAM_STR, 12);
                $stmt->bindParam(':inicioExibir', self::$inicioExibir, \PDO::PARAM_INT);
                $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                $stmt->execute();

            } else if ($category == "Promocao" || $category == "PromocaoHome") {

                $numRows = Conexao::prepare("SELECT * FROM produtos WHERE promocao > 0");
                $numRows->execute();
                self::calculoPaginacao($numRows->rowCount(), $paginaTemp);

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
                $numRows = Conexao::prepare("SELECT * FROM produtos where nomeProduto LIKE :busca");
                $numRows->bindParam(':busca', $busca, \PDO::PARAM_STR);
                $numRows->execute();
                self::calculoPaginacao($numRows->rowCount(), $paginaTemp);

                $stmt = Conexao::prepare("SELECT * FROM produtos where nomeProduto LIKE :busca ORDER BY id desc limit :inicioExibir, :produtos_por_pagina");
                $stmt->bindParam(':busca', $busca, \PDO::PARAM_STR);
                $stmt->bindParam(':inicioExibir',self::$inicioExibir, \PDO::PARAM_INT);
                $stmt->bindParam(':produtos_por_pagina', self::$produtos_por_pagina, \PDO::PARAM_INT);
                $stmt->execute();

            } else {
                $numRows = Conexao::prepare("SELECT * FROM produtos");
                $numRows->execute();
                self::calculoPaginacao($numRows->rowCount(), $paginaTemp);

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