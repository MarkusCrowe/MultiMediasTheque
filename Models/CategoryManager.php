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
}

?>