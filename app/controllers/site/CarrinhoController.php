<?php 
namespace app\controllers\site;

use app\classes\Carrinho;
use app\controllers\BaseController;
use app\repositories\site\ProdutoCarrinhoRepository;

class CarrinhoController extends BaseController
{
    private $carrinho;
    private $produtosCarrinhoRepository;

    public function __construct() {
        $this->carrinho = new Carrinho;
        $this->produtosCarrinhoRepository = new ProdutoCarrinhoRepository;
    }

    public function add($param)
    {
        $this->carrinho->add($param[0]);
    }

    public function get()
    {
        echo json_encode([
            'numeroProdutosCarrinho' => count($this->carrinho->produtosCarrinho()),
            'valorProdutosCarrinho' => $this->produtosCarrinhoRepository->totalProdutosCarrinho()
        ]);
    }
}




?>