<?php

namespace Qwant\controllers;

use Qwant\DbConnect;

class ajaxController
{
    public function deliveryAction()
    {
        $db = DbConnect::getInstance();
    }
}