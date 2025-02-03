<?php
require 'function.php';
class Dbconn
{
    private static PDO $db; //variabile usata solo con la classe, non genera oggetti

    public static function getDb(array $config):PDO{
        if(!isset(self::$db)) { //controllo se è già settata
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