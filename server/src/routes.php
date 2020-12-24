<?php

require "Utils/RestRoute/Router.php";

use Src\Controllers\UserController;

// TODO: Make into class
function initRouterRoutes() {
    $router = new RestRoute\Router();

    $router->addRoute('GET', '/apiv1/users', function() {
        UserController::getAll();
    });

    $router->get('/users/{userid}', function($data) {
        UserController::getById($data['userid']);
    });

    $router->post('/apiv1/users', function() {
        UserController::create();
    });

    return $router;
}
