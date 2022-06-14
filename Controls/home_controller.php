<?php 
     $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
     $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     $ArticleMana = new ArticleManager($bddPDO);
 
    require "Views/home.php"; 

?>