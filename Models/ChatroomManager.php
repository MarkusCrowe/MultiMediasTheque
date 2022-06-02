<?php

class ChatroomsManager{

    private $bddPDO;

    public function __construct(PDO $bddPDO){
        $this->bddPDO = $bddPDO;
    }

    public function insertChatroom(chatroom $Chat){
        $query = $this->bddPDO->prepare("INSERT INTO Chatrooms(Chatroom_name, Categorie_id) VALUES (:Chatroom_name, :Categorie_id)");

        $query->bindValue(":Chatroom_name", $Chat->getChatroom_name());
        $query->bindValue(":Categorie_id", $Chat->getCategorie_id());

        $query->execute();
    }

    public function selectChatroom(){
        $query = $this->bddPDO->query("SELECT * FROM Chatrooms");

        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Chatroom");
        $ListChatrooms = $query->fetchAll();

        $query->closeCursor();
        return $ListChatrooms;
    }

    public function selectCategorieId($categorie_id){
        $query = $this->bddPDO->prepare("SELECT * FROM Chatrooms WHERE Categorie_id=:Categorie_id ");

        $query -> bindValue(":Categorie_id", $categorie_id);
        $query-> execute();

        $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Chatroom" );
        $chatroomCategorie = $query->fetchAll();

        $query -> closeCursor();
        return $chatroomCategorie;
    }
}
?>