<?php 
namespace app\classes\emails;

use app\interfaces\InterfaceTemplateEmail;

class TemplateContato extends TemplateFormato implements InterfaceTemplateEmail
{
    public function template($data)
    {
        $template = file_get_contents('emails/emailContato.php');
        return $this->substituirVariavel($template, $data);
    }
}




?>