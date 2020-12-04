<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\DAO\ProductDAO; 
use App\DAO\InfoDAO;
use App\DAO\RegisterDAO;

class HomeController extends Controller{
    private $template;

    public function __construct(){
        $this->template = (new Controller())->getTemplate();
    }
     
    public function index(){
        $productsFeatured = ProductDAO::getInstance()->getFeatureds();
        $info = InfoDAO::getInstance()->getInfo();
        echo $this->template->render("views::welcome",compact('productsFeatured','info'));
    }
    public function registerUsers(){
        header('Content-Type:application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Credentials: true');

        if(!empty($_POST['name']) && !empty($_POST['email'] && !empty($_POST['tel'])) && !empty($_POST['message'])){
            $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
            $tel = filter_input(INPUT_POST,'tel',FILTER_SANITIZE_STRING);
            $message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_STRING);

            RegisterDAO::getInstance()->saveRegister(array(
                'name'=>$name,
                'email'=>$email,
                'tel'=>$tel,
                'message'=>$message
            ));

            echo json_encode(array(
                'error'=>false
            ));
        }
    }
    public function promotions(){
        $productsPromotions = ProductDAO::getInstance()->getPromotions();
        echo $this->template->render('views::promotions',compact('productsPromotions'));
    }
}