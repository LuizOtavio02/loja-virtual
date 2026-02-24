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

    public function index()
    {
        $produtos = new ProdutoCarrinhoRepository;
        $produtosCarrinho = $produtos->produtosNoCarrinho();
        $valorTotalCarrinho = $produtos->totalProdutosCarrinho(); 
        // Aqui é onde se salva os dados para utilizar na view
        $dados = [
            'titulo' => 'Carrinho',
            'produtosCarrinho' => $produtosCarrinho,
            'valorTotalCarrinho' => $valorTotalCarrinho
        ];

        // load da view que pretende usar esse controller
        $template = $this->twig->load('site_carrinho.html');
        
        // passo o array com os dados para utilizar na view
        $template->display($dados);

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