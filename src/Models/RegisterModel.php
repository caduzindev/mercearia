<?php

namespace App\Models;

class RegisterModel implements Register{
    private int $id;
    private string $name;
    private string $email;
    private string $tel;
    private string $message;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name=$name;
    }

    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email=$email;
    }

    public function getTel(){
        return $this->tel;
    }
    
    public function setTel($tel){
        $this->tel=$tel;
    }

    public function getMessage(){
        return $this->message;
    }
    
    public function setMessage($message){
        $this->message=$message;
    }
}

interface Register{
    public function getId();
    public function setId($id);
    public function getName();
    public function setName($name);
    public function getEmail();
    public function setEmail($email);
    public function getTel();
    public function setTel($tel);
    public function getMessage();
    public function setMessage($message);
}