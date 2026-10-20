<?php

    namespace App\Core;

    use PDO;
use PDOException;

    final class DB {
        // protected PDO $pdo;
        private static ?PDO $instance=null;
        protected array $config;

        public static function getConnection():PDO {
            if (self::$instance === null) {
                $config=require __DIR__."/../Config/config.php";
                try {
                    /*self::$instance =*/ return new PDO($config["dsn"],$config["user"],$config["pass"], [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false
                    ]);
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            }
            return self::$instance;
        }

        function __construct () {
            // $this->pdo= new PDO($this->config["dsn"],$this->config["user"],$this->config["pass"]);
        }
    }