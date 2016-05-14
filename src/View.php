<?php

namespace Qwant;

class View
{
    public function render($template, array $data = array ())
    {
        //var_dump($data['content']);
        $data['content'] = file_get_contents($data['content']);
        ob_start();
        include $template;
        echo ob_get_clean();
    }
}