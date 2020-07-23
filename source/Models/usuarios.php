<?php

namespace Source\Models;

class Usuarios extends Conexao{
    public static $quantLinhas;

    public static function cadastrarUsuario($nome, $cpf, $dataNascimento, $cep, $endereco, $numero, $complemento,
                                            $bairro, $cidade, $estado, $telefone, $telefoneAlternativo, $celular,
                                            $email, $senha): int
    {

        $stmt = Conexao::prepare("INSERT INTO usuarios (id, 
                                                            nome, 
                                                            cpf, 
                                                            dataNascimento, 
                                                            cep, 
                                                            endereco, 
                                                            numero, 
                                                            complemento, 
                                                            bairro, 
                                                            cidade, 
                                                            estado, 
                                                            telefone, 
                                                            telefoneAlternativo, 
                                                            celular, 
                                                            email, 
                                                            senha, 
                                                            permissao) 
                                                            VALUES(:id, 
                                                                   :nome, 
                                                                   :cpf, 
                                                                   :dataNascimento, 
                                                                   :cep, 
                                                                   :endereco, 
                                                                   :numero, 
                                                                   :complemento, 
                                                                   :bairro, 
                                                                   :cidade, 
                                                                   :estado, 
                                                                   :telefone, 
                                                                   :telefoneAlternativo, 
                                                                   :celular, 
                                                                   :email, 
                                                                   :senha, 
                                                                   :premicao)");
        $stmt->execute(array(
            ':id' => '',
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':dataNascimento' => $dataNascimento,
            ':cep' => $cep,
            ':endereco' => $endereco,
            ':numero' => $numero,
            ':complemento' => $complemento,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':estado' => $estado,
            ':telefone' => $telefone,
            ':telefoneAlternativo' => $telefoneAlternativo,
            ':celular' => $celular,
            ':email' => $email,
            ':senha' => $senha,
            ':premicao' => "FALSE"
        ));


        return $stmt->rowCount();
    }

    public static function logar($email, $senha)
    {
        $stmt = Conexao::prepare("SELECT id,nome,permissao FROM usuarios WHERE email=:email AND senha=:senha");
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, \PDO::PARAM_STR);
        $stmt->execute();

        self::$quantLinhas = $stmt->rowCount();
        return $stmt->fetch();
    }
    
    public static function infoConta(int $id)
    {
        $stmt = Conexao::prepare("SELECT * FROM usuarios WHERE id= :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        self::$quantLinhas = $stmt->rowCount();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    } 

    public static function recipientName(string $email)
    {
        $stmt = Conexao::prepare("SELECT nome FROM usuarios WHERE email= :email");
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();

        self::$quantLinhas = $stmt->rowCount();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    public static function updateConta($nome, $cpf, $dataNascimento, $cep, $endereco, $numero, $complemento,
                                       $bairro, $cidade, $estado, $telefone, $telefoneAlternativo, $celular,
                                       $email, $id)
                                       {

        $stmt = Conexao::prepare("UPDATE usuarios SET nome= :nome, 
                                                          cpf= :cpf, 
                                                          dataNascimento= :dataNascimento, 
                                                           cep= :cep, 
                                                          endereco= :endereco, 
                                                          numero= :numero, 
                                                          complemento= :complemento, 
                                                          bairro= :bairro, 
                                                          cidade= :cidade, 
                                                          estado= :estado, 
                                                          telefone= :telefone, 
                                                          telefoneAlternativo= :telefoneAlternativo, 
                                                          celular= :celular, 
                                                          email= :email WHERE id= :id");
        $stmt->execute(array(
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':dataNascimento' => $dataNascimento,
            ':cep' => $cep,
            ':endereco' => $endereco,
            ':numero' => $numero,
            ':complemento' => $complemento,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':estado' => $estado,
            ':telefone' => $telefone,
            ':telefoneAlternativo' => $telefoneAlternativo,
            ':celular' => $celular,
            ':email' => $email,
            ':id' => $id
        ));


        return $stmt->rowCount();
    }

    public static function changePassword(string $email, string $password)
    {
        $stmt = Conexao::prepare("UPDATE usuarios SET senha= :senha WHERE email= :email");

        $stmt->execute(array(
            ':senha' => md5($password),
            ':email' => $email
        ));

        return $stmt->rowCount();
    }


    public static function availableCpf(string $cpf)
    {
        $stmt = Conexao::prepare("SELECT cpf from usuarios WHERE cpf = :cpf");
        $stmt->bindParam(":cpf", $cpf, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public static function availableEmail(string $email)
    {
        $stmt = Conexao::prepare("SELECT email from usuarios WHERE email = :email");
        $stmt->bindParam(":email", $email, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

}
