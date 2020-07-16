<?php 
      
      if(substr($_SESSION["URL"], 13, 21) == "index.php"){
          $voltarPasta = "";
      }else{
          $voltarPasta = "../";
      }

?>
<header id="topo" style="background: #<?php echo $estilo[0]; ?>;">

    <div class="divCima">
        <div id="logo"><a href="<?php echo $voltarPasta; ?>index.php"><img src="<?php echo $voltarPasta.$estilo[6]; ?>"></a></div>
    
        <div id="procurar" >
           <img id="icon-search" src="<?php echo $voltarPasta; ?>media/images/icons/icon-buscar.png">
            
            <input name="busca" type="text" placeholder="O que está procurando?" onkeyup="submit()">
            <button type="submit" id="btn-buscar" style="background: #<?php echo $estilo[2]; ?>" onclick="buscarProduto()">Buscar</button>
        </div>

        
      <div id="dvCarrinhoUser">
        <div id="carrinho">
            <a href="<?php echo $voltarPasta; ?>view/carrinho.php">
               <img id="iconCarrinho" src="<?php echo $voltarPasta; ?>media/images/icons/carrinho.png" align="left">
              <p>Meus Produtos <br>
                <?php
                if(isset($_SESSION["produtoCarrinhos"])){
                   echo count($_SESSION["produtoCarrinhos"]);
                }else{
                  echo "0";
                } 

                ?> itens</p>
            </a>
        </div>
    

        <div id="User">
            <img class="icon" src="<?php echo $voltarPasta; ?>media/images/icons/usuario.png" align="left">

            

            <div id="dropdown">
                <img id="arrow" src="<?php echo $voltarPasta; ?>media/images/icons/setaDropdown.png">
                <?php 

                    if (isset($_GET["sair"])) { 
                        session_destroy();
                        header("Location: ".$voltarPasta."index.php");
                    }

                    if(!isset($_SESSION["Logado"])){ ?>

                          <p id ="makeLogin">Entrar/Cadastrar-se</p>
                          <p></p>
                          <img class="iconDrop" src="<?php echo $voltarPasta; ?>media/images/icons/entrar.png" align="left">
                          <a href="<?php echo $voltarPasta; ?>view/login.php">Logar</a>
                          <p></p>
                          <img class="iconDrop" src="<?php echo $voltarPasta; ?>media/images/icons/addUser.png" align="left">
                          <a href="<?php echo $voltarPasta; ?>view/cadastro.php">Cadastrar</a>
                          <p></p>

                <?php } ?>

                <?php 

                    if(isset($_SESSION["Logado"])){ ?>
                          <p id="hiUser">Olá, <?php echo $_SESSION["NomeUsuario"]; ?></p>

                          <img class="iconDrop" src="<?php echo $voltarPasta; ?>media/images/icons/minhaConta.png">
                          <a href="<?php echo $voltarPasta; ?>view/minhaConta.php" class="subItem">Minha Conta</a>
                          <p></p>


                          <?php if($_SESSION["Permicao"] == "TRUE"){ ?>
                                  <img class="iconDrop" src="<?php echo $voltarPasta; ?>media/images/icons/painelAdm.png">
                                  <a href="<?php echo $voltarPasta; ?>view/dashboard.php">Painel Adiministrativo</a>
                                  <p></p>
                          <?php } ?>

                          <img class="iconDrop" class="icon" src="<?php echo $voltarPasta; ?>media/images/icons/sair.png">
                          <a href="<?php echo $voltarPasta; ?>index.php?sair" class="subItem">Sair</a> 

                <?php } ?>
                     
              </div>
        </div>

      </div>                      
  </div>
        
<a href="<?php echo $voltarPasta; ?>view/carrinho.php"><img class="carrinhoMobile" src="https://img.icons8.com/ios/30/ffffff/shopping-bag-filled.png"></a>

<input type="checkbox" id="menuHamburger" name="menuHamburger" onchange="FecharDropUsuario()">
<label for="menuHamburger"><img class="imgMenu" src="https://img.icons8.com/ios/30/ffffff/menu-filled.png"></label>

<nav id="menuMobile">
  <label for="menuHamburger"><img id="close" src="https://img.icons8.com/metro/30/ffffff/multiply.png"></label>

  <?php if(isset($_SESSION["Logado"])){ ?>
      <input type="checkbox" id="dropUsuario" name="dropUsuario" onchange="pegarValorCheck(this.checked)">
      <label for="dropUsuario"><p id="logarMobile"><img id="iconUsuarioMobile" src="<?php echo $voltarPasta; ?>media/images/icons/usuario.png"> Olá, <?php echo $_SESSION["NomeUsuario"]; ?><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABmJLR0QA/wD/AP+gvaeTAAAAeklEQVQ4je3RQQrCMBBA0VaoxPsLLjyFuLCe7nXTQipjk9iNi37IbvIYkq47+v8woK+Y6zGUhs544I5TAbvihVTClkI0w5ZidAaf1q3QAIM3LltbhmgzlqEJ48fF23zyxq/vV7lp22YNaDu2gf6OBeh+LENT9Qcc7W4CeCtONCyKZ+wAAAAASUVORK5CYII="></p></label>

      <ul id="subItemUsuario">
        <li><a href="<?php echo $voltarPasta; ?>view/minhaConta.php">Minha Conta</a></li>
        <li><a href="<?php echo $voltarPasta; ?>index.php?sair">Sair</a></li>
      </ul>


  <?php }else{ ?>
    <a id="logarMobile" href="<?php echo $voltarPasta; ?>view/login.php"><img id="iconUsuarioMobile" src="<?php echo $voltarPasta; ?>media/images/icons/usuario.png"> Entrar/Cadastrar-se</a>
  <?php } ?>

  <ul>
    <li><a href="<?php echo $voltarPasta; ?>index.php">Home</a></li>
    <li><a href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas">Roupas</a></li>
    <li><a href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados">Calçados</a></li>
    <li><a href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios">Acessórios</a></li>
    <li><a href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Promocao" style="color: #<?php echo $estilo[2]; ?>;">Promoções</a></li>
    <li><a href="#">Atletas</a></li>
    

  </ul>

  
</nav>


<nav id="menu" style="background: #<?php echo $estilo[1]; ?>">                
    <ul id="menu-web" class="nav justify-content-center">
      <li class="nav-item ">
        <a class="nav-link pagMenu" href="<?php echo $voltarPasta; ?>index.php">Home</a>
      </li>
       <li class="nav-item ">
        <a class="nav-link pagMenu" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas">Roupas</a>

            <ul class="subCategorias">
              <li class="categ">
                <b>Marcas</b>
                <ul class="opcoes">
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&marca=Grizzly">Grizzly</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&marca=Diamond">Diamond</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&marca=DGK">DGK</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&marca=Supra">Supra</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&marca=Stussy">Stussy</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&marca=Primitive">Primitive</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&marca=Huf">Huf</a></li>
                </ul>
              </li>
              <li class="categ">
                <b>Categorias</b>
                <ul class="opcoes">
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&subCategoria=Camiseta">Camiseta</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&subCategoria=Camisa">Camisa</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&subCategoria=Moletom">Moletom</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&subCategoria=Jaqueta">Jaqueta</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&subCategoria=Calca">Calça</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&subCategoria=Bermuda">Bermuda</a></li>
                </ul>
              </li>
              <li class="categ">
                <b>Gênero</b>
                <ul class="opcoes">
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&genero=Masculino">Masculino</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Roupas&genero=Feminino">Feminino</a></li>
                </ul>
              </li>
              
            </ul>
    
      </li>
      <li class="nav-item ">
        <a class="nav-link pagMenu" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados">Calçados</a>

           <ul class="subCategorias">
              <li class="categ">
                <b>Marcas</b>
                <ul class="opcoes">
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&marca=Nike">Nike</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&marca=Adidas">Adidas</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&marca=Puma">Puma</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&marca=Supra">Supra</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&marca=Vans">Vans</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&marca=NewBalance">New Balance</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&marca=Asics">Asics</a></li>
                </ul>
              </li>

              <li class="categ">
                <b>Gênero</b>
                <ul class="opcoes">
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&genero=Masculino">Masculino</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&marca=Feminino">Feminino</a></li>
                </ul>
              </li>
              
            </ul>
      </li>
      <li class="nav-item ">
        <a class="nav-link pagMenu" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios">Acessórios</a>

           <ul class="subCategorias">
              <li class="categ">
                <b>Marcas</b>
                <ul class="opcoes">
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&marca=Grizzly">Grizzly</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&marca=Diamond">Diamond</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&marca=DGK">DGK</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&marca=Supra">Supra</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&marca=Stussy">Stussy</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&marca=Primitive">Primitive</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&marca=Huf">Huf</a></li>
                </ul>
              </li>
              <li class="categ">
                <b>Categorias</b>
                <ul class="opcoes">
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&subCategoria=Bone">Boné</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&subCategoria=Meia">Meia</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&subCategoria=Gorro">Gorro</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&subCategoria=Mochila">Mochila</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&subCategoria=Carteira">Carteira</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Acessorios&subCategoria=Chaveiro">Chaveiro</a></li>
                </ul>
              </li>
              <li class="categ">
                <b>Gênero</b>
                <ul class="opcoes">
                    <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&genero=Masculino">Masculino</a></li>
                  <li><a class="subOpcoes" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Calcados&marca=Feminino">Feminino</a></li>
                </ul>
              </li>
              
            </ul>
      </li>
      <li id="lipromocao" class="nav-item" style="background: #<?php echo $estilo[2]; ?>">
        <a id="promocao" class="nav-link pagMenu" href="<?php echo $voltarPasta; ?>view/produtos.php?categoria=Promocao">Promoções</a>
      </li>
      <li class="nav-item">
        <a class="nav-link pagMenu" href="#">Atletas</a>
      </li>
    </ul>
</nav>
</header>
<script type="text/javascript">
      var pagina = window.location.href;
      pagina = pagina.substring(17);

      var checkUsuario = false;
      function pegarValorCheck(element){
          checkUsuario = element;
      }
    
      function FecharDropUsuario(){
          if(checkUsuario == true){
              document.querySelector("#dropUsuario").checked = false;
          }
      }

      function buscarProduto(){
        var pesquisa = document.querySelector("#procurar input").value;

        if(pagina == "site-christ/index.php"){
            window.location.href = "view/produtos.php?busca="+ pesquisa;

        }else{
            window.location.href = "produtos.php?busca="+ pesquisa;
        }
         
      }

      function submit(){
          if(event.keyCode === 13){
              buscarProduto();
          }
      }
  
</script>