<?php
  class config {
    private static $pdo = NULL;
    private static $dbName = 'cyber' ;
	  private static $dbHost = 'localhost' ;
	  private static $dbUsername = 'root';  
	  private static $dbUserPassword = '';
	  //private static $cont = null; 

    public static function getConnexion() {
      if (!isset(self::$pdo)) {
        try{
          self::$pdo = new PDO('mysql:dbhost=localhost;dbname=cyber', 'root', '',
          [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
          
        }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
        }
      }
      return self::$pdo;
    }
    public static function disconnect()
    {
        self::$pdo = null;
    }
  }
?>