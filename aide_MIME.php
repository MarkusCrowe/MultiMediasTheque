<?php
//  $integrityOfImages = $manager->verifImageIntegrity(['avatar', 'avatar2], ['jpg', 'jpeg', 'gif', 'png']);
//     // Méthode permettant de vérifier l'intégrité des fichiers uploadés
    public function verifImageIntegrity($files, $fileExtensions) {

        $tab_validator = [];
        $errors = [];

        foreach($files as $file) {

            $tab_validator[$file] = false;

            if(isset($_FILES[$file]) && !empty($_FILES[$file]['name'])) {
                if ($_FILES[$file]["error"] === UPLOAD_ERR_OK) {
                    $tmpName = $_FILES[$file]["tmp_name"];
                    // On récupère l'extension du fichier pour vérifier si elle est dans "$fileExtensions"
                    $tmpNameArray = explode(".", $_FILES[$file]["name"]);
                    $tmpExt = end($tmpNameArray);
                    if(in_array(strtolower($tmpExt), $fileExtensions)) {
                        // Détecte le type de contenu d'un fichier.
                        // On vérifie le contenu de fichier, pour voir s'il appartient aux MIMES autorisés.
                        if(mime_content_type($tmpName) != $this->mimes[$tmpExt]) {
                            // Risque d'attaque : Le contenu du ficher qui ne correspond pas à son extension
                            $errors[] = "Une erreur a eu lieu au moment du téléchargement du fichier !";
                        } else {
                            $tab_validator[$file] = true;
                        }
                    } else {
                        $errors[] = "Ce type de fichier n'est pas autorisé !";
                    }
                } else if($_FILES[$file]["error"] == UPLOAD_ERR_INI_SIZE || $_FILES[$file]["error"] == UPLOAD_ERR_FORM_SIZE) {
                    //fichier trop volumineux
                    $errors[] = "Le fichier est trop volumineux";
                } else {
                    $errors[] = "Une erreur a eu lieu au moment du téléchargement du fichier !";
                }
            }
        }

        return $tab_validator;

        // Exemple de tableau retourné par la méthode et qui va permettre d'uploader uniquement les fichiers conformes
        // Exemple si mon formulaire contient deux inputs :
            // <input type="file" name="image_1"/>
            // <input type="file" name="image_2"/>

        // array (size=2)
            // 'avatar' => boolean true
            // 'avatar2' => boolean false

        // Ainsi, le fichier avatar2 n'est pas validé par notre méthode, il représente potentiellement un risque
        // Il ne devra pas être téléchargé
    }
?>