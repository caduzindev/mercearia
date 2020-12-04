<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\DAO\UserDAO;
use App\DAO\RegisterDAO;

class RegisterController{
    private $template;

    public function __construct(){
        if(!UserDAO::getInstance()->isLogin()){
            header('Location:'.BASE_URL.'admin/login');exit;
        }
        $this->template = (new Controller())->getTemplate();
    }
    public function usersList(){
        $registers = RegisterDAO::getRegisters();

        echo $this->template->render('admin::usersList',compact('registers'));
    }
}