<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["submit"])){
        // var_dump($_FILES["upload"]);
        $avatarImg = [
            "img_link" => "Assets/Images/Upload/" . $_FILES["upload"]["name"],
            "img_file" => $_FILES["upload"]["tmp_name"],
        ];
        $avatarData = [
            "name" => uniqid(),
            "img_link" => $avatarImg["img_link"],
            "Id_user" => $_SESSION["CurrentUser"]["Id"]
        ];
        // echo $data["img_link"];

        move_uploaded_file($avatarImg["img_file"],$avatarImg["img_link"] );

        $query = $bddPDO->prepare("INSERT INTO Avatar (Name, Link, Id_Users) VALUES(:name, :img_link, :Id_user)");
        $query -> execute($avatarData);
        header("Location: ?page=image");
    }
    $getAvatarImg = $bddPDO->prepare("SELECT * FROM Avatar");
    $getDataAvatarFetch = $getAvatarImg -> execute();
    $avatar = $getAvatarImg->fetchAll(PDO::FETCH_ASSOC);
    
    require "Views/image.php"; 
?>