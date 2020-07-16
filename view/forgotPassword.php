<?php 
$v->layout("_theme");

      $v->start("cssThisPage");
?>        <link rel="stylesheet" href="<?= url("view/css/forgotPassword.css"); ?>">
<?php $v->end(); ?>

        <form id="form" data-action="<?= $router->route("usuario.sendemail"); ?>">
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
            console.log("Sucesso!");
            
        }, "json").fail(function(){
            alert("Erro")
        });

    });

</script>
<?php $v->end(); ?>