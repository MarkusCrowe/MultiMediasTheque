<?php
    class Users {
        private $errors = [],
        $Id,
        $Firstname,
        $Lastname,
        $Pseudo,
        $Password,
        $Email,
        $Phone,
        $Biographie = "";

        const FIRSTNAME_INVALID = 1;
        const LASTNAME_INVALID = 2;
        const PSEUDO_INVALID = 3;
        const PASSWORD_INVALID = 4;
        const EMAIL_INVALID = 5;

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
        public function setLastname($Lastname){
            if(!is_string($Lastname) || empty($Lastname)){
                $this->errors[] = self::LASTNAME_INVALID;
            }else{
                $this->Lastname = $Lastname;
            }
        }
        public function setFirstname($Firstname){
            if(!is_string($Firstname) || empty($Firstname)){
                $this->errors[] = self::FIRSTNAME_INVALID;
            }else{
                $this->Firstname = $Firstname;
            }
        }
        public function setPseudo($Pseudo){
            if(!is_string($Pseudo) || empty($Pseudo)){
                $this->errors[] = self::PSEUDO_INVALID;
            }else{
                $this->Pseudo = $Pseudo;
            }
        }
        public function setPassword($Password){
            if(!is_string($Password) || empty($Password)){
                $this->errors[] = self::PASSWORD_INVALID;
            }else{
                $this->Password = $Password;
            }
        }
        public function setEmail($Email){
            if(filter_var($Email, FILTER_VALIDATE_EMAIL)){
                $this->Email = $Email;
            }else{
                $this->errors[] = self::EMAIL_INVALID;
            }    
        }
        public function setPhone($Phone){
            $this->Phone = (int) $Phone;
        }
        public function setBiographie($Biographie){
            $this->Biographie = $Biographie;
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
        public function getLastname(){
            return $this->Lastname;
        }
        public function getFirstname(){
            return $this->Firstname;
        }
        public function getPseudo(){
            return $this->Pseudo;
        }
        public function getPassword(){
            return $this->Password;
        }
        public function getEmail(){
            return $this->Email;
        }
        public function getPhone(){
            return $this->Phone;
        }
        public function getBiographie(){
            return $this->Biographie;
        }
        public function getErrors(){
            return $this->errors;
        }

        public function isUserValid(){
            return !((empty($this->Firstname)) ||(empty($this->Lastname)) || (empty($this->Email)) || (empty($this->Pseudo)) || (empty($this->Password)));
        }
    }
?>