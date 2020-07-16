<?php 

namespace Source\Controllers;

use Source\Models\Email;

class SendEmail
{

    public function send(array $data)
    {
        $email = new Email();

        $email->add(
            "Este é um Email de teste",
            "<h1>Olá Mundo!</h1>",
            $data["recipient_name"],
            $data["email"]
        );
        
        echo json_encode($email);
    }
}