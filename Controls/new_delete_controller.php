<?php
$bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$deleteNew = new NewsManager($bddPDO);


    $delete = $deleteNew -> deleteNew((int) $_GET["Id"]);
    


require "Views/new_delete.php";

?>