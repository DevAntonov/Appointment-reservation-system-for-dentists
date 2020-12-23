<?php

namespace Src\Utils\Http;

class Response {
    public static function send(array $data, int $code=200): void {
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode($data);
    }
}
