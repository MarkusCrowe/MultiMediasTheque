<?php

class Chatroom{

    private $errors = [],
    $Id,
    $Chatroom_name,
    $Categorie_id;

    const CHATROOM_INVALID = 1;
    const CATEGORIEID_INVALID = 2;

    public function __construct($data=[]){
        $this->hydrater($data);
    }
    public function hydrater($data){
        foreach($data as $attribut => $value){
            $settersMethod="set".ucfirst($attribut);
            $this->$settersMethod($value);
        }
    }
 ///////////////////////////////////   
 //////////////SETTER///////////////   
 /////////////////////////////////// 
    public function setId($Id){
        $this->Id=(int) $Id;
    }
    public function setChatroom_name($Chatroom_name){
        if(!is_string($Chatroom_name) || empty($Chatroom_name)){
            $this->errors[] = self::CHATROOM_INVALID;
        }else{
            $this->Chatroom_name = $Chatroom_name;
        }
    }
    public function setCategorie_id($Categorie_id){
        if(!is_string($Categorie_id) || empty($Categorie_id)){
            $this->errors[] = self::CATEGORIEID_INVALID;
        }else{
        $this->Categorie_id = $Categorie_id;
        }
    }
    public function setErrors($errors){
        $this->errors = $errors;
    }
 ///////////////////////////////////   
 //////////////GETTER///////////////   
 ///////////////////////////////////
    public function getId(){
        return $this->Id;
    }   
    public function getChatroom_name(){
        return $this->Chatroom_name;
    }
    public function getCategorie_id(){
        return $this->Categorie_id;
    }
    public function getErrors(){
        return $this->errors;
    }
    public function isChatroomValid(){
        return !((empty($this->Chatroom_name)));
    }
}
?>