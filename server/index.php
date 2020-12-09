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

echo $httpMethod."\n";
echo $uri."\n";
$routeResult = $routeDefiner->dispatch($httpMethod, $uri);
var_dump($routeResult);

// $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

// switch ($routeInfo[0]) {
//     case FastRoute\Dispatcher::NOT_FOUND:
//         // ... 404 Not Found
//         break;
//     case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
//         $allowedMethods = $routeInfo[1];
//         // ... 405 Method Not Allowed
//         break;
//     case FastRoute\Dispatcher::FOUND:
//         $handler = $routeInfo[1];
//         $vars = $routeInfo[2];
//         var_dump($routeInfo);
//         call_user_func($handler, $vars);
//         // ... call $handler with $vars
//         break;
// }

