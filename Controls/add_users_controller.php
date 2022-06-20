<?php 
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $addUserManager = new UsersManager($bddPDO);
    $sucess = "";
    
    // On récupère les données du formulaires pour les insérer dans la base de donnée
    if (isset($_POST["pseudo"])){
        $addUser = new Users([
            "Firstname" => $_POST["firstname"],
            "Lastname" => $_POST["lastname"],
            "Pseudo" => $_POST["pseudo"],
            "Password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
            "Email" => $_POST["email"],
            "Phone" => $_POST["phone"],
            "Biographie" => $_POST["biographie"],
        ]);
    
        if ($addUser->isUserValid()){
            $addUserManager->insert($addUser);
            $sucess = "Utlisateur enregistré"; 
        }else{
            $errors = $addUser->getErrors();
        }    
    }    
    require "Views/add_user.php"; 
?>