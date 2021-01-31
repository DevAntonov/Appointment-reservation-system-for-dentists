<?php
namespace Src\Controllers;

use Src\Utils\Http\Response;
use Src\Models\Dentist;

class DentistController {
    public static function getAll() {
        $dentists = Dentist::getAll();
        Response::send([
            "status" => 'success',
            "dentists" => $dentists
        ]);
    }

    public static function getById($dentistId) {
        $dentist = Dentist::findById($dentistId);
        Response::send([
            "status" => 'success',
            "dentist" => $dentist
        ]);
    }
}