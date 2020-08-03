<?php
namespace App\lib;

class Database {

    private static $_instance;

    protected function __construct() {
        // Data Source Name
        $dsn = 'mysql:host=' . env('DB_HOST') .';dbname=' . env('DB_NAME') .';charset=utf8';
        $db = new \PDO($dsn, env('DB_USERNAME'), env('DB_PASSWORD'));
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        self::$_instance = $db;
        // var_dump(self::$_instance);
    }
    
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            new Database();
        }
        return self::$_instance;
    }
}
?>