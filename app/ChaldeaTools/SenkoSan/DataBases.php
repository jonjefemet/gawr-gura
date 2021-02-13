<?php

namespace App\ChaldeaTools\SenkoSan;

use Exception;
use PDO;

class DataBases
{

    private static $pdo;

    private static function findConnection(string $db_name = "default")
    {
        $info = [];
        if (file_exists(__DIR__ . "/DBConfig.php")) {
            $info = require __DIR__ . "/DBConfig.php";
        }

        if (isset($info[$db_name])) {
            return $info[$db_name];
        } else {
            throw new \Exception("DB not found", 1);
        }
    }

    public static function getConnection(string $name = "")
    {
        $db_config = DataBases::findConnection($name);

        switch ($db_config["driver"]) {
            case "Mysql":
                return DataBases::dbMysql($db_config);
                break;

            default:
                throw new Exception("Driver not found", 1);
                break;
        }
    }

    public static function dbMysql($config): PDO
    {
        ini_set('mysql.connect_timeout', 300);
        ini_set('default_socket_timeout', 300);
        $host = 'mysql:host=:host:;dbname=:dbname:;charset=:charset:';
        $host = str_replace(':host:', $config['host'], $host);
        $host = str_replace(':dbname:', $config['dbname'], $host);
        $host = str_replace(':charset:', $config['charset'], $host);

        try {
            if (is_null(self::$pdo)) {
                self::$pdo = new PDO(
                    $host,
                    $config['user'],
                    $config['pass'],
                );
                #self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                #self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            return self::$pdo;
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }
}
