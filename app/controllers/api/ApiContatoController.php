<?php

namespace app\controllers\api;

use app\classes\Filters;

class ApiContatoController
{
    public function enviar()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $filter = new Filters;
        $nome = $filter->filter($input['nome'], 'string');
        $email = $filter->filter($input['email'],'email');
        $assunto = $filter->filter($input['assunto'],'string');
        $mensagem = $filter->filter($input['mensagem'],'string');

        echo json_encode([
            'success' => true,
            'message' => $input
        ]);
    }
}
