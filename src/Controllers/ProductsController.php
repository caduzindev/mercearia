<?php

namespace App\Controllers;

use App\DAO\UserDAO;
use App\Controllers\Controller;
use App\DAO\ProductDAO;

class ProductsController{
    private $template;

    public function __construct(){
        if(!UserDAO::getInstance()->isLogin()){
            header('Location:'.BASE_URL.'admin/login');exit;
        }
        $this->template = (new Controller())->getTemplate();
    }
    public function addProduct(){
        if(isset($_POST) && !empty($_POST)){
            $erro = array(); 
               
            $config['size'] = 200000;
            $config['width'] = 800;
            $config['height'] = 800;
            $config['extensions'] = array('image/jpg','image/png','image/jpeg');
            $config['minWidth'] = 300;
            $config['minHeight'] = 300;

            $file = isset($_FILES['photo'])?$_FILES['photo']:FALSE;
            $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
            $price = filter_input(INPUT_POST,'price',FILTER_SANITIZE_STRING);
            $featured = filter_input(INPUT_POST,'featured',FILTER_SANITIZE_STRING);
            $promotion = filter_input(INPUT_POST,'promotion',FILTER_SANITIZE_STRING);

            //Formatar preço
            $price = str_replace('.','',$price);
            $price = str_replace(',','.',$price);
            
            if(empty($name) || empty($price) || !$file){
                $erro[] = "Falta preencher alguns campos obrigatorios";
            }
            if(empty($featured) && empty($promotion)){
                $erro[] = "Por favor Informe se o produto está em promoção ou esta em destaque...";
            }
            if($file){
                if(!in_array($file['type'],$config['extensions'])){
                    $erro[] = "Arquivo em formato inválido! A imagem deve ser jpg, jpeg ou png. Envie outro arquivo";
                }
                else{
                    if($file['size']>$config['size']){
                        $erro[] = "Arquivo Muito grande, deve ter no maximo ".$config['size'];
                    }
                    $sizes = getimagesize($file['tmp_name']);

                    if($sizes[0]>$config['width']){
                        $erro[] = "Largura da imagem não deve ultrapassar " . $config["width"] . " pixels";
                    }

                    if($sizes[1]>$config['height']){
                        $erro[] = "Altura da imagem não deve ultrapassar " . $config["altura"] . " pixels";
                    }
                    if($sizes[0]<$config['minWidth']){
                        $erro[] = "Largura da imagem não deve ser menor que " . $config["minWidth"] . " pixels";
                    }

                    if($sizes[1]<$config['minHeight']){
                        $erro[] = "Altura da imagem não deve ser menor que " . $config["minHeight"] . " pixels";
                    }
                }
            }
            if(sizeof($erro)){
                $_SESSION['errors'] = $erro;
            }else{
                $image_name = md5(rand(0,99).time());
                $ext = explode('.',$file['name'])[1];

                move_uploaded_file($file['tmp_name'],BASE_PATH_PRODUCTS.$image_name.'.'.$ext);

                ProductDAO::saveProduct(array(
                    'name'=>$name,
                    'price'=>$price,
                    'image'=>$image_name.'.'.$ext,
                    'featured'=>$featured!='Y'?'N':'Y',
                    'promotions'=>$promotion!='Y'?'N':'Y'
                ));
            }
        }
        echo $this->template->render('admin::addProduct');
    }
    public function listProduct(){
        $filter = isset($_GET['filter'])?$_GET['filter']:'all';
        $products = ProductDAO::getInstance()->listProducts($filter);

        echo $this->template->render('admin::listProducts',compact('products'));
    }
    public function remove($data){
        $imageName = ProductDAO::getInstance()->deleteProduct($data['id']);
        $path = BASE_PATH_PRODUCTS.$imageName;

        if($imageName){
            unlink($path);
        }

        header('Location:'.BASE_URL.'admin/listProducts');
    }
}