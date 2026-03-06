<?php 
namespace app\controllers\api;

use app\classes\Redirect;
use app\repositories\site\ProdutoRepository;

class ApiBuscaController
{
    public function index()
    {
        $busca = trim($_GET['b']) ?? '';
        
        $validateBusca = preg_match('/^[\p{L}0-9\s\-+]+$/u', $busca) ? $busca : null;
        
        if ($validateBusca === null || $validateBusca === '') {
            $redirect = new Redirect;
            $redirect->redirect();
        }

        $produto = new ProdutoRepository;
        $produtosEncontrados = $produto->buscarProduto($validateBusca);

        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode([
            'success' => true,
            'produtos' => $produtosEncontrados
        ], JSON_PRETTY_PRINT);
    }
}




?>