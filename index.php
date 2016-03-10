<?php

use Qwant\Router;
use Qwant\View;


//error_reporting(E_ALL);
//ini_set('display_errors', 1);

define("ROOT", realpath(__DIR__) . DIRECTORY_SEPARATOR);
require __DIR__ . '/vendor/autoload.php';

$router = new Router();
$view = new View();

$view->render(ROOT . 'pages/base.phtml', $router->init($_SERVER["REQUEST_URI"]));


