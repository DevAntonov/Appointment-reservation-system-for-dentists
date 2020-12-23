<?php
namespace Src\Controllers;
use Src\Models\User;
use Src\Utils\Http\Response;

class UserController {
    public static function getAll() {
        $users = User::all();
        Response::send([
            "status" => 'success',
            "users" => $users
        ]);
    }

    public static function getById($id) {
        $user = User::getById($id);

        if (!$user) {
            return Response::send([
                "status" => 'error',
                "errormsg" => 'User not found'
            ], 404);
        }

        Response::send([
            "status" => 'success',
            "user" => $user
        ]);
    }

    public static function create($user) {
        $user = (new User($user['name'], $user['email'], $user['password']))->save();
        Response::send([
            "status" => 'success',
            "user" => $user
        ]);
    }
}
