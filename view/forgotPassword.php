<?php 
$v->layout("_theme");

      $v->start("cssThisPage");
?>        <link rel="stylesheet" href="<?= url("view/css/forgotPassword.css"); ?>">
<?php $v->end(); ?>

        <form id="form" data-action="<?= $router->route("sendemail.send"); ?>">
            <div class="card text-center">
              <div class="card-header">
                <h2>Esqueci a Senha</h2>
              </div>
              <div id="campos" class="card-body">
                      <div id="errorLogin"></div>

                     <div class="col-auto">
                      <label class="sr-only" for="Email">E-mail</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><img src="<?= url("media/images/icons/email.png"); ?>"></div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                      </div>
                      <br>

                  </div>
                  <div id="cardfooter" class="card-footer text-muted">

                    <button type="submit" id="btnLogin" class="btn btn-outline-primary">ENVIAR</button>
                      
                  </div>
                </div>
             </div>
        </form>

<?php $v->start("scripts"); ?>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
<script type="text/javascript">
    var alerta = document.querySelector("#errorLogin");
    
    $("#form").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            required: "Campo Obrigatório.",
            email: "Informe um E-mail válido."
        }
    });


    $("#form").on("submit", function(e){
        e.preventDefault();

        var data = $(this).data();
        var form = $(this).serialize();

        $.post(data.action, form, function(callback){
            if (callback == 0) {

                if(alerta.hasChildNodes()){
                    alerta.removeChild(alerta.childNodes[0]);
                }

                alerta.setAttribute("class", "alert alert-success");
                alerta.setAttribute("role", "alert");

                var p = document.createElement("b");
                var message = document.createTextNode("Um E-mail foi enviado para o E-mail informado, será fornecido um link para redefinição de senha.");
                p.appendChild(message);

                alerta.appendChild(p);

            } else if (callback == 1) {

                if(alerta.hasChildNodes()){
                    alerta.removeChild(alerta.childNodes[0]);
                }

                alerta.setAttribute("class", "alert alert-danger");
                alerta.setAttribute("role", "alert");

                var p = document.createElement("b");
                var message = document.createTextNode("E-mail informado não existe!");
                p.appendChild(message);

                alerta.appendChild(p);

            } else if (callback == 2) {

                if(alerta.hasChildNodes()){
                    alerta.removeChild(alerta.childNodes[0]);
                }

                alerta.setAttribute("class", "alert alert-danger");
                alerta.setAttribute("role", "alert");

                var p = document.createElement("b");
                var message = document.createTextNode("Erro ao enviar E-mail.");
                p.appendChild(message);

                alerta.appendChild(p);

            }
            
        }, "json").fail(function(){

                if(alerta.hasChildNodes()){
                    alerta.removeChild(alerta.childNodes[0]);
                }

                alerta.setAttribute("class", "alert alert-danger");
                alerta.setAttribute("role", "alert");

                var p = document.createElement("b");
                var message = document.createTextNode("Erro ao enviar E-mail.");
                p.appendChild(message);

                alerta.appendChild(p);
        });

    });

</script>
<?php $v->end(); ?>