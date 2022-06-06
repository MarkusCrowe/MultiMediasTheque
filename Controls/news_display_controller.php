<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $ArticleMana = new ArticleManager($bddPDO);

    $ArticleViews = $ArticleMana -> selectOneArticle((int) $_GET["Id"]);

    require "Views/news_display.php"
?>