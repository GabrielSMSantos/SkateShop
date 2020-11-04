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

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function detalhesProdutoCart(int $id): array
    {
        $stmt = Conexao::prepare("SELECT * FROM produtos WHERE id= :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        Produtos::$quantLinhas = $stmt->rowCount();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function calculoPaginacao(int $statement, int $paginaAtual): void
    {
        self::$inicioExibir = (self::$produtos_por_pagina * $paginaAtual) - self::$produtos_por_pagina;
        self::$totalPaginas = ceil($statement / self::$produtos_por_pagina);
    }

    public static function FiltroProducts(string $category, string $marca, string $tamanho, string $cor, string $genero, string $busca,int $paginaTemp, string $ordem): array
    {
        $sql = "SELECT * FROM produtos WHERE ";

        if($category == "Roupas" || $category == "Calcados" || $category == "Acessorios" || $category == "Busca"){

            if ($category == "Busca") {
                $sql .= "nomeProduto LIKE '%$busca%' ";

            } else {
                $sql .= "categoria= '$category' ";
            }

            if(in_array($marca, MARCAS)) {
                $sql .= "AND marca= '$marca' ";

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
                $sql .= "AND tamanho= '$tamanho' ";

                if(!empty($cor)) {
                    $sql .= "AND cor= '$cor' ";

                    if(!empty($genero)) {
                        $sql .= "AND genero= '$genero' ";
                    }
                    
                } else if(!empty($genero)) {
                    $sql .= "AND genero= '$genero' ";
                }

            } else if (!empty($cor)) {
                $sql .= "AND cor= '$cor' ";

                if (!empty($genero)) {
                    $sql .= "AND genero= '$genero' ";
                }

            }

            try{
                $numRows = Conexao::prepare($sql);
                $numRows->execute();
                self::calculoPaginacao($numRows->rowCount(), $paginaTemp);

                switch ($ordem) {
                    case "Lancamentos":
                        $sql .= "ORDER BY id desc ";
                    break;
    
                    case "menorPreco":
                        $sql .= "ORDER BY preco asc ";
                    break;
    
                    case "maiorPreco":
                        $sql .= "ORDER BY preco desc ";
                    break;
    
                    case "alfabetica":
                        $sql .= "ORDER BY nomeProduto asc ";
                    break;
    
                    case "relevancia":
                        $sql .= "ORDER BY id desc ";
                    break;
                }
                
                $sql .= "limit ".self::$inicioExibir.", ".self::$produtos_por_pagina;
                
                $stmt = Conexao::prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(\PDO::FETCH_ASSOC);

            } catch (\PDOException $e) {
                echo "ERROR: ".$e->getMessage();
            }
            
        }

    }  


    public static function searchProducts(string $category, string $subCategory, int $paginaTemp, string $ordem): array
    {

        $sql = "SELECT * FROM produtos ";


        if ($category == "Roupas" || $category == "Calcados" || $category == "Acessorios") {

            if (in_array($subCategory, MARCAS)) {
                $sql .= "WHERE categoria= '$category' AND marca= '$subCategory' ";

            } else if (in_array($subCategory, ROUPAS) || in_array($subCategory, ACESSORIOS)) {
                $sql .= "WHERE categoria= '$category' AND subCategoria= '$subCategory' ";

            } else if ($subCategory == "Masculino" || $subCategory == "Feminino" || $subCategory == "Unissex") {
                $sql .= "WHERE categoria= '$category' AND genero= '$subCategory' ";                

            } else {
                $sql .= "WHERE categoria= '$category' ";

            }

        } else if (in_array($category, MARCAS)) {
            $sql .= "WHERE marca= '$category' ";

        } else if ($category == "Promocao" || $category == "PromocaoHome") {
            $sql .= "WHERE promocao > 0 ";

        } else if ($category == "Busca") {
            $sql .= "WHERE nomeProduto LIKE '%$subCategory%' ";
        }

        try {
            $numRows = Conexao::prepare($sql);
            $numRows->execute();
            self::calculoPaginacao($numRows->rowCount(), $paginaTemp);

            switch ($ordem) {
                case "Lancamentos":
                    $sql .= "ORDER BY id desc ";
                break;

                case "menorPreco":
                    $sql .= "ORDER BY preco asc ";
                break;

                case "maiorPreco":
                    $sql .= "ORDER BY preco desc ";
                break;

                case "alfabetica":
                    $sql .= "ORDER BY nomeProduto asc ";
                break;

                case "relevancia":
                    $sql .= "ORDER BY id desc ";
                break;
            }
    
            if ($category == "PromocaoHome") {
                $sql .= "limit ".self::$inicioExibir.", 4";
    
            } else {
                $sql .= "limit ".self::$inicioExibir.", ".self::$produtos_por_pagina;
            }

            $stmt = Conexao::prepare($sql);
            $stmt->execute();
    
            Produtos::$quantLinhas = $stmt->rowCount();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);   

        } catch (\PDOExecption $e) {
            echo "ERROR: ".$e->getMessage();
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