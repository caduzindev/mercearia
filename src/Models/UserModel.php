<?php

namespace App\Models;

class UserModel implements User{
    private $id;
    private $name;
    
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $name;
    }
}

interface User{
    public function getId();
    public function getName();
    public function setName($name);
    public function setId($id);
}