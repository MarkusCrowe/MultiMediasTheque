<?php

class News
 {

    private $errors = [],
    $Id,
    $Title,
    $Introduction,
    $Conclusion,
    $Paragraphe_1,
    $Paragraphe_2,
    $Paragraphe_3,
    $Image_1_name,
    $Image_2_name,
    $Image_3_name,
    $Image_1_path,
    $Image_2_path,
    $Image_3_path,
    $Id_User;
       
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
    public function setIntroduction($Introduction){
        $this->Introduction = $Introduction;
    }
    public function setConclusion($Conclusion){
        $this->Conclusion = $Conclusion;
    }
    public function setParagraphe_1($Paragraphe_1){
        $this->Paragraphe_1 = $Paragraphe_1;
    }
    public function setParagraphe_2($Paragraphe_2){
        $this->Paragraphe_2 = $Paragraphe_2;
    }
    public function setParagraphe_3($Paragraphe_3){
        $this->Paragraphe_3 = $Paragraphe_3;
    }
    public function setImage_1_name($Image_1_name){
        $this->Image_1_name = $Image_1_name;
    }
    public function setImage_2_name($Image_2_name){
        $this->Image_2_name = $Image_2_name;
    }
    public function setImage_3_name($Image_3_name){
        $this->Image_3_name = $Image_3_name;
    }
    public function setImage_1_path($Image_1_path){
        $this->Image_1_path = $Image_1_path;
    }
    public function setImage_2_path($Image_2_path){
        $this->Image_2_path = $Image_2_path;
    }
    public function setImage_3_path($Image_3_path){
        $this->Image_3_path = $Image_3_path;
    }
    public function setId_User($Id_User){
        $this->Id_User = $Id_User;
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
    public function getIntroduction(){
        return $this->Introduction;
    }
    public function getConclusion(){
        return $this->Conclusion;
    }
    public function getParagraphe_1(){
        return $this->Paragraphe_1;
    }
    public function getParagraphe_2(){
        return $this->Paragraphe_2;
    }
    public function getParagraphe_3(){
        return $this->Paragraphe_3;
    }
    public function getImage_1_name(){
        return $this->Image_1_name;
    }
    public function getImage_2_name(){
        return $this->Image_2_name;
    }
    public function getImage_3_name(){
        return $this->Image_3_name;
    }
    public function getImage_1_path(){
        return $this->Image_1_path;
    }
    public function getImage_2_path(){
        return $this->Image_2_path;
    }
    public function getImage_3_path(){
        return $this->Image_3_path;
    }
    public function getId_User(){
        return $this->Id_User;
    }
    public function getErrors(){
        return $this->errors;
    }
}
?>