<?php

namespace app\classes\emails;

use app\interfaces\InterfaceTemplateEmail;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    private $email;
    private $quem;
    private $para;
    private $assunto;
    private $mensagem;
    private $template;
    private $copia = [];


    public function __construct()
    {
        $this->email = new PHPMailer();
    }

    public function setQuem($quem)
    {
        $this->quem = $quem;
    }

    public function setPara($para)
    {
        $this->para = $para;
    }

    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }

    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function setTemplate(InterfaceTemplateEmail $template)
    {
        $this->template = $template;
    }

    public function setCopia($copia)
    {
        $this->copia = $copia;
    }

    public function enviarEmail()
    {
        $this->email->CharSet = 'UTF-8';
        $this->email->isSMTP();

        $this->email->Host = 'sandbox.smtp.mailtrap.io';
        $this->email->SMTPAuth = 'plain';

        $this->email->Username = '0bd0d11acb51e4';
        $this->email->Password = 'a86e4722208ffe';

        $this->email->SMTPSecure = 'tls';
        $this->email->Port = 2525;

        $this->email->isHTML(true);

        $this->email->setFrom('luiz_otaviojunior2@outlook.com');
        $this->email->FromName = $this->quem;

        $this->email->addAddress($this->para);
        if (isset($this->copia)) {
            foreach ($this->copia as $copia) {
                $this->email->addCC($copia);
            }
        }
        $this->email->Subject = $this->assunto;
        $this->email->AltBody = 'Para ver esse email tenha certeza de estar vendo em um programa que aceita ver HTML';
        $this->email->msgHTML($this->template->template($this->mensagem));
        if (!$this->email->send()) {
            dd($this->email->ErrorInfo);
            return false;
        }
        return true;
    }
}
