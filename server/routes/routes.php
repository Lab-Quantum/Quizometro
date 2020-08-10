<?php

use \System\Router;

$routes = new Router();

$routes->add('get', '/', function () { return 'Server On'; } );
$routes->add('get', '/test/{id}', function ($params = [], $request) { return 'Test '.$params["id"]; } );
$routes->add('post', '/test/{id}', function ($params = []) { return 'Test '.$params["id"].' '.$request["name"]; } );

$routes->run();