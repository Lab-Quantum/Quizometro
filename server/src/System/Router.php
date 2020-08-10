<?php

namespace System;

class Router {
    public $routes = array();
    public $params = array();
    public $request = array();

    public function __construct() {
        return true;
    }

    public function add($method = 'get', $destiny, $callback) {
        array_push($this->routes, array(
            "method" => $method,
            "destiny" => $destiny,
            "callback" => $callback
        ));
    }

    public function run() {
        foreach($this->routes as $route) {
            if(self::matchMethod($route["method"]) && self::matchDestiny($route["destiny"])) {
                self::startRoute($route["callback"]);
                break;
            }
        }
    }

    private function matchDestiny(string $destiny) : bool {
        $uri = str_replace(FOLDER, '', $_SERVER['REQUEST_URI']);

        $browserRoute = array_values(array_filter(explode('/', $uri)));
        $matchedRoute = array_values(array_filter(explode('/', $destiny)));

        if(count($matchedRoute) != count($browserRoute) && end($matchedRoute) != '*') {
            return false;
        }

        for($i = 0; $i < count($matchedRoute); $i++) {
            if(strpos($matchedRoute[$i], '{') == 0 && strpos($matchedRoute[$i], '}')) {
                $paramName = str_replace(['{', '}'], '', $matchedRoute[$i]);

                self::addParams($paramName, $browserRoute[$i]);
            } elseif($browserRoute[$i] != $matchedRoute[$i] && $matchedRoute[$i] != '*') {
                $this->params = [];

                return false;
            }
        }

        return true;
    }

    private function matchMethod($route) : bool {
        $route = strtolower($route);
        $request = strtolower($_SERVER['REQUEST_METHOD']);

        if($route == 'any' || $route == $request) {
            return true;
        }

        foreach($route as $method) {
            if($route == $request) {
                return true;
            }
        }

        return false;
    }

    private function startRoute($callback) : void {
        $callbackParams = self::getCallbackParams($callback); 

        echo $callback();
    }

    private function addParams($name, $value) : void {
        $this->params += array($name => $value);
    }

    private function getCallbackParams($callback) : array {
       //Pegar parametros do callback
    }
}