<?php
namespace Src\Models;

use Src\Utils\DBConnector;

class User {

    private $name;
    private $email;
    private $password;
    
    public function __construct($name,$email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function save() {
        $conn = DBConnector::getInstance()->getConnection();
        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);

        $query = $conn->prepare('insert into patients(email, name, password) values(:email,:name,:password)');
        $query->execute(["email" => $this->email, "name" => $this->name, "password" => $hashedPassword]);

        return ["name" => $this->name, "email" => $this->email];
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
