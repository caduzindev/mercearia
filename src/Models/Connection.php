<?php

namespace App\Models;

class Connection{
    public static $instance;

    public function __construct(){}

    public static function getInstance(){
        if(!isset(self::$instance)){
            //instancia do banco de dados
            self::$instance = new \PDO(DATABASE['driver'].':'.'host='.DATABASE['host'].';'.'dbname='.DATABASE['dbname'],DATABASE['user'],DATABASE['password']);

            self::$instance->setAttribute(\PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION);

            self::$instance->setAttribute(\PDO::ATTR_ORACLE_NULLS,
            \PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }
}