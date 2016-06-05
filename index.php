<?php

use Qwant\helpers\Url;
use Qwant\Router;
use Qwant\View;

error_reporting(E_ALL);
ini_set('display_errors', 1);

define("ROOT", realpath(__DIR__) . DIRECTORY_SEPARATOR);
require __DIR__ . '/vendor/autoload.php';

Url::init('http://www.datarec.com.ua');

$router = new Router();
$router->init($_SERVER["REQUEST_URI"]);

$controllerName = 'Qwant\\controllers\\' . $router->getController() . 'Controller';

if (class_exists($controllerName)) {
    $controller = new $controllerName;
    $actionName = $router->getAction() . 'Action';
    $controller->$actionName($router->getId());
}