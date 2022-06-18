<?php 
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $ArticleMana = new ArticlesManager($bddPDO);
 
    $edit_article = $ArticleMana -> selectOneArticles((int) $_GET["Id"]);
    
    $editArticle = $ArticleMana -> updateArticle($edit_article);
    header("Location : ?page=articles_list");

    require "Views/article_edit.php"; 
?>