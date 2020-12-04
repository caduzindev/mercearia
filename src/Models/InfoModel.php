<?php

namespace App\Models;

class InfoModel implements Info{
    private int $id;
    private string $street = '';
    private string $neigh = '';
    private string $num = '';
    private string $tel = '';
    private string $mission = '';
    private string $value = '';
    private string $eyes = '';
    private ?string $instagram = '';
    private ?string $facebook= '';
    private ?string $whatsapp= '';
    private ?string $linkedin= '';

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setStreet($street){
        $this->street = $street;
    }
    public function getStreet(){
        return $this->street;
    }
    public function setNeigh($neigh){
        $this->neigh=$neigh;
    }
    public function getNeigh(){
        return $this->neigh;
    }
    public function setNum($num){
        $this->num = $num;
    }
    public function getNum(){
        return $this->num;
    }
    public function setTel($tel){
        $this->tel = $tel;
    }
    public function getTel(){
        return $this->tel;
    }
    public function setMission($mission){
        $this->mission = $mission;
    }
    public function getMission(){
        return $this->mission;
    }
    public function setValue($value){
        $this->value = $value;
    }
    public function getValue(){
        return $this->value;
    }
    public function setEyes($eyes){
        $this->eyes= $eyes;
    }
    public function getEyes(){
        return $this->eyes;
    }
    public function setInstagram($instagram){
        $this->instagram = $instagram;
    }
    public function getInstagram(){
        return $this->instagram;
    }
    public function setFacebook($facebook){
        $this->facebook = $facebook;
    }
    public function getFacebook(){
        return $this->facebook;
    }
    public function setWhatsapp($whatsapp){
        $this->whatsapp = $whatsapp;
    }
    public function getWhatsapp(){
        return $this->whatsapp;
    }
    public function setLinkedin($linkedin){
        $this->linkedin = $linkedin;
    }
    public function getLinkedin(){
        return $this->linkedin;
    }
}

interface Info{
    public function setId($id);
    public function getId();
    public function setStreet($street);
    public function getStreet();
    public function setNum($num);
    public function getNum();
    public function setTel($tel);
    public function getTel();
    public function setMission($mission);
    public function getMission();
    public function setValue($value);
    public function getValue();
    public function setEyes($eyes);
    public function getEyes();
    public function setInstagram($instagram);
    public function getInstagram();
    public function setFacebook($facebook);
    public function getFacebook();
    public function setWhatsapp($whatsapp);
    public function getWhatsapp();
    public function setLinkedin($linkedin);
    public function getLinkedin();
}