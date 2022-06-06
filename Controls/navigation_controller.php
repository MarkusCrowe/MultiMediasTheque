<?php   
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $categories_manager = new CategorieManager($bddPDO);
    $chatrooms_manager = new ChatroomsManager($bddPDO); 

    require "Views/navigation.php"
?>