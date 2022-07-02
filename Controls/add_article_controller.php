<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $manager = new NewsManager($bddPDO);
    // ON recupere les donnée de l'image choisie pour l'inserer dans la base de donnée avec un nom, un résume et son chemin
    if(isset($_POST["submit"])){

        $extentions = ["jpg", "png", "jpeg", "gif"];
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
        // On récupère l'extension du fichier pour vérifier si elle est dans "$Extensions"
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
            }
        }else{
            echo "<p class='error'>Ce n'est pas une Image!</p>";
            die;
        }

        $dataImg = [
            "img_link" => "Assets/Images/Upload/" . $_FILES["upload"]["name"],
            "img_file" => $_FILES["upload"]["tmp_name"],
        ];
        $data = [
            "Image_name" => uniqid(),
            "Image_path" => $dataImg["img_link"],
            "Title" => $_POST["title"],
            "Resume" => $_POST["resume"],
        ];

        move_uploaded_file($dataImg["img_file"],$dataImg["img_link"] );

        $query = $bddPDO->prepare("INSERT INTO Articles (Title, Image_name, Image_path, Resume) VALUES(:Title, :Image_name, :Image_path, :Resume)");
        $query -> execute($data);

        header("Location: ?page=articles_list");

    }
    require "Views/add_article.php";
?>
