<?php

namespace app\controllers\api;

use app\classes\Email;
use app\classes\Filters;
use app\classes\TemplateContato;

class ApiContatoController
{
    public function enviar()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        header('Content-Type: application/json');

        if (!$input || empty($input['nome']) || empty($input['email']) || empty($input['assunto'] || empty($input['mensagem']))) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Preencha os Campos Vazios'
            ]);
            return;
        }

        $filter = new Filters;
        $nome = $filter->filter($input['nome'], 'string');
        $email = $filter->filter($input['email'], 'email');
        $assunto = $filter->filter($input['assunto'], 'string');
        $mensagem = $filter->filter($input['mensagem'], 'string');
        $template = new TemplateContato;

        $phpMailer = new Email;
        $phpMailer->setPara('luiz_otaviojunior2@outlook.com');
        $phpMailer->setQuem($email);
        $phpMailer->setAssunto($assunto);
        $phpMailer->setMensagem(['nome' => $nome, 'data' => date('d/m/Y H:i:s'), 'mensagem' => $mensagem]);
        $phpMailer->setTemplate($template);

        if (!$phpMailer->enviarEmail()) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Email não foi enviado'
            ]);
            return;
        }

        http_response_code(200);
        echo json_encode([
            'success' => true,
            'message' => 'Email enviado com Sucesso'
        ]);
    }
}
