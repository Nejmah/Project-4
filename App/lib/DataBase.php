<?php
namespace App\lib;

class DataBase {

    private static $_instance;

    protected function __construct() {

    }
    
    public static function getMysqlConnexion() {
        $db = new \PDO('mysql:host=localhost;dbname=project_4;charset=utf8', 'root', 'root');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new DataBase ();
        }
        return self::$_instance;
    }
}
?>