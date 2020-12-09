<?php
namespace Src\Models;

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
}