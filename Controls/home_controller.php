<?php 
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $NewsMana = new NewsManager($bddPDO);
    $ArticlesMana = new ArticlesManager($bddPDO);
    $ChatroomsMana = New ChatroomsManager($bddPDO);
 
    require "Views/home.php"; 

?>