<?php

namespace App\DAO;
use App\Models\UserModel;
use App\Models\Connection;

class UserDAO{
    
    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new UserDAO();

        return self::$instance;
    }

    public function isLogin(){
        if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
            return true;
        }
        return false;
    }

    public function verifyCredentials($user,$password){
        $sql = "SELECT * FROM users WHERE name=:user AND password=:password";
        $query = Connection::getInstance()->prepare($sql);


        $query->bindValue(':user',$user);
        $query->bindValue(':password',md5($password));
        $query->execute();

        if($query->rowCount()>0){
            $data = $query->fetch();

            $user = new UserModel;
            $user->setId($data['id']);
            $user->setName($data['name']);
            
            return $user;
        }

        return false;
    }
    public function getInfoHomeAdmin(){
        $sql = "CALL count_register_home(@qtRegister,@qtPromotions,@qtFeatureds,@qtProducts);";

        $query = Connection::getInstance()->query($sql)->closeCursor();

        $r = Connection::getInstance()->query('SELECT @qtRegister,@qtPromotions,@qtFeatureds,@qtProducts');

        if($r){
            return $r->fetch(\PDO::FETCH_ASSOC);
        }
        return [];
    }
}