<?php 
namespace app\classes\cliente;

class SessaoCliente
{
    public function sessaoExiste()
    {
        return (isset($_SESSION['cliente'])) ? true : false;
    }

    public function criarSessao($data)
    {
        if(!$this->sessaoExiste()){
            return $_SESSION['cliente'] = $data;
        }
    }

    public function sessao()
    {
        return $_SESSION['cliente'];
    }

}





?>