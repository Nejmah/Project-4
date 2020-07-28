<?php
namespace App\lib;

class Database {

    private static $_instance;

    protected function __construct() {
        // Data Source Name
        $dsn = 'mysql:host=' . env('DB_HOST') .';dbname=' . env('DB_NAME') .';charset=utf8';
        $db = new \PDO($dsn, env('DB_USERNAME'), env('DB_PASSWORD'));
        // $db = new \PDO('mysql:host=localhost;dbname=project_4;charset=utf8', 'root', 'root');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        self::$_instance = $db;
        // var_dump(self::$_instance);
    }
    
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            // On appelle le constructeur pour initialiser $_instance
            new Database();
        }
        return self::$_instance;
    }
}
?>