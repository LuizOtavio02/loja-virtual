<?php 
namespace app\repositories\site;

use app\models\site\CategoriaModel;

class CategoriaRepository
{
    public $categoria;

    public function __construct() {
        $this->categoria = new CategoriaModel;
    }

    public function listarCategorias()
    {
        $query = "select categorias.nome from {$this->categoria->table}";
        $prepare = $this->categoria->pdo->prepare($query);
        $prepare->execute();

        return $prepare->fetchAll();
    }
}




?>