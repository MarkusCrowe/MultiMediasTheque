<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["submit"])){
        // var_dump($_FILES["upload"]);
        $dataImg = [
            "img_link" => "Assets/Images/Upload/" . $_FILES["upload"]["name"],
            "img_file" => $_FILES["upload"]["tmp_name"],
        ];

        $data = [
            "name" => uniqid(),
            "img_link" => $dataImg["img_link"],
            "Id_user" => $_SESSION["CurrentUser"]["Id"]
        ];
        // echo $data["img_link"];

        move_uploaded_file($dataImg["img_file"],$dataImg["img_link"] );

        $query = $bddPDO->prepare("INSERT INTO Images (Name, Link, Id_Users) VALUES(:name, :img_link, :Id_user)");
        $query -> execute($data);
        header("Location: ?page=image");
    }
    $getDataImg = $bddPDO->prepare("SELECT * FROM Images");
    $getDataImgFetch = $getDataImg -> execute();
    $images = $getDataImg->fetchAll(PDO::FETCH_ASSOC);
    
    require "Views/image.php"; 
?>