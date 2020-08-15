<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'headers.php';
require 'vendor/autoload.php';
require 'local.php';
require 'routes/routes.php';
