<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // ON recupere les donnée des images choisies pour les inserer dans la base de donnée avec un nom, des textes et leur chemins
    if(isset($_POST["submit"])){
        $dataImg = [
            "img_link_1" => "Assets/Images/Upload/" . $_FILES["upload_1"]["name"],
            "img_link_2" => "Assets/Images/Upload/" . $_FILES["upload_2"]["name"],
            "img_link_3" => "Assets/Images/Upload/" . $_FILES["upload_3"]["name"],
            "img_file_1" => $_FILES["upload_1"]["tmp_name"],
            "img_file_2" => $_FILES["upload_2"]["tmp_name"],
            "img_file_3" => $_FILES["upload_3"]["tmp_name"],
        ];

        $data = [
            "Img_1_name" => uniqid(),
            "Img_2_name" => uniqid(),
            "Img_3_name" => uniqid(),
            "Img_link_1" => $dataImg["img_link_1"],
            "Img_link_2" => $dataImg["img_link_2"],
            "Img_link_3" => $dataImg["img_link_3"],
            "Id_user" => $_SESSION["CurrentUser"]["Id"],
            "Title" => $_POST["Titre_article"],
            "Introduction" => $_POST["introduction"],
            "Conclusion" => $_POST["conclusion"],
            "Paragraphe_1" => $_POST["paragraphe_1"],
            "Paragraphe_2" => $_POST["paragraphe_2"],
            "Paragraphe_3" => $_POST["paragraphe_3"],
        ];

        move_uploaded_file($dataImg["img_file_1"],$dataImg["img_link_1"] );
        move_uploaded_file($dataImg["img_file_2"],$dataImg["img_link_2"] );
        move_uploaded_file($dataImg["img_file_3"],$dataImg["img_link_3"] );

        $query = $bddPDO->prepare("INSERT INTO News (Image_1_name, Image_1_path, Title, Introduction, Paragraphe_1, Image_2_name, Image_2_path, Paragraphe_2, Image_3_name, Image_3_path, Paragraphe_3, Conclusion, Id_User) VALUES(:Img_1_name, :Img_link_1, :Title, :Introduction, :Paragraphe_1, :Img_2_name, :Img_link_2, :Paragraphe_2, :Img_3_name, :Img_link_3, :Paragraphe_3, :Conclusion, :Id_user)");
        $query -> execute($data);
        header("Location: ?page=news_list");
    }
    require "Views/add_news.php";
?>
