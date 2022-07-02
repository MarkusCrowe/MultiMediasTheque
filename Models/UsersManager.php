<?php
    class UsersManager{
        private $bddPDO;

        public function __construct(PDO $bddPDO) {
            $this->bddPDO = $bddPDO;
        }

        public function insert(Users $User) {
            $query = $this->bddPDO->prepare("INSERT INTO Users(Firstname, Lastname, Pseudo, Password, Email, Phone, Biographie) VALUES (:Firstname, :Lastname, :Pseudo, :Password, :Email, :Phone, :Biographie)");

            $query->bindValue(":Firstname", $User->getFirstname());
            $query->bindValue(":Lastname", $User->getLastname());
            $query->bindValue(":Pseudo", $User->getPseudo());
            $query->bindValue(":Password", $User->getPassword());
            $query->bindValue(":Email", $User->getEmail());
            $query->bindValue(":Phone", $User->getPhone());
            $query->bindValue(":Biographie", $User->getBiographie());

            $query->execute();
        }

        public function selectAll(){
            $query = $this->bddPDO->query("SELECT * FROM Users");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Users" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }

        public function selectOneUser($Id){
            $query = $this->bddPDO->prepare("SELECT * FROM Users WHERE Id = :Id");
            $query -> bindValue(":Id", (int) $Id);
            $query-> execute();
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Users" );
            $select = $query->fetch();
            $query -> closeCursor();
            return $select;
        } 
    
        public function updateUser($user){
        
            if( isset( $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["phone"], $_POST["biographie"])){
                $query = $this->bddPDO-> prepare("UPDATE Users SET Firstname=:firstname, Lastname=:lastname, Email=:email, Phone=:phone, Biographie=:biographie WHERE Id = :id");
                if( isset( $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["phone"], $_POST["biographie"])){
                    $user->setFirstname($_POST["firstname"]);
                    $user->setLastname($_POST["lastname"]);
                    $user->setEmail($_POST["email"]);
                    $user->setPhone($_POST["phone"]);
                    $user->setBiographie($_POST["biographie"]);
                }
                $query -> execute([
                    "firstname" => $_POST["firstname"],
                    "lastname" => $_POST["lastname"],
                    "email" => $_POST["email"],
                    "phone" => $_POST["phone"],
                    "biographie" => $_POST["biographie"],
                    "id" => $_SESSION["CurrentUser"]["Id"]
                ]);
                return $user;
            }
        }

        public function existingPassword($Pseudo){
            $query = $this->bddPDO-> prepare("SELECT Password FROM Users WHERE Pseudo = :Pseudo");
            $query -> bindValue(":Pseudo", $Pseudo);

            $query-> execute();
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Users" );
            $existPass = $query->fetch();
            $query -> closeCursor();
            return $existPass;
        }

        public function selectPseudo($Pseudo){
            $query = $this->bddPDO->prepare("SELECT * FROM Users WHERE Pseudo = :Pseudo");
            $query -> bindValue(":Pseudo", $Pseudo);
            $query-> execute();
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Users" );
            $selectPseudo = $query->fetch();
            $query -> closeCursor();
            return $selectPseudo;
        } 
    }
?>