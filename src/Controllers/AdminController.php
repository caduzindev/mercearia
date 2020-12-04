<?php

namespace App\Controllers;

use App\DAO\UserDAO;
use App\DAO\InfoDAO;
use App\Controllers\Controller;

class AdminController{
    private $template;

    public function __construct(){
        if(!UserDAO::getInstance()->isLogin()){
            header('Location:'.BASE_URL.'admin/login');exit;
        }
        $this->template = (new Controller())->getTemplate();
    }
    public function homeAdmin(){
        $getHomeInfo = UserDAO::getInstance()->getInfoHomeAdmin();
        echo $this->template->render('admin::home',compact('getHomeInfo'));  
    }
    public function editInfo(){
        if(isset($_POST) && !empty($_POST)){
            //Validação de campos
            $neigh = filter_input(INPUT_POST,"neigh",FILTER_SANITIZE_STRING);
            $street = filter_input(INPUT_POST,"street",FILTER_SANITIZE_STRING);
            $num = filter_input(INPUT_POST,"num",FILTER_SANITIZE_STRING);
            $tel = filter_input(INPUT_POST,"tel",FILTER_SANITIZE_STRING);
            $mission = filter_input(INPUT_POST,"mission",FILTER_SANITIZE_STRING);
            $value = filter_input(INPUT_POST,"value",FILTER_SANITIZE_STRING);
            $eyes = filter_input(INPUT_POST,"eyes",FILTER_SANITIZE_STRING);
            $instagram = filter_input(INPUT_POST,"instagram",FILTER_SANITIZE_STRING);
            $facebook = filter_input(INPUT_POST,"facebook",FILTER_SANITIZE_STRING);
            $whatsapp = filter_input(INPUT_POST,"whatsapp",FILTER_SANITIZE_STRING);
            $linkedin = filter_input(INPUT_POST,"linkedin",FILTER_SANITIZE_STRING);

            
            if(!empty($neigh) && !empty($street) && !empty($num) && !empty($tel) && !empty($mission) &&!empty($value) && !empty($eyes)){

                InfoDAO::saveInfo(array(
                    'neigh'=>$neigh,
                    'street'=>$street,
                    'num'=>$num,
                    'tel'=>$tel,
                    'mission'=>$mission,
                    'value'=>$value,
                    'eyes'=>$eyes,
                    'instagram'=>$instagram,
                    'facebook'=>$facebook,
                    'whatsapp'=>$whatsapp,
                    'linkedin'=>$linkedin
                ));

            }else{
                $_SESSION['error'] = "Algum campo vazio";
            }

        }
        $info = InfoDAO::getInstance()->getInfo();

        echo $this->template->render('admin::editInfo',compact('info'));
    }
}