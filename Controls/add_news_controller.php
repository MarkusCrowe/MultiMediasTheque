<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(isset($_POST["submit"])){
        // var_dump($_FILES["upload"]);
        $dataImg = [
            "img_link_1" => "Assets/Images/Upload/" . $_FILES["upload_1"]["name"],
            "img_link_2" => "Assets/Images/Upload/" . $_FILES["upload_2"]["name"],
            "img_file_1" => $_FILES["upload_1"]["tmp_name"],
            "img_file_2" => $_FILES["upload_2"]["tmp_name"],
        ];

        $data = [
            "Img_1_name" => uniqid(),
            "Img_2_name" => uniqid(),
            "Img_link_1" => $dataImg["img_link_1"],
            "Img_link_2" => $dataImg["img_link_2"],
            "Id_user" => $_SESSION["CurrentUser"]["Id"],
            "Title" => $_POST["Titre_article"],
            "Paragraphe_1" => $_POST["paragraphe_1"],
            "Paragraphe_2" => $_POST["paragraphe_2"],
            "Paragraphe_3" => $_POST["paragraphe_3"],
        ];
        // echo $data["img_link"];

        move_uploaded_file($dataImg["img_file_1"],$dataImg["img_link_1"] );
        move_uploaded_file($dataImg["img_file_2"],$dataImg["img_link_2"] );

        $query = $bddPDO->prepare("INSERT INTO News (Title, Paragraphe_1, Image_1_name, Image_1_path, Paragraphe_2, Image_2_name, Image_2_path, Paragraphe_3, Id_User) VALUES(:Title, :Paragraphe_1, :Img_1_name, :Img_link_1, :Paragraphe_2, :Img_2_name, :Img_link_2, :Paragraphe_3, :Id_user)");
        $query -> execute($data);
        header("Location: ?page=articles ");

    }
    
    

    require "Views/add_news.php";
?>
<!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius iusto quidem dolorem porro earum deleniti est eaque velit ex accusantium!</p> -->