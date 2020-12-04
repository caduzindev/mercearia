<?php

namespace App\DAO;
use App\Models\Connection;
use App\Models\ProductModel;

class ProductDAO{
    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ProductDAO();

        return self::$instance;
    }

    public static function saveProduct(array $product):void{
        $sql = "INSERT INTO products SET name=:name,price=:price,image=:image,featured=:featured,promotions=:promotions";

        $query = Connection::getInstance()->prepare($sql);

        $query->bindValue(':name',$product['name']);
        $query->bindValue(':price',$product['price']);
        $query->bindValue(':image',$product['image']);
        $query->bindValue(':featured',$product['featured']);
        $query->bindValue(':promotions',$product['promotions']);

        $query->execute();
    }
    public function listProducts($filter){
        $products = array();
        
        switch($filter){
            case 'all':
                $sql = "SELECT * FROM products";
                break;
            case 'promotions':
                $sql = "SELECT * FROM products WHERE promotions='Y'";
                break;
            case 'featured':
                $sql = "SELECT * FROM products WHERE featured='Y'";
                break;
        }

        $query = Connection::getInstance()->query($sql);

        if($query->rowCount()>0){
            $datas = $query->fetchAll(\PDO::FETCH_ASSOC);

            foreach($datas as $data){ 
                $product = new ProductModel;
                $product->setId($data['id']);
                $product->setName($data['name']);
                $product->setPrice($data['price']);
                $product->setImage($data['image']);
                $product->setFeatured($data['featured']);
                $product->setPromotion($data['promotions']);

                $products[] = $product;
            }
            return $products;
        }
        return [];
    }
    public static function deleteProduct($id){
        $sql = "CALL del_product(".intval($id).",@imageName);";
        $query = Connection::getInstance()->query($sql);

        if($query->rowCount()>0){
            $data = $query->fetch(\PDO::FETCH_ASSOC);
            return $data['imageName'];
        }
        return false;
    }   
    public function getFeatureds(){
        $products = array();
        $sql = "SELECT * FROM products WHERE featured='Y'";
        $query = Connection::getInstance()->query($sql);

        if($query->rowCount()>0){
            $datas = $query->fetchAll(\PDO::FETCH_ASSOC);

            foreach($datas as $data){
                $product = new ProductModel; 
                $product->setId($data['id']);
                $product->setName($data['name']);
                $product->setPrice($data['price']);
                $product->setImage($data['image']);
                $product->setFeatured($data['featured']);
                $product->setPromotion($data['promotions']);

                $products[] = $product;
            }
            return $products;
        }
        return [];
    }
    public function getPromotions(){
        $products = array();
        $sql = "SELECT * FROM products WHERE promotions='Y'";
        $query = Connection::getInstance()->query($sql);

        if($query->rowCount()>0){
            $datas = $query->fetchAll(\PDO::FETCH_ASSOC);

            foreach($datas as $data){
                $product = new ProductModel; 
                $product->setId($data['id']);
                $product->setName($data['name']);
                $product->setPrice($data['price']);
                $product->setImage($data['image']);
                $product->setFeatured($data['featured']);
                $product->setPromotion($data['promotions']);

                $products[] = $product;
            }
            return $products;
        }
        return [];
    }
}