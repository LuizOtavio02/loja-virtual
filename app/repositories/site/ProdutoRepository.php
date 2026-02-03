<?php

namespace app\repositories\site;

use app\models\site\ProdutoModel;

class ProdutoRepository
{
    public $produto;

    public function __construct() {
        $this->produto = new ProdutoModel;
    }

    public function listarProduto($limit)
    {
        $query = "select * from {$this->produto->table} order by id desc limit {$limit}";
        $prepare = $this->produto->pdo->prepare($query);
        $prepare->execute();

        return $prepare->fetchAll();
    }
}
