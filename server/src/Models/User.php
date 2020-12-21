<?php
namespace Src\Models;

use Src\Utils\DBConnector;

class User {
    private $dbConn = null;

    public function __construct($dbConn) {
        $this->dbConn = $dbConn;
    }

    public function getAll() {
        $query = $this->dbConn->prepare("select * from patients");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function all() {
        $db = DBConnector::getInstance()->getConnection();
        $query = $db->prepare("select id,email,name from patients");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $conn = DBConnector::getInstance()->getConnection();
        $query = $conn->prepare('select id,name,email from patients where id=:id');
        $query->execute(["id" => $id]);
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
}
