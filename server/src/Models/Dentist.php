<?php
namespace Src\Models;

use Src\Utils\DBConnector;
use Src\Exceptions\UserException;

class Dentist extends User {
    public static function getAll($offset=0, $limit=100) {
        $db = DBConnector::getInstance()->getConnection();
        $statement = 'select id,name,email,address,description,phone_number,rating from dentists limit :limit offset :offset';
        $query = $db->prepare($statement);
        $query->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, \PDO::PARAM_INT);
        
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = DBConnector::getInstance()->getConnection();
        $st = 'select id,name,email,practice,address,degree,description,phone_number,img_path,rating from dentists where id=?';
        $q = $db->prepare($st);
        $q->execute([$id]);
        return $q->fetch(\PDO::FETCH_ASSOC);
    }
}