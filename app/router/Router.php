<?php 
namespace app\router;

class Router
{
    private $routerFilter;

    public function __construct() {
        $this->routerFilter = new RouterFIlter;
    }
    public function getController()
    {
        return $this->routerFilter->controller();
    }

    public function getMethod()
    {
        return $this->routerFilter->method();
    }
}




?>