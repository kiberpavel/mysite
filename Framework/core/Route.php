<?php

//Класс маршрутизации
error_reporting(E_ALL);
ini_set('display_errors', 'On');
class Route{
    
    private $routes;
    
    public function __construct(){
        $routesPath = $_SERVER['DOCUMENT_ROOT'] . '/App/conf/routes.php';
        $this->routes = include($routesPath);
    }
    
    //Возвращает запрос строки
    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    public function run(){
        
        //Получаем строку запроса
        $uri = $this->getURI();
        foreach ($this->routes as $uriPattern => $path) {

//            //сравнение $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {
                
                
                $segments = explode('/', $path);
                
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName=ucfirst($controllerName);
                
                $actionName= 'action'. ucfirst(array_shift($segments));
                
                $controllerFile = $_SERVER['DOCUMENT_ROOT'] . '/App/controllers/' .
                    $controllerName . '.php';
                
                if(file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if($result != null){
                    break;
                }
            }
        }
    }
    
}