<?php

class Avatar {

    private $errors = [],
    $Id,
    $Name,
    $Link,
    $Id_User;
    
    const CATEGORIE_INVALID = 1;
   
    public function __construct($data = []){
        $this->hydrater($data);
    }

    public function hydrater($data){
        foreach ($data as $attribut => $value){
            $settersMethod ="set".ucfirst($attribut);
            $this->$settersMethod($value);
        }
    }
 ///////////////////////////////////   
 //////////////SETTER///////////////   
 /////////////////////////////////// 
    public function setId($Id){
        $this->Id = (int) $Id;
    }
    public function setName($Name){
        $this->Name = $Name;
    }
    public function setLink($Link){
        $this->Link = $Link;
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
    public function getName(){
        return $this->Name;
    }
    public function getLink(){
        return $this->Link;
    }
    public function getId_User(){
        return $this->Id_User;
    }
    public function getErrors(){
        return $this->errors;
    }
}
?>