<?php

namespace Model;

class Conexao {
  
   private static $instance;

   public static function getConn(){

    try {

       if(!isset(self::$instance)):
            define( 'MYSQL_HOST', 'localhost' );
            define( 'MYSQL_USER', 'root' );
            define( 'MYSQL_PASSWORD', '' );
            define( 'MYSQL_DB_NAME', 'veiculos' );
            define( 'MYSQL_CHARSET', 'utf8' );
            self::$instance = new \PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME . ';charset=' . MYSQL_CHARSET, MYSQL_USER, MYSQL_PASSWORD );

        endif;
       return self::$instance;

    } catch(\PDOException $e){
        echo 'Erro: Não foi possível conectar '.$e->getMessage();
    }
   }
}

?>
