<?php

namespace App\DAO;
use App\Models\Connection;
use App\Models\RegisterModel;

class RegisterDAO{
    
    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new RegisterDAO();

        return self::$instance;
    }

    public static function getRegisters(){
        $registers = array();
        $query = Connection::getInstance()->query('SELECT*FROM register');

        if($query->rowCount()>0){
            $datas = $query->fetchAll(\PDO::FETCH_ASSOC);

            foreach($datas as $data){
                $register = new RegisterModel;
                $register->setId($data['id']);
                $register->setName($data['name']);
                $register->setEmail($data['email']);
                $register->setTel($data['tel']);
                $register->setMessage($data['message']);

                $registers[] = $register;
            }
            return $registers;
        }
        return [];
    }
    public static function saveRegister(array $register){
        $sql = "INSERT INTO register SET name=:name,email=:email,tel=:tel,message=:message";
        $query = Connection::getInstance()->prepare($sql);

        $query->bindValue(':name',$register['name']);
        $query->bindValue(':email',$register['email']);
        $query->bindValue(':tel',$register['tel']);
        $query->bindValue(':message',$register['message']);

        $query->execute();
    }
}