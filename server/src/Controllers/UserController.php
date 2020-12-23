<?php
namespace Src\Controllers;
use Src\Models\User;

class UserController {
    public static function getAll() {
        $users = User::all();
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode([
            "status" => 'success',
            "users" => $users
        ]);
    }

    public static function getById($id) {
        $user = User::getById($id);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode([
            "status" => 'success',
            "user" => $user
        ]);
    }

    public static function create($user) {
        $user = (new User($user['name'], $user['email'], $user['password']))->save();
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode([
            "status" => 'success',
            "user" => $user
        ]);
    }
}
