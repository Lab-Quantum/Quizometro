<?php

use \System\Router;

$routes = new Router();

$routes->add('get', '/', function () { return 'Server On'; } );
$routes->add('get', '/test/{id}', function ($params) { return 'Param: '.$params['id']; } );
$routes->add('post', '/test/{id}', function ($params, $request) { return 'Param: '.$params['id'].' - request: '.$request['id']; } );
$routes->add('any', '/*', function () { 
    global $routes;
    $routes->setStatusCode(404);

    return 'Page not Found'; 
} );

$routes->run();
