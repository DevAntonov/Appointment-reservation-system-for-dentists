<?php
namespace Src\Models;

use Src\Utils\DBConnector;
use Src\Exceptions\UserException;

class User {
    private $type;
    private $name;
    private $email;
    private $password;
    
    public function __construct($type, $name, $email, $password) {
        $this->type = $type;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function register() {
        $conn = DBConnector::getInstance()->getConnection();
        $tblname = $this->type . 's';
        $stm = 'select email from '.$tblname.' where email=:email';
        $findUser = $conn->prepare($stm);

        $findUser->execute([":email" => $this->email]);

        if (count($findUser->fetchAll()) !== 0) {
            throw new UserException("User already registerd with this email!");
        }

        $createStm = 'insert into '.$tblname.'(name, email, password) values(?,?,?)';
        $password = password_hash($this->password, PASSWORD_BCRYPT);
        $create = $conn->prepare($createStm);
        $create->execute([$this->name, $this->email, $password]);
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

    public static function authenticateViaEmail($email, $password) {
        $conn = DBConnector::getInstance()->getConnection();
        $query = $conn->prepare('select id,email,password from patients where email=?');
        $query->execute([$email]);
        $user = $query->fetch(\PDO::FETCH_ASSOC);

        // TODO: Throw error instead of returning array!
        if (password_verify($password, $user['password'])) {
            return ["id" => $user['id'], "email" => $user['email']];
        }
        return [];
    }
}
