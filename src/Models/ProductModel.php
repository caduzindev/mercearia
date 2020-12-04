<?php

namespace App\Models;

class ProductModel{
    private int $id;
    private string $name;
    private float $price;
    private string $image;
    private string $featured;
    private string $promotion;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getPrice(){
        return $this->price;
    }
    
    public function setPrice($price){
        $this->price = $price;
    }

    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }

    public function getFeatured(){
        return $this->featured;
    }
    public function setFeatured($featured){
        $this->featured = $featured;
    }

    public function getPromotion(){
        return $this->promotion;
    }
    public function setPromotion($promotion){
        $this->promotion = $promotion;
    }
}