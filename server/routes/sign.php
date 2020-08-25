<?php

use \User\Sign;

$routes->add('get', '/sign/facebook', function() {
    return sign::facebook();
});

$routes->add('get', '/sign/twitter', function() {
    return sign::twitter();
});

$routes->add('get', '/sign/google', function() {
    return sign::google();
});