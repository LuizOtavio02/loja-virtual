<?php 
namespace app\models\database\connectDatabase;

use app\interfaces\InterfaceConnectDatabase;

class Connection
{
    private $interfaceConnectDatabase;

    public function __construct(InterfaceConnectDatabase $interfaceConnectDatabase) {
        $this->interfaceConnectDatabase = $interfaceConnectDatabase;
    }

    public function connectDatabase()
    {
        return $this->interfaceConnectDatabase->connectDatabase();
    }
}





?>