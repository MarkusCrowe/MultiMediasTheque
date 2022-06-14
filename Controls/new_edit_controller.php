<?php 
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $ArticleMana = new ArticleManager($bddPDO);
 
    $edit_new = $ArticleMana -> selectOneArticle((int) $_GET["Id"]);
    
    $editArticle = $ArticleMana -> UpdateArticle($edit_new);
    header("Location : ../Views/articles_edit.php");

    require "Views/new_edit.php"; 
?>