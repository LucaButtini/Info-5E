<?php

namespace Config;


use PDO;

class DBConn
{
    private static Pdo $db;

    public static function getConn($config):PDO{
        if(!isset(self::$db)){
            self::$db=new PDO($config['dns'], $config['user'], $config['password'], $config['options']);
        }else{
            echo 'errore';
        }
        return self::$db;
    }
}