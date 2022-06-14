<?php

    class AvatarManager{
        private $bddPDO;

        public function __construct(PDO $bddPDO) {
            $this->bddPDO = $bddPDO;
        }


        public function selectAllAvatar(){
            $query = $this->bddPDO->query("SELECT * FROM Avatar");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Article" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }

        public function selectOneAvatar($Id){
            $query = $this->bddPDO->prepare("SELECT * FROM Avatar WHERE Id = :Id");
            $query -> bindValue(":Id", (int) $Id);
            $query-> execute();
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Avatar" );
            $select = $query->fetch();
            $query -> closeCursor();
            return $select;
        }
        public function selectAvatar($Id){
            $query = $this->bddPDO->prepare("SELECT * FROM Avatar WHERE Id = :Id");
            $query -> bindValue(":Id", (int) $Id);
            $query-> execute();
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Avatar" );
            $select = $query->fetch();
            $query -> closeCursor();
            return $select;
        }

        public function updateAvatar($newAvatar){
                $query = $this->bddPDO-> prepare("UPDATE Avatar SET Name=:Name, Link=:Link WHERE Id = :Id");
                if( isset( $_POST["upload_avatar"])){
                    $newAvatar->setLink($_POST["upload_avatar"]);
                }
                $query -> execute([
                    "upload_avatar" => $_POST["upload_avatar"],
                    "id" => $_SESSION["CurrentUser"]["Id"]
                ]);
                return $newAvatar;  
        }
    }



?>