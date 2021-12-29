<?php

class ConexaoPDO {  
 
    private static $pdo;
  
    private function __construct() {  
       
    } 
  
    public static function getInstance() {  
      if (!isset(self::$pdo)) {  
        try {  
            $dsn = "pgsql:host=localhost;port=5432;dbname=mercado;";

            // make a database connection
            return new PDO(
                $dsn,
                'postgres',
                '123456',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {  
          print "Erro: " . $e->getMessage();  
        }  
      }  
      return self::$pdo;  
    }  
}
