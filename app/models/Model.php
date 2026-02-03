<?php 
namespace app\models;

use PDO;


class Model
{
    public ?PDO $pdo = null;
    protected $table;

    public function __construct() {
        $this->pdo = Transactions::get();
    }

    public function fetchAll()
    {
        $query = "select * from {$this->table}";
        $prepare = $this->pdo->prepare($query);
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }

    public function find($field, $value, $flag = null)
    {
        $query = "select * from {$this->table} where {$field} = :{$field}";
        $prepare = $this->pdo->prepare($query);
        $prepare->execute([$field => $value]);

        return ($flag == null) ? $prepare->fetch() : $prepare->fetchAll();

    }

    public function create($data)
    {
        $fields = array_keys($data);
        $columns = implode(', ',$fields);
        $params = implode(', :',$fields);

        $query = "insert into {$this->table} ($columns) values (:{$params});";
        $prepare = $this->pdo->prepare($query);
        $prepare->execute($data);

        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $fields = array_keys($data);
        $set = implode(', ', array_map(fn($fn) => "$fn = :$fn" ,$fields));

        $query = "update {$this->table} set {$set} where id = :id";
        $data['id'] = $id;
        $prepare = $this->pdo->prepare($query);
        $prepare->execute($data);

        return $prepare->rowCount();
    }
}





?>