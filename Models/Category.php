<?php

class Categorie {

    private $errors = [],
    $Id,
    $Categorie_name;
    
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
    public function setCategorie_name($Categorie_name){
        if(!is_string($Categorie_name) || empty($Categorie_name)){
            $this->errors[] = self::CATEGORIE_INVALID;
        }else{
            $this->Categorie_name = $Categorie_name;
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
    public function getCategorie_name(){
        return $this->Categorie_name;
    }
    public function getErrors(){
        return $this->errors;
    }

    public function isCategorieValid(){
        return !((empty($this->Categorie_name)));
    }
}

?>