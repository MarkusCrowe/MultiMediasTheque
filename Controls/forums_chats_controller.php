<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $Post_manager = new ChatsManager($bddPDO);

    $PostManager = $Post_manager->selectChatroomsId($_GET["Id"]);
    date_default_timezone_set("Europe/Paris");

    // On récupere les donnée de chats pour les insérer dans la base donnée
    if(isset($_SESSION["CurrentUser"])){
        if(isset($_POST["comment"])){
            $Posts = new Chats([
                "Content" => $_POST["comment"],
                "Chatroom_id" => $_GET["Id"],
                "Date" => date("d.m.y") . " - " . date("H:i"),
                "Pseudo" => $_SESSION["CurrentUser"]["Pseudo"],
            ]);
            if ($Posts->isPostValid()){
                $Post_manager->insertChats($Posts);
            }else{
                $errors = $Posts->getErrors();
            }
        }
    }else{
        $notPossible = "Not logged!";
    }
    require "Views/forums_chats.php"; 
?>