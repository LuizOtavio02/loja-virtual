<?php 
namespace app\models\database\connectDatabase;

use app\interfaces\InterfaceConnectDatabase;
use PDO;

class ConnectPdoDatabase implements InterfaceConnectDatabase
{
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=phppoo", 'root', '',[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
    }

    public function connectDatabase()
    {
        return  $this->pdo;
    }
}




?>