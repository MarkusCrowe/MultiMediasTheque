<?php
$bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$deleteArticle = new ArticlesManager($bddPDO);

$delete = $deleteArticle -> deleteArticle((int) $_GET["Id"]);
    
require "Views/article_delete.php";
?>