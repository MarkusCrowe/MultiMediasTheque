<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $Edits = new UsersManager($bddPDO);
    
    // $user = $Edits -> selectOneUser((int) $_GET["Id"]);
    $user = $Edits -> selectOneUser((int) $_SESSION["CurrentUser"]["Id"]);
    
    $editUser = $Edits -> updateUser($user);
    header("Location : ?page=account");
    
    require "Views/edit_user.php";
?>