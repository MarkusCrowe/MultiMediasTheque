<?php 
     $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
     $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     $ArticlesMana = new ArticlesManager($bddPDO);
 
    require "Views/all_articles_list.php"; 
?>