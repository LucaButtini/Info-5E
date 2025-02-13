<?php

class DBConnection
{
    private static PDO $db;

    public static function getDb(array $config):PDO{
        if(!isset(self::$db)) {
            try{
                self::$db = new PDO($config['dns'], $config['username'], $config['password'], $config['options']);
            }catch (PDOException $e){
                echo $e->getMessage();
                logError($e);
            }
        }
        return self::$db;
    }
}