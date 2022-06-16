<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $NewsMana = new NewsManager($bddPDO);

    $news = $NewsMana -> selectOneNews((int) $_GET["Id"]);

    require "Views/new_view.php";
?>