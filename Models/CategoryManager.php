<?php

class CategorieManager{

    private $bddPDO;

    public function __construct(PDO $bddPDO) {
        $this->bddPDO = $bddPDO;
    }

    public function insertCategorie(Categorie $Categorie) {
        $query = $this->bddPDO->prepare("INSERT INTO Categories(Categorie_name) VALUES (:Categorie_name)");

        $query->bindValue(":Categorie_name", $Categorie->getCategorie_name());
        
        $query->execute();
    }

    public function selectCategorie(){
        $query = $this->bddPDO->query("SELECT * FROM Categories");
    
        $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Categorie" );
        $ListCategories = $query -> fetchAll();

        $query -> closeCursor();
        return $ListCategories;
    }

    public function selectCategorieName($Id){
        $query = $this->bddPDO->prepare("SELECT * FROM Categories WHERE Id = :Id");
        $query -> bindValue(":Id", (int) $Id);
        $query-> execute();
        $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Categorie" );
        $selectName = $query->fetch();
        $query -> closeCursor();
        return $selectName;
    } 
}

?>