<?php

require_once 'Controllers//BoardController.php';
require_once 'Controllers//SecurityController.php';
require_once 'Controllers//AdminController.php';
require_once 'Controllers//RegisterController.php';
require_once 'config.inc.php';

class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'board' => [
                'controller' => 'BoardController',
                'action' => 'getLatestPhotos'
            ],
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'register' => [
                'controller' => 'RegisterController',
                'action' => 'register'
            ],
            'registerAcception' => [
                'controller' => 'RegisterController',
                'action' => 'registerAcception'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'admin' => [
                'controller' => 'AdminController',
                'action' => 'index'
            ],
            'users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ],
            'favourites' => [
                'controller' => 'BoardController',
                'action' => 'favourites'
            ],
            'bookHelcow' => [
                'controller' => 'BoardController',
                'action' => 'bookHelcow'
            ],
            'bookPedzichow' => [
                'controller' => 'BoardController',
                'action' => 'bookPedzichow'
            ],
            'bookSzlak' => [
                'controller' => 'BoardController',
                'action' => 'bookSzlak'
            ],
            'account' => [
                'controller' => 'BoardController',
                'action' => 'account'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'login';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}