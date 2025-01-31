<?php

class Dbconn
{
    private static PDO $db; //variabile usata solo con la classe, non genera oggetti

    public static function getDb(array $config):PDO{
        self::$db= new PDO($config['dns'], $config['username'], $config['password'], $config['options']);
        return self::$db;
    }
}