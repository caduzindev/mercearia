<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\DAO\UserDAO;

class LoginController{
    private $template;

    public function __construct(){
        $this->template = (new Controller())->getTemplate();
    }
    
    public function login(){
        echo $this->template->render('admin::login');
    }
    public function verifyLogin(){
        header('Content-Type:application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Credentials: true');

        if(!empty($_POST['user']) && !empty($_POST['password'])){
            $userDAO = UserDAO::getInstance();
             
            $user = filter_input(INPUT_POST,"user",FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);

            $data = $userDAO->verifyCredentials($user,$password);

            if($data){
                $_SESSION['logged'] = $data;

                echo json_encode(array(
                    'error'=>false,
                ));exit;
            }
            
            echo json_encode(array(
                'error'=>true,
                'message'=>'Credenciais Invalidas'
            ));exit;
        }
    }
    public function logout(){
        unset($_SESSION['logged']);
        header('Location:'.BASE_URL.'admin');exit;
    }
}