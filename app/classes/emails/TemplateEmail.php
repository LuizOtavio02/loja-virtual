<?php 
namespace app\classes\emails;

use app\interfaces\InterfaceTemplateEmail;

class TemplateEmail
{
    private $interfaceTemplateEmail;

    public function __construct(InterfaceTemplateEmail $interfaceTemplateEmail) {
        $this->interfaceTemplateEmail = $interfaceTemplateEmail;
    }

    public function show($data)
    {
        return $this->interfaceTemplateEmail->template($data);
    }
}




?>