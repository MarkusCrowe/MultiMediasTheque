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

        public function updateArticle($new){     
            if( isset( $_FILES["upload_avatar"])){
                $query = $this->bddPDO-> prepare("UPDATE Avatar SET Name=:Name, Link=:Link WHERE Id = :Id");
                if( isset( $_FILES["upload_avatar"])){
                    $new->setImage_1_name(uniqid());
                    $new->setImage_1_path("Assets/Images/Upload/" . $_FILES["upload_avatar"]["name"]);
                }
                $query -> execute([
                    "Name" => uniqid(),
                    "Link" => "Assets/Images/Upload/" . $_FILES["upload_avatar"]["name"],
                    "Id" => $_GET["Id"]
                ]);
                move_uploaded_file($_FILES["upload_1"]["tmp_name"], "Assets/Images/Upload/" . $_FILES["upload_avatar"]["name"]);
                return $new;
            }          
        }
    }



?>