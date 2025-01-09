<?php

namespace app\classes;

use Exception;

class Route
{
    public function __construct(
        private  $uri = null,
        private $method = null
    )
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    private function validateRoute(array $routes)
    {
        if(!isset($routes[$this->method])){
            throw new Exception("METHOD: {$this->method} Desconhecido!");
        }
        if(!isset($routes[$this->method][$this->uri])){
            throw new Exception("URI: {$this->uri} Não Encontrada");
        }
    }
    private function validateController(string $controllerNamespace, string $controller, string $method)
    {
        $controllerPath = dirname(__DIR__)."/controllers/{$controller}.php";
        
        if(!file_exists($controllerPath)){
            throw new Exception("CONTROLLER: {$controller} Não Encontrado!");
        }
        
        if(!method_exists($controllerNamespace, $method)){
            throw new Exception("METHOD: {$method} Não Encontrado!");
        }
    }

    public function routeExecutor(array $routes)
    {
        $this->validateRoute($routes);

        [$controller, $method] = explode('@', $routes[$this->method][$this->uri]);

        $controllerNamespace = "app\\controllers\\{$controller}";
        $this->validateController($controllerNamespace, $controller, $method);

        $controllerInstance = new $controllerNamespace;

        return $controllerInstance->$method();

    }
}