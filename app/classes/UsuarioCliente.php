<?php 
namespace app\classes;

use app\models\site\UserModel;

class UsuarioCliente
{
    public $usuario;
    public $sessaoCliente;
    public $redirect;

    public function __construct() {
        $this->usuario = new UserModel;
        $this->sessaoCliente = new SessaoCliente;
        $this->redirect = new Redirect;
    }

    public function login($email, $password)
    {
        $usuario = $this->usuario->find('email',$email);

        if (!$usuario) {
            return false;
        }

        
        $classPassword = new Password;
        if ($classPassword->verificarPassword($password,$usuario['senha'])) {
            $data = [
                'id' => $usuario['id'],
                'nome' => $usuario['nome'],
                'logado' => true
            ];
            $this->sessaoCliente->criarSessao($data);
            
            return true;
        }else {
            return false;
        }
    }

    public function cadastrar($input)
    {
        $classPassword = new Password;
        $password = $classPassword->hash($input['password']);
        $data = [
            'nome' => $input['nome'],
            'email' => $input['email'],
            'senha' => $password
        ];
        
        $this->usuario->create($data);
    }

    public function logado()
    {
        if (isset($_SESSION['cliente']['logado']) && $_SESSION['cliente']['logado'] == true) {
            return true;
        }

        return false;
    }

    public function logout()
    {
        if ($this->sessaoCliente->sessaoExiste()) {
            unset($_SESSION['cliente']);
        }
    }
}




?>