<?php 

namespace Source\Controllers;

use Source\Models\Email;
use Source\Models\Usuarios;

class SendEmail
{

    public function send(array $data)
    {
        $email = new Email();

        if(Usuarios::availableEmail($data["email"])){
            $recipient = Usuarios::recipientName($data["email"]);

            $email->add(
                "Este é um Email de teste",
                "<h1>Olá Mundo!</h1>",
                $recipient["nome"],
                $data["email"]
            )->send();
    
            if(!$email->error()){
                $result = 0;
    
            } else {
                $result = 2;
            }

        } else {
            $result = 1;
        }
        
        
        echo json_encode($result);
    }
}