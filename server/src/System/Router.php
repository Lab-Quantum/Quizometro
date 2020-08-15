<?php

namespace System;

class Router {
    public $params = array();
    public $request = array();
    public $headers = array();

    private $routes = array();
    private $statusCode = 200;

    public function __construct() {
        self::setRequest();
        self::setHeaders();
    }

    public function add($method = 'get', $destiny, $callback) : void {
        array_push($this->routes, array(
            "method" => $method,
            "destiny" => $destiny,
            "callback" => $callback
        ));
    }

    public function run() : void {
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

        if(is_array($route)) {
            foreach($route as $method) {
                if($method == $request) {
                    return true;
                }
            }
        }

        return false;
    }

    private function startRoute($callback) : void {
        $response = $callback( 
            $this->params, 
            $this->request, 
            $this->headers 
        );

        http_response_code($this->statusCode);

        echo json_encode($response, JSON_NUMERIC_CHECK);

        die();
    }

    private function addParams($name, $value) : void {
        $this->params += array($name => $value);
    }

    private function setRequest() : void {
       $this->request = count($_POST) > 0 ? (array) $_POST : (array) json_decode(file_get_contents("php://input"));
    }

    private function setHeaders() : void {
       $this->headers = apache_request_headers();
    }

    public function setStatusCode(int $status) : void {
        $this->statusCode = $status;
    }
}