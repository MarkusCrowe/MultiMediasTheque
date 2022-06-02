<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(!empty($_POST)){
    
        if(isset($_POST["pseudo"], $_POST["password"]) && !empty($_POST["pseudo"]) && !empty($_POST["password"])){
            $manager = new UsersManager($bddPDO);
            $password = $_POST["password"];
            if($manager->existingPassword($_POST["pseudo"])){
                $passwordHash = $manager -> existingPassword($_POST["pseudo"]) -> getPassword();
                if(password_verify($password, $passwordHash)){
                    $_SESSION["CurrentUser"]=[
                        // $ConnectedUser = $manager->selectPseudo($_POST["pseudo"]);
                        // "Pseudo" => $ConnectedUser->getPseudo(),
                        "Pseudo" => ($manager->selectPseudo($_POST["pseudo"]))->getPseudo(),
                    ];
                    header("Location:../index.php");
                }else{
                    echo "Wrong Pseudo or Password";
                }
            }
        } 
        else{
            echo "Wrong Pseudo or Password";
        }      
    }    
    require "Views/login.php";
?>