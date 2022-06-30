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


        public function verifImage($Images, $ImagesExtensions) {

            $tab_validator = [];
            $errors = [];
            $ImagesExtensions = [
                'png'   => 'image/png',
                'jpe'   => 'image/jpeg',
                'jpeg'  => 'image/jpeg',
                'jpg'   => 'image/jpeg',
                'gif'   => 'image/gif',
                'bmp'   => 'image/bmp',
                'ico'   => 'image/vnd.microsoft.icon',
                'tiff'  => 'image/tiff',
                'tif'   => 'image/tiff',
                'svg'   => 'image/svg+xml',
                'svgz'  => 'image/svg+xml',
            ];
    
            foreach($Images as $image) {
    
                $tab_validator[$image] = false;
    
                if(isset($_FILES[$image]) && !empty($_FILES[$image]['name'])) {
                    if ($_FILES[$image]["error"] === UPLOAD_ERR_OK) {
                        $tmpName = $_FILES[$image]["tmp_name"];
                        // On récupère l'extension du fichier pour vérifier si elle est dans "$fileExtensions"
                        $tmpNameArray = explode(".", $_FILES[$image]["name"]);
                        $tmpExt = end($tmpNameArray);
                        if(in_array(strtolower($tmpExt), $ImagesExtensions)) {
                            // Détecte le type de contenu d'un fichier.
                            // On vérifie le contenu de fichier, pour voir s'il appartient aux MIMES autorisés.
                            if(mime_content_type($tmpName) != $this->mimes[$tmpExt]) {
                                // Risque d'attaque : Le contenu du ficher qui ne correspond pas à son extension
                                $errors[] = "Une erreur a eu lieu au moment du téléchargement du fichier !";
                            } else {
                                $tab_validator[$image] = true;
                            }
                        } else {
                            $errors[] = "Ce type de fichier n'est pas autorisé !";
                        }
                    } else if($_FILES[$image]["error"] == UPLOAD_ERR_INI_SIZE || $_FILES[$image]["error"] == UPLOAD_ERR_FORM_SIZE) {
                        //fichier trop volumineux
                        $errors[] = "Le fichier est trop volumineux";
                    } else {
                        $errors[] = "Une erreur a eu lieu au moment du téléchargement du fichier !";
                    }
                }
            }
            return $tab_validator;
        }
    }
?>