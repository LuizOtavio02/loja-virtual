<?php 
namespace app\controllers;

// Classe feita para ser entendida pelos Controllers que utilizarão a Template engine Twig
class BaseController
{
    // Atributo $twig
    protected $twig;

    // seto o Twig para o Atributo
    public function setTwig($twig)
    {
        $this->twig = $twig;
    }
}




?>