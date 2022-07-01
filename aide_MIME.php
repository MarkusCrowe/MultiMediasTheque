<?php
 $integrityOfImages = $manager->verifImageIntegrity(["upload_1", "upload_2", "upload_3"], ['jpg', 'jpeg', 'gif', 'png'], $mimes );
//     // Méthode permettant de vérifier l'intégrité des fichiers uploadés
    public function verifImageIntegrity($files, $extensions, $mimes) {

        $tab_validator = [];
        // $errors = [];
        $mimes = [
            'png'   => 'image/png',
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

        foreach($files as $file) {

            $tab_validator[$file] = false;

            if(isset($_FILES[$file]) && !empty($_FILES[$file]['name'])) {

                $tmpName = $_FILES[$file]["tmp_name"];
                $tmpNameArray = explode(".", $_FILES[$file]["name"]);
                $tmpExt = end($tmpNameArray);
                if(in_array(strtolower($tmpExt), $extentions)) {
                    // Détecte le type de contenu d'un fichier.
                    // On vérifie le contenu de fichier, pour voir s'il appartient aux MIMES autorisés.
                    if(mime_content_type($tmpName) != $mimes[$tmpExt]) {
                        // Risque d'attaque : Le contenu du ficher qui ne correspond pas à son extension
                        echo "Ce n'est pas une Image !";
                        die;
                    }else{ 
                        $tab_validator[$file] = true; 
                    }
                }else{
                    echo "Ce n'est pas une Image !";
                    die;
                }

                // if ($_FILES[$file]["error"] === UPLOAD_ERR_OK) {
                //     $tmpName = $_FILES[$file]["tmp_name"];
                //     // On récupère l'extension du fichier pour vérifier si elle est dans "$fileExtensions"
                //     $tmpNameArray = explode(".", $_FILES[$file]["name"]);
                //     $tmpExt = end($tmpNameArray);
                //     if(in_array(strtolower($tmpExt), $fileExtensions)) {
                //         // Détecte le type de contenu d'un fichier.
                //         // On vérifie le contenu de fichier, pour voir s'il appartient aux MIMES autorisés.
                //         if(mime_content_type($tmpName) != $this->mimes[$tmpExt]) {
                //             // Risque d'attaque : Le contenu du ficher qui ne correspond pas à son extension
                //             $errors[] = "Une erreur a eu lieu au moment du téléchargement du fichier !";
                //         } else {
                //             $tab_validator[$file] = true;
                //         }
                //     } else {
                //         $errors[] = "Ce type de fichier n'est pas autorisé !";
                //     }
                // } else if($_FILES[$file]["error"] == UPLOAD_ERR_INI_SIZE || $_FILES[$file]["error"] == UPLOAD_ERR_FORM_SIZE) {
                //     //fichier trop volumineux
                //     $errors[] = "Le fichier est trop volumineux";
                // } else {
                //     $errors[] = "Une erreur a eu lieu au moment du téléchargement du fichier !";
                // }
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