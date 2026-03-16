<?php

namespace app\classes\emails;

class TemplateFormato
{
    public function substituirVariavel($template, $dados)
    {
        $allKeys = [];
        $allValues = [];

        foreach ($dados as $key => $dado) {
            $allKeys[] = '#' . $key;
            $allValues[] = $dado;
        }

        return str_replace($allKeys, $allValues, $template);
    }
}
