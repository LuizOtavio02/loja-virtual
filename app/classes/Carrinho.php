<?php

namespace app\classes;

class Carrinho
{
    private $statusCarrinho;

    public function __construct()
    {
        $this->statusCarrinho = new StatusCarrinho;
        $this->statusCarrinho->criarCarrinho();
    }

    public function add($id)
    {
        if (is_numeric($id)) {
            if ($this->statusCarrinho->produtoEstaNoCarrinho($id)) {
                $_SESSION['carrinho'][$id] += 1;
            } else {
                $_SESSION['carrinho'][$id] = 1;
            }
            return true;
        }

        return false;
    }

    public function carrinhoProduto($id)
    {
        return $_SESSION['carrinho'][$id];
    }

    public function update($id, $qtd)
    {
        if ($qtd <= 0) {
            $this->remove($id);
            return;
        }

        if ($this->statusCarrinho->produtoEstaNoCarrinho($id)) {
            $_SESSION['carrinho'][$id] = $qtd;
        }
    }

    public function remove($id)
    {
        if ($this->statusCarrinho->produtoEstaNoCarrinho($id)) {
            unset($_SESSION['carrinho'][$id]);
        }
    }

    public function clear()
    {
        if ($this->statusCarrinho->carrinhoExiste()) {
            unset($_SESSION['carrinho']);
        }
    }

    public function produtosCarrinho()
    {
        if ($this->statusCarrinho->carrinhoExiste()) {
            return $this->statusCarrinho->carrinho();
        }
    }

    public function qtdNoCarrinho()
    {
        return array_sum($this->statusCarrinho->carrinho());
    }
}
