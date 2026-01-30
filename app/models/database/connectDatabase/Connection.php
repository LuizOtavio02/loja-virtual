<?php 
namespace app\models\database\connectDatabase;

use PDO;

class Connection
{
    protected static ?PDO $pdo = null;

    public static function get()
    {
        if (is_null(self::$pdo)) {
            self::$pdo =  new PDO('mysql:host=localhost;dbname=phppoo;charset=utf8mb4', 'root','',[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return self::$pdo;
    }
}





?>