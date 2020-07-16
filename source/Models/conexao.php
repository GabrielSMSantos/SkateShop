<?php

    namespace Source\Models;

    class Conexao
    {
        
        private static $conn;

        public static function getInstance(){

            if(!isset(self::$conn)){
                try{
                    
                    self::$conn = new \PDO('mysql:host='.HOST.';dbname='.NAME_DB, USER, PASSWORD);
                    
                    self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        
            
                }catch(\PDOException $e){
                    echo "ERROR :" .$e->getMessage();
                }
    
            }

            return self::$conn;
        }

        public static function disconnectDB(){
            self::$conn = NULL;
        }

        public static function prepare($sql){
            return self::getInstance()->prepare($sql);
        }


        public static function query($sql){
            return self::getInstance()->query($sql);
        }


    }
    
      