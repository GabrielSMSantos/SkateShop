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
                "Refinição de Senha",
                '
                <div id="topo">
                    <img src="cid:banner_png" style="height: 10px; margin: 50px;">
                    <br/>
                    <h3>Segue o link para a redefinição da senha</h3>
                    <a href="http://localhost/SkateShop/">REDEFINIR SENHA</a>
                </div>
                ',
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