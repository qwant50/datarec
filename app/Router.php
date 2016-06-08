<?php

namespace Qwant;

class Router
{
    private $controller = 'Main';
    private $action = 'default';
    private $id = 1;

    public function init($url)
    {
        $url = ltrim(trim($url), '/');

        $routes = array(
            'index.html' => array('id' => 1, 'controller' => 'main', 'action' => 'default'),
            'news.html' => array('id' => 2, 'controller' => 'main', 'action' => 'default'),
            'service.html' => array('id' => 4, 'controller' => 'main', 'action' => 'default'),
            'contacts.html' => array('id' => 5, 'controller' => 'main', 'action' => 'default'),
            'certificates.html' => array('id' => 6, 'controller' => 'main', 'action' => 'default'),
            'price.html' => array('id' => 7, 'controller' => 'main', 'action' => 'default'),
            'photo.html' => array('id' => 8, 'controller' => 'main', 'action' => 'default'),

            'articles.html' => array('id' => 16, 'controller' => 'main', 'action' => 'article'),
            'article1.html' => array('id' => 10, 'controller' => 'main', 'action' => 'article'),
            'article2.html' => array('id' => 11, 'controller' => 'main', 'action' => 'article'),
            'article3.html' => array('id' => 12, 'controller' => 'main', 'action' => 'article'),
            'article4.html' => array('id' => 13, 'controller' => 'main', 'action' => 'article'),
            'article5.html' => array('id' => 14, 'controller' => 'main', 'action' => 'article'),
            'article6.html' => array('id' => 15, 'controller' => 'main', 'action' => 'article'),
            'article7.html' => array('id' => 16, 'controller' => 'main', 'action' => 'article'),

            'vosstanovlenie_flash.html' => array('id' => 20, 'controller' => 'main', 'action' => 'default'),
            'vosstanovlenie_ssd.html' => array('id' => 21, 'controller' => 'main', 'action' => 'default'),
            'recovery-data-hdd.html' => array('id' => 22, 'controller' => 'main', 'action' => 'default'),
            'poradok_rabot.html' => array('id' => 25, 'controller' => 'main', 'action' => 'default'),

            'delivery.php' => array('id' => 26, 'controller' => 'ajax', 'action' => 'delivery'),
        );
        if (isset($routes[$url])) {
            $this->controller = $routes[$url]['controller'];
            $this->action = $routes[$url]['action'];
            $this->id = $routes[$url]['id'];
        };

        $this->controller = ucfirst($this->controller);
        $this->action = strtolower($this->action);

        //if (preg_match('/^article[\d]+.html$/', $url)) echo 'ddd';
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getId()
    {
        return $this->id;
    }
}
