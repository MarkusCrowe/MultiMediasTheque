<?php 
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $addUserManager = new UsersManager($bddPDO);
    $sucess = "";
    
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
            // header("Location:?page=index");   
        }else{
            $errors = $addUser->getErrors();
            // var_dump($errors);
            // var_dump($addUser);
        }    
    }    
    require "Views/add_user.php"; 
?>