<?php

namespace app\classes;

use app\router\Uri;

class BreadCrumb
{
    protected $uri;

    public function __construct()
    {
        $this->uri = new Uri;
    }

    public function buscaBreadCrumb()
    {
        if (substr_count($this->uri->get(), '?') > 0) {
            $explodeIgual = explode('=', $this->uri->get());
            return "<li class=\"breadcrumb-item active\" aria-current=\"page\"><a href=\"/dev/loja-virtual/public/\">Home</a></li>";
        }
    }

    public function createBreadCrumb()
    {
        
        $base = "/dev/loja-virtual/public";

        if ($this->uri->get() == $base.'/' || $this->uri->get() == '/') {
            return [
                ['nome' => 'Inicio', 'link' => $base]
            ];
        }

        $uriExplode = array_filter(explode('/',$this->uri->get()));
        $baseExplode = array_filter(explode('/',$base));

        $arrayDiff = array_values(array_diff($uriExplode,$baseExplode));

        $breadCrumb = [
            ['nome' => 'Inicio', 'link' => $base]
        ]; 
        
        $path = '';

        foreach ($arrayDiff as $item) {
            $path .= '/' . $item;
            $breadCrumb[] = [
                'nome' => ucfirst(str_replace('-', ' ', $item)),
                'link' => $base . $path
            ];
        }

        return $breadCrumb;
        
    }
}
