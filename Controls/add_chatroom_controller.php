<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $Chatroom_manager = new ChatroomsManager($bddPDO);
    $ChatManager = $Chatroom_manager->selectCategorieId($_GET["Id"]);

    if (isset($_POST["chatroom"])){
        $Chatrooms = new Chatroom([
            "Chatroom_name" => $_POST["chatroom"],
            "Categorie_id" => $_GET["Id"],
        ]);
        $test = $Chatrooms->getCategorie_id();
        if ($Chatrooms->isChatroomValid()){
            $Chatroom_manager->insertChatroom($Chatrooms);
            header("Location:../index.php");   
        }else{
            $errors = $Chatrooms->getErrors();
        }
    }
    require "Views/add_chatroom.php" 
?>