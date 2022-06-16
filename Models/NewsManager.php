<?php
    class NewsManager{
        private $bddPDO;

        public function __construct(PDO $bddPDO) {
            $this->bddPDO = $bddPDO;
        }

        public function selectAllNews(){
            $query = $this->bddPDO->query("SELECT * FROM News ORDER BY Id DESC");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "News" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }

        public function selectSixNews(){
            $query = $this->bddPDO->query("SELECT * FROM News ORDER BY Id DESC LIMIT 6");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "News" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }
        
        public function selectEightNews(){
            $query = $this->bddPDO->query("SELECT * FROM News ORDER BY Id DESC LIMIT 8");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "News" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }
        
        public function selectOneNews($Id){
            $query = $this->bddPDO->prepare("SELECT * FROM News WHERE Id = :Id");
            $query -> bindValue(":Id", (int) $Id);
            $query-> execute();
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "News" );
            $select = $query->fetch();
            $query -> closeCursor();
            return $select;
        }

        public function updateNews($new){     
            if( isset( $_POST["Titre_article"], $_POST["introduction"], $_POST["conclusion"], $_POST["paragraphe_1"], $_POST["paragraphe_2"], $_POST["paragraphe_3"])){
                $query = $this->bddPDO-> prepare("UPDATE News SET Title=:Title, Introduction=:Introduction, Conclusion=:Conclusion, Paragraphe_1=:Paragraphe_1, Paragraphe_2=:Paragraphe_2, Paragraphe_3=:Paragraphe_3, Image_1_name=:Image_1_name, Image_2_name=:Image_2_name, Image_3_name=:Image_3_name, Image_1_path=:Image_1_path, Image_2_path=:Image_2_path, Image_3_path=:Image_3_path WHERE Id = :Id");
                if( isset( $_POST["Titre_article"], $_POST["introduction"], $_POST["conclusion"], $_POST["paragraphe_1"], $_POST["paragraphe_2"], $_POST["paragraphe_3"])){
                    $new->setTitle($_POST["Titre_article"]);
                    $new->setIntroduction($_POST["introduction"]);
                    $new->setConclusion($_POST["conclusion"]);
                    $new->setParagraphe_1($_POST["paragraphe_1"]);
                    $new->setParagraphe_2($_POST["paragraphe_2"]);
                    $new->setParagraphe_3($_POST["paragraphe_3"]);
                    $new->setImage_1_name(uniqid());
                    $new->setImage_2_name(uniqid());
                    $new->setImage_3_name(uniqid());
                    $new->setImage_1_path("Assets/Images/Upload/" . $_FILES["upload_1"]["name"]);
                    $new->setImage_2_path("Assets/Images/Upload/" . $_FILES["upload_2"]["name"]);
                    $new->setImage_3_path("Assets/Images/Upload/" . $_FILES["upload_3"]["name"]);
                }
                $query -> execute([
                    "Title" => $_POST["Titre_article"],
                    "Introduction" => $_POST["introduction"],
                    "Conclusion" => $_POST["conclusion"],
                    "Paragraphe_1" => $_POST["paragraphe_1"],
                    "Paragraphe_2" => $_POST["paragraphe_2"],
                    "Paragraphe_3" => $_POST["paragraphe_3"],
                    "Image_1_name" => uniqid(),
                    "Image_2_name" => uniqid(),
                    "Image_3_name" => uniqid(),
                    "Image_1_path" => "Assets/Images/Upload/" . $_FILES["upload_1"]["name"],
                    "Image_2_path" => "Assets/Images/Upload/" . $_FILES["upload_2"]["name"],
                    "Image_3_path" => "Assets/Images/Upload/" . $_FILES["upload_3"]["name"],
                    "Id" => $_GET["Id"]
                ]);
                move_uploaded_file($_FILES["upload_1"]["tmp_name"], "Assets/Images/Upload/" . $_FILES["upload_1"]["name"]);
                move_uploaded_file($_FILES["upload_2"]["tmp_name"], "Assets/Images/Upload/" . $_FILES["upload_2"]["name"]);
                move_uploaded_file($_FILES["upload_3"]["tmp_name"], "Assets/Images/Upload/" . $_FILES["upload_3"]["name"]);
                return $new;
            }          
        }

        public function deleteNew($Id){
        $query = $this->bddPDO-> prepare("DELETE FROM News WHERE Id = :Id");
        $query->execute([
            "Id" => $Id
        ]);
        }
    }
?>