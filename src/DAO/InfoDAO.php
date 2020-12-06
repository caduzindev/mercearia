<?php

namespace App\DAO;

use App\Models\InfoModel;
use App\Models\Connection;

class InfoDAO{
    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new InfoDAO();

        return self::$instance;
    }

    public function getInfo(){
        $sql = "SELECT*FROM info";
        $query = Connection::getInstance()->query($sql);

        if($query->rowCount()>0){
            $data = $query->fetch(\PDO::FETCH_ASSOC);

            $info = new InfoModel();
            $info->setId(intval($data['id']));
            $info->setStreet($data['street']);
            $info->setNeigh($data['neigh']);
            $info->setNum($data['num']);
            $info->setTel($data['tel']);
            $info->setMission($data['mission']);
            $info->setValue($data['value']);
            $info->setEyes($data['eyes']);
            $info->setInstagram($data['instagram']);
            $info->setFacebook($data['facebook']);
            $info->setWhatsapp($data['whatsapp']);
            $info->setLinkedin($data['linkedin']);

            return $info;
        }
        return new InfoModel;
    }
    public static function saveInfo(array $infos){
        $datas = array_filter($infos,function($value){
            return $value != null;
        });
        $query = Connection::getInstance();
        $values = array();
        $sql = 'INSERT INTO info SET';

        if(self::infoExists()){
            $data = $query->query('SELECT id FROM info')->fetch(\PDO::FETCH_ASSOC);

            $sql = "UPDATE info SET";

            foreach($datas as $name=>$value ){
                $sql .= ' '.$name.' = :'.$name.',';
                $values[':'.$name]=$value;
            }

            $values[':id']=intval($data['id']);

            $sql = substr($sql,0,-1).' ';
            $sql.='WHERE id = :id;';
            
            $update = $query->prepare($sql);
            $update->execute($values);

            return;

        }

        foreach($datas as $name=>$value ){
            $sql .= ' '.$name.' = :'.$name.',';
            $values[':'.$name]=$value;
        }

        $sql = substr($sql,0,-1).';';
        $insert = $query->prepare($sql);
        $insert->execute($values);

        return;

    }
    private static function infoExists(){
        $sql="SELECT * FROM info";
        $query = Connection::getInstance()->query($sql);

        if($query->rowCount()>0){
            return true;
        }
        return false;
    }
}