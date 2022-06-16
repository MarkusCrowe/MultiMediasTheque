<?php 
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $NewsMana = new NewsManager($bddPDO);
 
    $edit_new = $NewsMana -> selectOneNews((int) $_GET["Id"]);
    
    $editNews = $NewsMana -> UpdateNews($edit_new);
    header("Location : ../Views/news_list.php");

    require "Views/new_edit.php"; 
?>