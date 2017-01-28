<?php
/**
*
*/
class Database
{
  private static $dbname= 'crud';
  private static $host='localhost';
  private static $user='root';
  private static $password= 'root';

  private static $cxn= null;


  function __construct()
  {
    # code...
    die('Init function is not allowed');
  }
   public static function connect(){
    //One connection through the hole app
    if (null ==self::$cxn) {
      # code...
      try {
        self::$cxn= new PDO ("mysql:host=".self::$host.";"."dbname=".self::$dbname, self::$user, self::$password);

      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
    return self::$cxn;
   }

   public static function disconnect(){
    self::$cxn =null;
   }
}
 ?>