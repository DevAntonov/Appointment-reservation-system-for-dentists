<?php
require __DIR__ . '/vendor/autoload.php';
require 'src/routes.php';
use Src\Utils\DBConnector;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// TODO: Make class
$router = initRouterRoutes();

