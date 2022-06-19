<?php

class Chats{

    private $errors = [],
    $Id,
    $Chatroom_id,
    $Content,
    $Date,
    $Pseudo;

    const CHATROOM_INVALID = 1;
    const CONTENT_INVALID = 2;
    const DATE_INVALID = 3;
    const PSEUDO_INVALID = 4;

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
    public function setChatroom_id($Chatroom_id){
        if(!is_string($Chatroom_id) || empty($Chatroom_id)){
            $this->errors[] = self::CHATROOM_INVALID;
        }else{
            $this->Chatroom_id = $Chatroom_id;
        }
    }
    public function setContent($Content){
        if(!is_string($Content) || empty($Content)){
            $this->errors[] = self::CONTENT_INVALID;
        }else{
        $this->Content = $Content;
        }
    }
    public function setDate($Date){
        if(!is_string($Date) || empty($Date)){
            $this->errors[] = self::DATE_INVALID;
        }else{
        $this->Date = $Date;
        }
    }
    public function setPseudo($Pseudo){
        if(!is_string($Pseudo) || empty($Pseudo)){
            $this->errors[] = self::PSEUDO_INVALID;
        }else{
        $this->Pseudo = $Pseudo;
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
    public function getChatroom_id(){
        return $this->Chatroom_id;
    }
    public function getContent(){
        return $this->Content;
    }
    public function getDate(){
        return $this->Date;
    }
    public function getPseudo(){
        return $this->Pseudo;
    }
    public function getErrors(){
        return $this->errors;
    }
    public function isPostValid(){
        return !((empty($this->Content)));
    }
}
?>