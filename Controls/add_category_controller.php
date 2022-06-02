
<?php
    $bddPDO = new PDO('sqlite:Private/DataBase/Project_Database.db');
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $Categorie_manager = new CategorieManager($bddPDO);

    if (isset($_POST["categorie"])){
        $Categories = new Categorie([
            "Categorie_name" => $_POST["categorie"],
        ]);
    
        if ($Categories->isCategorieValid()){
            $Categorie_manager->insertCategorie($Categories);
            // $sucess = "Catégorie créée"; 
            header("Location:../index.php");   
        }else{
            $errors = $Categories->getErrors();
        }
    }
    require "Views/add_category.php"
?>