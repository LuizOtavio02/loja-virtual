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

    public function listarProdutoEsportivo($id)
    {
        $query = "select * from {$this->produto->table} where id_categoria = :id";
        $prepare = $this->produto->pdo->prepare($query);
        $prepare->execute(['id' => $id]);

        return $prepare->fetchAll();
    }

    public function produtoEsportivo($slug)
    {
        $query = "select * from {$this->produto->table} where produto_slug = :slug";
        $prepare = $this->produto->pdo->prepare($query);
        $prepare->execute(['slug' => $slug]);

        return $prepare->fetch();
    }

    public function buscarProduto($validateBusca)
    {
        $busca = "%$validateBusca%";

        $query = "select p.*, c.nome as categoria_nome from {$this->produto->table} p join categorias c on p.id_categoria = c.id where p.nome like :busca";
        $prepare = $this->produto->pdo->prepare($query);
        $prepare->execute(['busca' => $busca]);

        return $prepare->fetchAll();
    }
}
