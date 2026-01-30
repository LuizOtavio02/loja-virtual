<?php 
namespace app\models;

use app\models\database\connectDatabase\Connection;
use PDO;

class Transactions
{
    protected static ?PDO $pdo = null;

    public static function open()
    {
        self::$pdo ??= Connection::get();
        self::$pdo->beginTransaction();
    }

    public static function inTransaction()
    {
        return self::$pdo instanceof PDO && self::$pdo->inTransaction();
    }

    public static function get()
    {
        if(!self::inTransaction()){
            self::$pdo = Connection::get();
        }

        return self::$pdo;
    }
    public static function close()
    {
        if(self::inTransaction()){
            self::$pdo->commit();
        }
    }

    public static function rollBack()
    {   
        if (self::inTransaction()) {
            self::$pdo->rollBack();    
        }
    }
}




?>