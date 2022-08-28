<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $manager = new NewsManager($bddPDO);

    // ON recupere les donnée des images choisies pour les inserer dans la base de donnée avec un nom, des textes et leur chemins
    if(isset($_POST["submit"])){
        // On defini les extentions et le contenu autorisé
        $extentions = ["jpg", "png", "jpeg", "gif"];
        $mimes = [
            'png'   => 'image/png',
            'jpeg'  => 'image/jpeg',
            'jpg'   => 'image/jpeg',
            'gif'   => 'image/gif',
        ];
        // On determine les donnée a injecter dans la base de donnée.
        $data["Id_user"] = $_SESSION["CurrentUser"]["Id"];
        $data["Title"] = $_POST["Titre_article"];
        $data["Introduction"] = $_POST["introduction"];
        $data["Conclusion"] = $_POST["conclusion"];
        $data["Paragraphe_1"] = $_POST["paragraphe_1"];
        $data["Paragraphe_2"] = $_POST["paragraphe_2"];
        $data["Paragraphe_3"] = $_POST["paragraphe_3"];
        
        $integrityOfImages = $manager->verifImageIntegrity(["upload_1", "upload_2", "upload_3"], $extentions, $mimes);
        //     // Méthode permettant de vérifier l'intégrité des fichiers uploadés
        foreach($integrityOfImages as $key => $value){           
            if($value == 1){
                // On determine le fichier temporaire et le chemin d'enregistrement final
                $dataImg["img_link_".$key] = "Assets/Images/Upload/" . $_FILES[$key]["name"];
                $dataImg["img_file_".$key] = $_FILES[$key]["tmp_name"];
                // On determine les donnée a injecter dans la base de donnée.
                $data["Img_name_".$key] = uniqid();
                $data["Img_link_".$key] = $dataImg["img_link_".$key];
                // On deplace l'image du fichier temporaire au dossier determiner
                move_uploaded_file($dataImg["img_file_".$key],$dataImg["img_link_".$key] );
            }
            // On boucle la fonction
            $column_name[] = "Img_name_".$key;
            $column_link[] = "Img_link_".$key;
        }

        $query = $bddPDO->prepare("INSERT INTO News (Image_1_name, Image_1_path, Title, Introduction, Paragraphe_1, Image_2_name, Image_2_path, Paragraphe_2, Image_3_name, Image_3_path, Paragraphe_3, Conclusion, Id_User) VALUES(:{$column_name[0]}, :{$column_link[0]}, :Title, :Introduction, :Paragraphe_1, :{$column_name[1]}, :{$column_link[1]}, :Paragraphe_2, :{$column_name[2]}, :{$column_link[2]}, :Paragraphe_3, :Conclusion, :Id_user)");
        $query -> execute($data);
        header("Location: ?page=news_list");
    }
    require "Views/add_news.php";
?>
