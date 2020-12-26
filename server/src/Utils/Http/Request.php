<?php

namespace Src\Utils\Http;

class Request {
    public static function get(): array {
        if (isset($_POST) && count($_POST) > 0) {
            return $_POST;
        }
        
        $rawInput = json_decode(file_get_contents('php://input'), true);
        if (isset($rawInput) && count($rawInput) !== 0) {
            return $rawInput;
        }

        return [];
    }
}
