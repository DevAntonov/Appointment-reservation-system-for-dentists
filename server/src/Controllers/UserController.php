<?php
namespace Src\Controllers;
use Src\Models\User;
use Src\Exceptions;
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

    public static function register() {
        $data = Request::get();
        file_put_contents('php://stderr', print_r($data, TRUE));
        
        $userData = $data["user"];
        $userType = $userData["type"];
        
        if ($userType !== "dentist" && $userType !== "patient") {
            return Response::send([
                "status" => 'error',
                "message" => 'Invalid user type! User must be dentist or patient.'
            ]);
        }

        $user = new User($userType, $userData["name"], $userData["email"], $userData["password"]);

        try {
            $user->register();
        } catch (Exceptions\UserException $exp) {
            echo "Error";
            return Response::send([
                "status" => 'error',
                "message" => $exp->getMessage()
            ], 500);
        }

        Response::send([
            "status" => 'success',
            "message" => 'User registered'
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
