<?php
    if( (substr($_SERVER['SCRIPT_NAME'], 13, 21)) == "index.php" || (substr($_SERVER['SCRIPT_NAME'], 13, 21)) == ""  ){
        include_once "model/conexao.php";

    }else{
        include_once "../model/conexao.php";
    }    

    class Style extends Conexao{
        public static $propsStyle = array();
        private static $data;
        

        public static function getStyle(){
            self::$data = Conexao::query("SELECT * FROM style");

            foreach(self::$data as $row){
                self::$propsStyle[0] = $row[1]; // CorTopo
                self::$propsStyle[1] = $row[2]; // CorMenu
                self::$propsStyle[2] = $row[3]; // CorSecundaria
                self::$propsStyle[3] = $row[4]; // Rodape
                self::$propsStyle[4] = $row[5]; // AtivarSlide
                self::$propsStyle[5] = $row[6]; // Favicon
                self::$propsStyle[6] = $row[7]; // Logo
                self::$propsStyle[7] = $row[8]; // Type
                self::$propsStyle[8] = $row[9]; // LinkFonte
                self::$propsStyle[9] = $row[10];// NomeFonte
                self::$propsStyle[10] = $row[11];// TipoFonte
            }

            return self::$propsStyle;
        }

        public static function updateStyle($cor, $linkFonte, $nomeFonte, $tipoFonte){
            try{
                if($cor == "default"){
                    
                    if ($linkFonte != "" or $nomeFonte != "" or $tipoFonte != "") {
        
                        $stmt = Conexao::query("UPDATE style set corTopo='24262d', corMenu='1c1f26', corSecundaria='961227', rodape='24262d', ativarSlide='1', favicon='media/images/icons/favicon.png', logo='media/images/logo.png', type='default', linkFonte='".$linkFonte."', nomeFonte='".$nomeFonte."', tipoFonte='".$tipoFonte."' WHERE id=1");
                    }else{
                        $stmt = Conexao::query("UPDATE style set corTopo='24262d', corMenu='1c1f26', corSecundaria='961227', rodape='24262d', ativarSlide='1', favicon='media/images/icons/favicon.png', logo='media/images/logo.png', type='default' WHERE id=1");
                    }
        
                    header("location: ../view/configuracoes.php");
                }
                else if($cor == "default2"){
                    
        
                    if ($linkFonte != "" or $nomeFonte != "" or $tipoFonte != "") {
                        $stmt = Conexao::query("UPDATE style set corTopo='000000', corMenu='444343', corSecundaria='ed1c24', rodape='000000', ativarSlide='1', favicon='media/images/icons/favicon.png', logo='media/images/logo.png', type='default2', linkFonte='".$linkFonte."', nomeFonte='".$nomeFonte."', tipoFonte='".$tipoFonte."' WHERE id=1");
                    }else{
                        $stmt = Conexao::query("UPDATE style set corTopo='000000', corMenu='444343', corSecundaria='ed1c24', rodape='000000', ativarSlide='1', favicon='media/images/icons/favicon.png', logo='media/images/logo.png', type='default2' WHERE id=1");
                    }
        
                    header("location: ../view/configuracoes.php");
                }
        
                else if($cor == "default3"){
                    
        
                    if ($linkFonte != "" or $nomeFonte != "" or $tipoFonte != "") {
                        $stmt = Conexao::query("UPDATE style set corTopo='303030', corMenu='444343', corSecundaria='ed1c24', rodape='303030', ativarSlide='1', favicon='media/images/icons/favicon.png', logo='media/images/logo.png', type='default3', linkFonte='".$linkFonte."', nomeFonte='".$nomeFonte."', tipoFonte='".$tipoFonte."' WHERE id=1");
                    }else{
                        $stmt = Conexao::query("UPDATE style set corTopo='303030', corMenu='444343', corSecundaria='ed1c24', rodape='303030', ativarSlide='1', favicon='media/images/icons/favicon.png', logo='media/images/logo.png', type='default3' WHERE id=1");
                    }
        
                    header("location: ../view/configuracoes.php");
                }
                
        
            }catch(PDOException $e){
                echo "ERROR: " .$e->getMessage();
            }

        }
        
    }
    