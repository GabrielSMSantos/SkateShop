<?php

namespace Source\Controllers;

use Source\Models\Usuarios;
use Source\Models\SendEmail;

class Usuario
{
    public function __construct()
    {
        session_start();
    }

    public function login(array $data): void
    {

        if($_POST){
            $email = empty($data["email"]) ? "" : filter_var(str_replace("%40", "@", $data["email"]), FILTER_SANITIZE_EMAIL);
            $senha = empty($data["senha"]) ? "" : md5(filter_var($data["senha"], FILTER_SANITIZE_STRING));
            $result = false;

            $user = Usuarios::logar($email, $senha);

            if(Usuarios::$quantLinhas > 0){
                $_SESSION["logado"] = true;

                $_SESSION["idUsuario"] = $user["id"];
                $_SESSION["nomeUsuario"] = $user["nome"];
                $_SESSION["permissao"] = $user["permissao"];

                $result = true;
            }

            echo json_encode($result);
        }
    }

    public function logout(array $data): void
    {
        echo json_encode(session_destroy());
    }

    public function register(array $data): void
    {
        $nome = empty($data["nome"]) ? "" : $data["nome"];
        $cpf = empty($data["cpf"]) ? "" : $data["cpf"];
        $dataNascimento = empty($data["datadenascimento"]) ? "" : $data["datadenascimento"];
        $cep = empty($data["cep"]) ? "" : $data["cep"];
        $endereco = empty($data["endereco"]) ? "" : $data["endereco"];
        $numero = empty($data["numero"]) ? "" : $data["numero"];
        $complemento = empty($data["complemento"]) ? "" : $data["complemento"];
        $bairro = empty($data["bairro"]) ? "" : $data["bairro"];
        $cidade = empty($data["cidade"]) ? "" : $data["cidade"];
        $estado = empty($data["estado"]) ? "" : $data["estado"];
        $telefone = empty($data["telefone"]) ? "" : $data["telefone"];
        $telefoneAlternativo = empty($data["telefonealternativo"]) ? "" : $data["telefonealternativo"];
        $celular = empty($data["celular"]) ? "" : $data["celular"];
        $email = empty($data["email"]) ? "" : str_replace("%40","@", $data["email"]);
        $senha = empty($data["senha"]) ? "" : md5($data["senha"]);


        if (!empty($nome) && !empty($cpf) && !empty($dataNascimento) && !empty($cep) && !empty($endereco) &&
            !empty($numero) && !empty($bairro) && !empty($cidade) && !empty($estado) && !empty($telefone) &&
            !empty($telefoneAlternativo) && !empty($celular) && !empty($email) && !empty($senha)) {

            $availableCpf = Usuarios::availableCpf($cpf);
            $availableEmail = Usuarios::availableEmail($email);

            if ($availableCpf == 0 && $availableEmail == 0) {
                $result = Usuarios::cadastrarUsuario($nome, $cpf, $dataNascimento, $cep, $endereco, $numero, $complemento,
                                                 $bairro, $cidade, $estado, $telefone, $telefoneAlternativo, $celular,
                                                 $email, $senha);
            } else {
                $result = 2;
            }            

        } else {
            $result = 0;
        }


        echo json_encode($result);
    }

    public function updateAccount(array $data): void
    {
        $nome = empty($data["nome"]) ? "" : $data["nome"];
        $cpf = empty($data["cpf"]) ? "" : $data["cpf"];
        $dataNascimento = empty($data["datadenascimento"]) ? "" : $data["datadenascimento"];
        $cep = empty($data["cep"]) ? "" : $data["cep"];
        $endereco = empty($data["endereco"]) ? "" : $data["endereco"];
        $numero = empty($data["numero"]) ? "" : $data["numero"];
        $complemento = empty($data["complemento"]) ? "" : $data["complemento"];
        $bairro = empty($data["bairro"]) ? "" : $data["bairro"];
        $cidade = empty($data["cidade"]) ? "" : $data["cidade"];
        $estado = empty($data["estado"]) ? "" : $data["estado"];
        $telefone = empty($data["telefone"]) ? "" : $data["telefone"];
        $telefoneAlternativo = empty($data["telefonealternativo"]) ? "" : $data["telefonealternativo"];
        $celular = empty($data["celular"]) ? "" : $data["celular"];
        $email = empty($data["email"]) ? "" : str_replace("%40","@", $data["email"]);
        $availableCpf = "";
        $availableEmail = "";

        if (!empty($nome) && !empty($cpf) && !empty($dataNascimento) && !empty($cep) && !empty($endereco) &&
            !empty($numero) && !empty($bairro) && !empty($cidade) && !empty($estado) && !empty($telefone) &&
            !empty($telefoneAlternativo) && !empty($celular) && !empty($email)) {

                $infoConta = Usuarios::infoConta($_SESSION["idUsuario"]);

                if ($infoConta["cpf"] != $cpf) {
                    $availableCpf = Usuarios::availableCpf($cpf);
                }

                if ($infoConta["email"] != $email){
                    $availableEmail = Usuarios::availableEmail($email);
                }

                if ($availableCpf == 0 && $availableEmail == 0) {
                    $result = Usuarios::updateConta($nome, $cpf, $dataNascimento, $cep, $endereco, $numero, 
                                                $complemento, $bairro, $cidade, $estado, $telefone, 
                                                $telefoneAlternativo, $celular, $email, $_SESSION["idUsuario"]);

                } else {
                    $result = 3;
                }

                
        } else {
            $result = 2;
        }


        echo json_encode($result);
    }
    
    public function changePassword(array $data)
    {
        if (isset($_SESSION["confirm"])) {


            if(!isset($_SESSION["senhaAlterada"])) {
                $result = Usuarios::changePassword($_SESSION["confirm"], $data["senha"]);
                $_SESSION["senhaAlterada"] = true;


            }else{
                $result = 0;
            }

        }

        echo json_encode($result);
    }

}