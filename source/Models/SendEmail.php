<?php

namespace Source\Models;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use stdClass;

class SendEmail
{

    private $mail;

    private $data;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->data = new stdClass(); 

        $this->mail->isSMTP();
        $this->mail->isHTML();
        $this->mail->setLanguage("br");

        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = "tls";
        $this->mail->CharSet = "utf-8";

        $this->mail->Host = MAIL["host"];
        $this->mail->Port = MAIL["port"];
        $this->mail->Username = MAIL["user"];
        $this->mail->Password = MAIL["passwd"];
    }


    public function add(string $subject, string $body, string $recipient_name, string $recipien_email): SendEmail
    {
        
    }


    public function send(string $data)
    {
        $emailDestino = $data;
        $message = self::emailMessage();

        return mail($emailDestino, "Criar nova Senha" ,$message, "Content-Type: text/html");
    }
    
    private static function emailMessage(): string
    {
        $message = "<h1>Recuperação de Senha</h1>";
        $message .= "<a href='http://localhost/site-christ/Enviar-Email'>Recuperar Senha</a>";

        return $message;
    }
}