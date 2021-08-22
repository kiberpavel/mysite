<?php

namespace Core;

use Controllers;

//Класс маршрутизации
error_reporting(E_ALL);
ini_set('display_errors', 'On');
class Route
{
    protected $routes;

    public function __construct()
    {
        $routesPath = $_SERVER['DOCUMENT_ROOT'] . '/App/conf/routes.php';
        $this->routes = include_once($routesPath);
    }

    private function getUrl()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function urlGetRequestParser($str)
    {
        $delimeter = "/";
        if ((bool)strrpos($str, $delimeter)) {
            $array = explode($delimeter, $str);
            $str = end($array);
        }

        return explode("?", $str)[0];
    }

    public function isGetRequest($urlPath)
    {
        $result = false;

        foreach ($this->routes as $route) {
            $uniquePage = false;
            $page = $this->urlGetRequestParser($urlPath);
            extract($route, EXTR_OVERWRITE);
            if ($uniquePage && $getKey == $page) {
                $result = true;
                break;
            }
        }
        if ($result) {
            header("Location: /$action/{$_GET[$getKey]}");
        }
    }

    private function load($controller, $action)
    {
        $controllerName = 'Controllers\\' . ucfirst($controller . 'Controller');
        $actionName = 'action' . ucfirst($action);
        $controllerObject = new $controllerName();
        $controllerObject->$actionName();
        exit;
    }

    public function run()
    {
        $urlPath = $this->getUrl();
        $this->isGetRequest($urlPath);

        foreach ($this->routes as $route) {
            $uniquePage = false;
            extract($route, EXTR_OVERWRITE);
            if ($url == $urlPath || preg_match("~$url~", $urlPath) && $uniquePage) {
                $this->load($controller, $action);
            }
        }
    }
}
