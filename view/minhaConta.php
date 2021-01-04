<?php
$v->layout("_theme2");

      $v->start("cssThisPage"); ?>
          <link rel="stylesheet" href="<?= url("view/css/minhaConta.css"); ?>">
<?php $v->end(); ?>

                    <div class="card">

                            <div class="card-header text-center">
                              <h2>MINHA CONTA</h2>
                            </div>

                            <form id="formUser" class="card-body" data-action="<?= $router->route("usuario.updateAccount"); ?>">
                                <div id="errorLogin"></div>

                                <div class="col-auto">
                                    
                                    <table class="table table-borderless">
                                        
                                        <thead>
                                          <tr>
                                              
                                            <th scope="col"><h5><b>Dados de Cadastro</b></h5></th>
                                              
                                            <th scope="col"><h5><b>Endereço de Cadastro</b></h5></th>
                                              
                                            <th scope="col"><h5><b>Dados de Contato</b></h5></th>
                                              
                                            <th scope="col"><h5><b>Dados de Acesso</b></h5></th>
                                              
                                          </tr>
                                        </thead>
                                        
                                        <tbody>
                                            
                                           <tr><!--PRIMEIRA LINHA-->
                                                <td>
                                                <!--DADOS DE CADASTRO-->
                                                  <label for="validationnome"><b class="text-danger">*</b> Nome</label>
                                                    <input type="text" class="form-control" id="validationnome" placeholder="Digite seu nome" name="nome" value="<?= $user["nome"]; ?>" required>
                                                    
                                                </td>
                                               
                                                <td><!--ENDEREÇO DE CADASTRO-->
                                                    
                                                    <label for="validationcep"><b class="text-danger">*</b> CEP</label>
                                                    <input type="text" class="form-control " id="validationcep" placeholder="Informe seu CEP" name="cep" value="<?= $user["cep"]; ?>" required>
                                                   
                                                </td>
                                               
                                                <td><!--DADOS DE CONTATO-->
                                                    
                                                      <label for="validationtelefone"><b class="text-danger">*</b> Telefone</label>
                                                    <input type="text" class="form-control" id="validationtelefone" placeholder="(00) 00000-000" name="telefone" value="<?= $user["telefone"]; ?>" required>
                                                   
                                                    
                                                </td>
                                               
                                                <td><!--DADOS DE ACESSO-->
                                                    
                                                 <label for="validationemail"><b class="text-danger">*</b> E-mail</label>
                                                    <input type="email" class="form-control" id="validationemail" placeholder="Digite seu E-mail" name="email" value="<?= $user["email"]; ?>" required>
                                                  
                                                </td>
                                               
                                           </tr>
                                            
                                            
                                           <tr><!--SEGUNDA LINHA-->
                                               
                                                <td>
                                                <!--DADOS DE CADASTRO-->
                                                    
                                                   <label for="validationcpf"><b class="text-danger">*</b> CPF</label>
                                                    <input type="text" class="form-control" id="validationcpf" placeholder="Digite seu CPF" name="cpf" value="<?= $user["cpf"]; ?>" required>
                                                   
                                                </td>
                                               
                                                <td><!--ENDEREÇO DE CADASTRO-->
                                                    
                                                    <label for="validationendereco"><b class="text-danger">*</b> Endereço</label>
                                                    <input type="text" class="form-control" id="validationendereco" placeholder="Digite seu endereço" name="endereco" value="<?= $user["endereco"]; ?>" required>
                                                    
                                                    
                                                </td>
                                               
                                                <td><!--DADOS DE CONTATO-->
                                                    
                                                      <label for="validationtelefonealternativo"><b class="text-danger">*</b> Telefone Alternativo</label>
                                                    <input type="text" class="form-control" id="validationtelefonealternativo" placeholder="(00) 00000-000" name="telefonealternativo" value="<?= $user["telefoneAlternativo"]; ?>" required>
                                                   
                                                </td>

                                               
                                               
                                           </tr>
                                            
                                            
                                           <tr><!--TERCEIRA LINHA-->
                                                
                                                <!--DADOS DE CADASTRO-->
                                               <td scope="row">
                                                   <label for="validationdatadenascimento"><b class="text-danger">*</b> Data de Nascimento</label>
                                                   <input type="date" min="1900-01-01" max="<?= date("Y") ?>-12-31" class="form-control" id="validationdatadenascimento" name="datadenascimento" value="<?= $user["dataNascimento"]; ?>" required>
                                               </td>
                                               
                                                <td><!--ENDEREÇO DE CADASTRO-->
                                                    
                                                    <label for="validationnumero"><b class="text-danger">*</b> Número</label>
                                                    <input type="number" min="1" class="form-control" id="validationnumero" placeholder="Digite número da casa" name="numero" value="<?= $user["numero"]; ?>" required>
                                                   
                                                </td>

                                               <td><!--DADOS DE CONTATO-->
                                                   <label for="validationcelular"><b class="text-danger">*</b> Celular</label>
                                                   <input type="text" class="form-control" id="validationcelular" placeholder="(00) 000000-000" name="celular" value="<?= $user["celular"]; ?>" required>

                                               </td>
                                               
                                               
                                           </tr>
                                            
                                           <tr><!--QUARTA LINHA-->
                                               
                                                <td>
                                                </td>
                                               
                                                <td>
                                                <!--ENDEREÇO DE CADASTRO -->
                                                     <label for="validationcomplemento"><b class="text-danger">*</b> Complemento</label>
                                                    <input type="text" class="form-control " id="validationcomplemento" placeholder="Informe o complemento" name="complemento" value="<?= $user["complemento"]; ?>">
                                                      
                                                </td>
                                               
                                                <td>
                                                <!--ESPAÇO VAZIO-->
                                                </td>
                                               
                                               
                                               
                                            </tr>
                                            
                                            
                                            <tr><!--QUINTA LINHA-->
                                                
                                                <th scope="row">
                                                <!-- ESPAÇO VAZIO -->
                                                </th>
                                                
                                                <td><!--ENDEREÇO DE CADASTRO -->
                                                     <label for="validationbairro"><b class="text-danger">*</b> Bairro</label>
                                                    <input type="text" class="form-control" id="validationbairro" placeholder="Informe seu bairro" name="bairro" value="<?= $user["bairro"]; ?>" required>
                                                      
                                                </td>
                                                
                                                <td>
                                                <!-- ESPAÇO VAZIO -->
                                                </td>

                                                <td>
                                                <!-- ESPAÇO VAZIO -->
                                                </td>
                                                
                                            </tr>
                                            
                                            
                                            <tr><!--PENULTIMA LINHA -->
                                                <th scope="row">
                                                <!-- ESPAÇO VAZIO -->
                                                </th>
                                                <td><!-- ENDEREÇO DE CADASTRO -->
                                                     <label for="validationcidade"><b class="text-danger">*</b> Cidade</label>
                                                    <input type="text" class="form-control" id="validationcidade" placeholder="Informe sua cidade" name="cidade" value="<?= $user["cidade"]; ?>" required>
                                                     
                                                </td>
                                                <td>
                                                 <!-- ESPAÇO VAZIO -->
                                                </td>

                                                <td>
                                                 <!-- ESPAÇO VAZIO -->
                                                </td>
                                          </tr>
                                            
                                            
                                            
                                            
                                          <tr><!--ULTIMA LINHA -->
                                              
                                                <th scope="row">
                                                    <!-- ESPAÇO VAZIO -->
                                                </th>

                                                <td><!-- ENDEREÇO DE CADASTRO -->
                                                    <label for="validationestado"><b class="text-danger">*</b> Estado</label>
                                                    <input type="text" class="form-control " id="validationestado" placeholder="Informe seu estado" name="estado" value="<?= $user["estado"]; ?>" required>
                                                   
                                                </td>

                                                <td><!--ESPAÇO VAZIO--></td>
                                            
                                          </tr>
                                            
                                        </tbody>
                                      </table>
                                    
                                </div>
                                <div id="cardfooter" class="card-footer text-muted text-center">
                                    
                                  <input type="submit" class="btn btn-outline-success" value="EDITAR">
                                    

                                </div>
                              </form>
             </div>

    </body>

<?php $v->start("scripts"); ?>
<script src="<?= url("jq/jquery.mask.js"); ?>"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
<script src="<?= url("source/Scripts/customValidate.js"); ?>"></script>
<script src="<?= url("source/Scripts/validacaoRegister.js"); ?>"></script>
<script type="text/javascript">
    var alerta = document.querySelector("#errorLogin");

    $(document).ready(function(){
        $("#validationcpf").mask("000.000.000-00");
        $("#validationcep").mask("00000-000");
        $("#validationtelefone").mask("(00) 00000-000");
        $("#validationtelefonealternativo").mask("(00) 00000-000");
        $("#validationcelular").mask("(00) 000000-000");
    });


    $("#formUser").on("submit", function(e){
        e.preventDefault();

        var data = $(this).data();
        var form = $(this).serialize();

        $.post(data.action, form, function(callback){
            
            if (callback == 1) {

                if(alerta.hasChildNodes()){
                    alerta.removeChild(alerta.childNodes[0]);
                }

                alerta.setAttribute("class", "alert alert-success");
                alerta.setAttribute("role", "alert");

                var p = document.createElement("b");
                var message = document.createTextNode("Dados Editados com Sucesso!");
                p.appendChild(message);

                alerta.appendChild(p);

            } else if (callback == 2) {

                if(alerta.hasChildNodes()){
                    alerta.removeChild(alerta.childNodes[0]);
                }

                alerta.setAttribute("class", "alert alert-danger");
                alerta.setAttribute("role", "alert");

                var p = document.createElement("b");
                var message = document.createTextNode("Dados Inválidos.");
                p.appendChild(message);

                alerta.appendChild(p);

            } else if (callback == 3) {

                if(alerta.hasChildNodes()){
                    alerta.removeChild(alerta.childNodes[0]);
                }

                alerta.setAttribute("class", "alert alert-danger");
                alerta.setAttribute("role", "alert");

                var p = document.createElement("b");
                var message = document.createTextNode("CPF ou E-mail já estão cadastrados.");
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
                var message = document.createTextNode("Erro ao Editar dados da conta.");
                p.appendChild(message);

                alerta.appendChild(p);
        });
    })

</script>
<?php $v->end(); ?>
</html>

