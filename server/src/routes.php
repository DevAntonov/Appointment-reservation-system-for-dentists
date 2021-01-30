<?php

require "Utils/RestRoute/Router.php";

use Src\Controllers\UserController;

// TODO: Make into class
function initRouterRoutes() {
    $router = new RestRoute\Router();

    $router->post('/api/v1/users', function() {
        UserController::register();
    });

    $router->post('/api/v1/users/authenticate', function() {
        UserController::authenticate();
    });

    $router->get('/api/v1/users', function() {
        UserController::getAll();
    });

    $router->get('/api/v1/users/{userid}', function($data) {
        UserController::getById($data['userid']);
    });

    return $router;
}
