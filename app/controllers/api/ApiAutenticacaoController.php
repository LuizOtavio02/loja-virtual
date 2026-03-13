<?php

namespace app\controllers\api;

use app\classes\Filters;
use app\classes\SessaoCliente;
use app\classes\UsuarioCliente;

class ApiAutenticacaoController
{
    public function login()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        header('Content-Type: application/json');

        if (!$input || empty($input['email']) || empty($input['password'])) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Email ou Senha Vazios'
            ]);
            return;
        }

        $filter = new Filters;
        $email = $filter->filter($input['email'], 'email');

        $usuarioCliente = new UsuarioCliente;
        $logar = $usuarioCliente->login($email, $input['password']);

        

        if ($logar) {
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'message' => 'Usuario Logado com sucesso'
            ]);
            return;
        }

        http_response_code(401);
        echo json_encode([
            'success' => false,
            'message' => 'Usuario nao conseguiu logar'
        ]);
    }

    public function cadastrar()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $usuarioCliente = new UsuarioCliente;
        $usuarioCliente->cadastrar($input);

        echo json_encode([
            'success' => true,
            'received' => $input
        ]);
    }

    public function logado()
    {
        $usuarioCliente = new UsuarioCliente;
        $retorno = $usuarioCliente->logado();

        header('Content-Type: application/json');

        if ($retorno) {
            $cliente = new SessaoCliente;
            $sessao = $cliente->sessao();
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'message' => 'Usuario está Logado',
                'sessao' => $sessao
            ]);
            return;
        }

        http_response_code(401);
        echo json_encode([
            'success' => false,
            'message' => 'Usuario nao está logado'
        ]);
    }

    public function logout()
    {
        $usuarioCliente = new UsuarioCliente;
        $usuarioCliente->logout();

        header('Content-Type: application/json');

        http_response_code(200);
        echo json_encode([
            'success' => true,
            'message' => 'Usuario Fez o Logout',

        ]);
    }
}
