<?php
namespace Src\Controllers;
use Src\Models\User;
use Src\Utils\Http\{Request, Response};
use \Firebase\JWT\JWT;

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

    public static function create() {
        $user = Request::get();
        $user = (new User($user['user']['name'], $user['user']['email'], $user['user']['password']))->save();

        Response::send([
            "status" => 'success',
            "user" => $user
        ]);
    }

    public static function authenticate() {
        $req = Request::get();
        $email = $req['email'];
        $password = $req['password'];

        // TODO: Throw and catch exception
        $user = User::authenticateViaEmail($email, $password);
        if (!$user) {
            return Response::send([
                "status" => 'error',
                "errormsg" => 'Invalid email or password'
            ], 400);
        }

        // Save token with id and email payload
        $payload = array(
           "id" => $user['id'],
           "email" => $user['email']
        );
        $token = JWT::encode($payload, $_ENV['JWT_SECRET']);

        Response::send([
            "status" => 'success',
            "token" => $token
        ]);
    }
}
