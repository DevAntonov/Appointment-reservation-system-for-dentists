<?php

require "Utils/RestRoute/Router.php";

function defineRoutes() {
    $router = new RestRoute\Router();

    $router->addRoute('GET', '/apiv1/users', 'get_users');
    $router->get('/users/{name}', 'get_user_with_name');

    return $router;
}