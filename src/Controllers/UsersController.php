<?php

namespace App\Controllers;

use App\DAO\UserDAO;
use App\Controllers\Controller;

class UsersController{
    private $template;

    public function __construct(){
        if(!UserDAO::getInstance()->isLogin()){
            header('Location:'.BASE_URL.'admin/login');exit;
        }
        $this->template = (new Controller())->getTemplate();
    }
    public function usersList(){
        echo $this->template->render('admin::usersList');
    }
}