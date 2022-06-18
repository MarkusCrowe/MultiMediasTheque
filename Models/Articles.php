<?php

class Articles
 {

    private $errors = [],
    $Id,
    $Title,
    $Image_name,
    $Image_path,
    $Resume;
       
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
    public function setTitle($Title){
        $this->Title = $Title;
    }
    public function setImage_name($Image_name){
        $this->Image_name = $Image_name;
    }
    public function setImage_path($Image_path){
        $this->Image_path = $Image_path;
    }
    public function setResume($Resume){
        $this->Resume = $Resume;
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
    public function getTitle(){
        return $this->Title;
    }
    public function getImage_name(){
        return $this->Image_name;
    }
    public function getImage_path(){
        return $this->Image_path;
    }
    public function getResume(){
        return $this->Resume;
    }
    public function getErrors(){
        return $this->errors;
    }
}
?>