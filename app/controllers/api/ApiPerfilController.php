<?php 
namespace app\controllers\api;

use app\classes\SessaoCliente;
use app\models\site\EnderecoModel;
use app\models\site\UserModel;

class ApiPerfilController
{
    protected $sessaoCliente;
    protected $userModel;
    protected $enderecoModel;

    public function __construct() {
        $this->sessaoCliente = new SessaoCliente;
        $this->userModel = new UserModel;
        $this->enderecoModel = new EnderecoModel;
    }

    public function dados()
    {
        $sessao = $this->sessaoCliente->sessaoExiste();

        if ($sessao) {
            $sessaoCliente = $this->sessaoCliente->sessao();

            $user = $this->userModel->find('id',$sessaoCliente['id']);
            $userEndereco = $this->enderecoModel->find('id_cliente', $sessaoCliente['id']);

            $dados = [
                'nome' => $user['nome'],
                'email' => $user['email'],
                'telefone' => $user['telefone'],
                'create' => $user['created_at'],
                'update' => $user['updated_at'],
                'estado' => $userEndereco['estado'],
                'cidade' => $userEndereco['cidade'],
                'bairro' => $userEndereco['bairro'],
                'rua' => $userEndereco['rua'],
                'numero' => $userEndereco['numero']
            ];

            echo json_encode($dados, JSON_PRETTY_PRINT);
        }
    }
}






?>