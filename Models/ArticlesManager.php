<?php
    class ArticlesManager{
        private $bddPDO;

        public function __construct(PDO $bddPDO) {
            $this->bddPDO = $bddPDO;
        }

        public function selectAllArticles(){
            $query = $this->bddPDO->query("SELECT * FROM Articles ORDER BY Id DESC");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Articles" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }

        public function selectFiveArticles(){
            $query = $this->bddPDO->query("SELECT * FROM Articles ORDER BY Id DESC LIMIT 5");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Articles" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }
        
        public function selectEightArticles(){
            $query = $this->bddPDO->query("SELECT * FROM Articles ORDER BY Id DESC LIMIT 8");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Articles" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }
        
        public function selectOneArticles($Id){
            $query = $this->bddPDO->prepare("SELECT * FROM Articles WHERE Id = :Id");
            $query -> bindValue(":Id", (int) $Id);
            $query-> execute();
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Articles" );
            $select = $query->fetch();
            $query -> closeCursor();
            return $select;
        }

        public function updateArticle($new){     
            if( isset( $_POST["title"], $_POST["resume"])){

                $extentions = ["jpg", "png", "jpeg", "gif"];
                $mimes = [
                    'png'   => 'image/png',
                    'jpeg'  => 'image/jpeg',
                    'jpg'   => 'image/jpeg',
                    'gif'   => 'image/gif',
                ];

                $tmpName = $_FILES["upload"]["tmp_name"];
                $tmpNameArray = explode(".", $_FILES["upload"]["name"]);
                $tmpExt = end($tmpNameArray);
                if(in_array(strtolower($tmpExt), $extentions)) {
                    // Détecte le type de contenu d'un fichier.
                    // On vérifie le contenu de fichier, pour voir s'il appartient aux MIMES autorisés.
                    if(mime_content_type($tmpName) != $mimes[$tmpExt]) {
                        // Risque d'attaque : Le contenu du ficher qui ne correspond pas à son extension
                        echo "<p class='error'>Ce n'est pas une Image!</p>";
                        die;
                    }else{
                        $query = $this->bddPDO-> prepare("UPDATE Articles SET Title=:Title, Resume=:Resume, Image_name=:Image_name, Image_path=:Image_path WHERE Id = :Id");
                        if( isset( $_POST["title"], $_POST["resume"])){
                            $new->setTitle($_POST["title"]);
                            $new->setResume($_POST["resume"]);
                            $new->setImage_name(uniqid());
                            $new->setImage_path("Assets/Images/Upload/" . $_FILES["upload"]["name"]);
                        }
                        $query -> execute([
                            "Title" => $_POST["title"],
                            "Resume" => $_POST["resume"],
                            "Image_name" => uniqid(),
                            "Image_path" => "Assets/Images/Upload/" . $_FILES["upload"]["name"],
                            "Id" => $_GET["Id"]
                        ]);
                        move_uploaded_file($_FILES["upload"]["tmp_name"], "Assets/Images/Upload/" . $_FILES["upload"]["name"]);
                        return $new;
                    }
                }else{
                    echo "<p class='error'>Ce n'est pas une Image!</p>";
                    die;
                }
            }          
        }

        public function deleteArticle($Id){
        $query = $this->bddPDO-> prepare("DELETE FROM Articles WHERE Id = :Id");
        $query->execute([
            "Id" => $Id
        ]);
        }
    }
?>