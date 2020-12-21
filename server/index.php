<?php

require "./bootstrap.php";
require './vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$httpMethod = $_SERVER['REQUEST_METHOD'];

$routeResult = $router->dispatch($httpMethod, $uri);

$handler = $routeResult[0];
$params = $routeResult[1];

$handler($params);

