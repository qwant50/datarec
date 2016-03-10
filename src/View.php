<?php

namespace Qwant;

class View
{
    public function render($template, array $data)
    {
        extract($data);

        $content = file_get_contents($content);

        echo include $template;
    }
}