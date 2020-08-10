<?php

namespace System;

class Router {
    public $routes = array();
    public $params = array();

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

    private function matchMethod($route) {
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
}