<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ArticleMana = new ArticleManager($bddPDO);

    $article = $ArticleMana -> selectOneArticle((int) $_GET["Id"]);

    require "Views/article_view.php";
?>