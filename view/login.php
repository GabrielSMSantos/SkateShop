<?php
$v->layout("_theme");

      $v->start("cssThisPage");
?>      <link rel="stylesheet" href="<?= url("view/css/login.css"); ?>">
<?php $v->end(); ?>

        <form id="formLogin" data-action="<?= $router->route("usuario.login"); ?>">
           
            <div class="card text-center">
              <div class="card-header">
                <h2>LOGIN</h2>
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
                       
                      <label class="sr-only" for="Senha">Senha</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><img src="<?= url("media/images/icons/key.png"); ?>"></div>
                        </div>
                        <input type="password" class="form-control" id="Senha" name="senha" placeholder="Senha" required>
                      </div>
                  
                  
                  <br>

                  </div>
                  <div id="cardfooter" class="card-footer text-muted">
                      <a href="<?= $router->route("web.register"); ?>">Não tenho conta.</a>
                    <button type="submit" id="btnLogin" class="btn btn-outline-primary">ENTRAR</button>
                      
                       <a href="<?= $router->route("web.forgotpassword"); ?>">Esqueci minha senha!</a>
                  </div>
                </div>
             </div>

            
        </form>
    </body>

<?php $v->start("scripts"); ?>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
<script src="<?= url("source/Scripts/validacaoLogin.js"); ?>"></script>
<script type="text/javascript">
    var btnLogin = document.querySelector("#btnLogin");
    var alerta = document.querySelector("#errorLogin");

    $("#formLogin").on("submit", function (e) {
        e.preventDefault();

        var data = $(this).data();
        var form = $(this).serialize();

        console.log(form);

        $.post(data.action, form, function (callback) {
            if(callback == true){
                window.location.href = "<?= $router->route("web.home"); ?>";

            } else {
                if(alerta.hasChildNodes()){
                    alerta.removeChild(alerta.childNodes[0]);
                }

                alerta.setAttribute("class", "alert alert-danger");
                alerta.setAttribute("role", "alert");

                var p = document.createElement("b");
                var message = document.createTextNode("E-mail ou senha incorretos!");
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
            var message = document.createTextNode("Erro ao logar!");
            p.appendChild(message);

            alerta.appendChild(p);
        });
    });

</script>
<?php $v->end(); ?>

</html>
