<?php

require "Utils/RestRoute/Router.php";
use Src\Models\User;

// TODO: Make into class
function initRouterRoutes() {
    $router = new RestRoute\Router();

    $router->addRoute('GET', '/apiv1/users', function() {
        $users = User::all();
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode([
            "status" => 'success',
            "users" => $users
        ]);
    });

    $router->get('/users/{userid}', function($data) {
        $user = User::getById($data['userid']);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode([
            "status" => 'success',
            "user" => $user
        ]);
    });

    return $router;
}
