<?php

use Qwant\helpers\Url;
use Qwant\Router;
use Qwant\View;
try {
    $hasMarker = file_exists('C:\dev-flag.marker');
    if ($hasMarker) {
        define('YII_DEBUG', true);
        define('YII_ENV', 'dev');
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $domain = 'http://www.local-datarec.com.ua';

    } else {
        define('YII_DEBUG', false);
        define('YII_ENV', 'prod');
        error_reporting(0);
        ini_set('display_errors', 0);
        $domain = 'http://www.datarec.com.ua';
    }

    define("ROOT", realpath(__DIR__) . DIRECTORY_SEPARATOR);
    require_once __DIR__ . '/vendor/autoload.php';

    Url::init($domain);

    $router = new Router();

    $controllerName = 'Qwant\\controllers\\' . $router->getController() . 'Controller';

    if (class_exists($controllerName)) {
        $controller = new $controllerName;
        $actionName = $router->getAction() . 'Action';
        $controller->$actionName($router->getId());
    }
} catch (\Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
