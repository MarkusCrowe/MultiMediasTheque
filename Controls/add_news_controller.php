<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $manager = new NewsManager($bddPDO);

    // ON recupere les donnée des images choisies pour les inserer dans la base de donnée avec un nom, des textes et leur chemins
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
        
        $integrityOfImages = $manager->verifImageIntegrity(["upload_1", "upload_2", "upload_3"], $extentions, $mimes);
        //     // Méthode permettant de vérifier l'intégrité des fichiers uploadés
        foreach($integrityOfImages as $key => $value){           
            if($value == 1){
                $dataImg["img_link_".$key] = "Assets/Images/Upload/" . $_FILES[$key]["name"];
                $dataImg["img_file_".$key] = $_FILES[$key]["tmp_name"];

                $data["Img_name_".$key] = uniqid();
                $data["Img_link_".$key] = $dataImg["img_link_".$key];

                move_uploaded_file($dataImg["img_file_".$key],$dataImg["img_link_".$key] );
            }
            $column_name[] = "Img_name_".$key;
            $column_link[] = "Img_link_".$key;
        }

        $data["Id_user"] = $_SESSION["CurrentUser"]["Id"];
        $data["Title"] = $_POST["Titre_article"];
        $data["Introduction"] = $_POST["introduction"];
        $data["Conclusion"] = $_POST["conclusion"];
        $data["Paragraphe_1"] = $_POST["paragraphe_1"];
        $data["Paragraphe_2"] = $_POST["paragraphe_2"];
        $data["Paragraphe_3"] = $_POST["paragraphe_3"];
   
        $query = $bddPDO->prepare("INSERT INTO News (Image_1_name, Image_1_path, Title, Introduction, Paragraphe_1, Image_2_name, Image_2_path, Paragraphe_2, Image_3_name, Image_3_path, Paragraphe_3, Conclusion, Id_User) VALUES(:{$column_name[0]}, :{$column_link[0]}, :Title, :Introduction, :Paragraphe_1, :{$column_name[1]}, :{$column_link[1]}, :Paragraphe_2, :{$column_name[2]}, :{$column_link[2]}, :Paragraphe_3, :Conclusion, :Id_user)");
        $query -> execute($data);
        header("Location: ?page=news_list");
    }
    require "Views/add_news.php";
?>
