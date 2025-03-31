<?php

require 'functions.php';
class DbConn
{
    private static PDO $db;

    public static function getConnection($config):PDO{
        if(!isset(self::$db)){
            try{
                self::$db = new PDO($config['dsn'], $config['username'], $config['password'], $config['options']);
            } catch (\PDOException $e) {
                echo $e->getMessage();
                logError($e);
            }
        }
        return self::$db;
    }
}