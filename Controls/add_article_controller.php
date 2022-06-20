<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // ON recupere les donnée de l'image choisie pour l'inserer dans la base de donnée avec un nom, un résume et son chemin
    if(isset($_POST["submit"])){
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