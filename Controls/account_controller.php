<?php
$bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$UserMana = new UsersManager($bddPDO);

$userProfil = $UserMana -> selectOneUser((int) $_SESSION["CurrentUser"]["Id"]);

require "Views/account.php";
?>