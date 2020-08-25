<?php

use \System\Router;

$routes = new Router();

$routes->add('get', '/', function () { return 'Server On'; } );

require 'sign.php';

$routes->add('any', '/*', function () { 
    global $routes;
    $routes->setStatusCode(404);

    return 'Page not Found'; 
} );

$routes->run();
