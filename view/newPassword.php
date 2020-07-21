<?php
$v->layout("_theme"); 

      $v->start("cssThisPage");
?>        <link rel="stylesheet" href="<?= url("view/css/newPassword.css"); ?>">
<?php $v->end(); ?>

        <form id="form" data-action="<?= $router->route("usuario.changepassword"); ?>">

            <div class="card text-center">
              <div class="card-header">
                <h2>Esqueci a Senha</h2>
              </div>

              <div id="campos" class="card-body">
                      <div id="errorLogin"></div>

                     <div class="col-auto">
                      <label class="sr-only" for="senha">Senha</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><img src="<?= url("media/images/icons/key.png"); ?>"></div>
                        </div>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe nova senha" required>
                      </div>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><img src="<?= url("media/images/icons/key.png"); ?>"></div>
                        </div>
                        <input type="password" class="form-control" id="confSenha" name="confSenha" placeholder="Repita sua nova senha" required>
                      </div>
                      <br>

                  </div>
                  <div id="cardfooter" class="card-footer text-muted">

                    <button type="submit" id="btnLogin" class="btn btn-outline-primary">ATUALIZAR</button>
                      
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
            senha: {
                required: true
            },
            confSenha:{
                required: true,
                equalTo: "#senha"
            }
        },
        messages: {
            senha:{
                required: "Campo Obrigatório."
            },
            confSenha:{
                required: "Campo Obrigatório.", 
                equalTo: "Por favor repita a senha para a confirmação!"
            }
        }
    });


    $("#form").on("submit", function(e){
        e.preventDefault();

        var data = $(this).data();
        var senha = document.querySelector("#senha");

        $.post(data.action, {
          "senha": senha
        }, function(callback){

          console.log("SUCESSO!");

        }, "json").fail(function(){
          alert("ERROR");
          
        });

    });


</script>
<?php $v->end(); ?>