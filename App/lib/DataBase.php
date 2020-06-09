<?php
namespace App\lib;

class DataBase {

    public static function getMysqlConnexion() {
        $db = new \PDO('mysql:host=localhost;dbname=project_4;charset=utf8', 'root', 'root');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}
?>