<?php

class Dbconnection
{
    private static Pdo $db;

    public static function getDb(array $config):Pdo{
        self::$db = new Pdo($config['dns'], $config['username'], $config['password'], $config['options']);
        return self::$db;
    }
}