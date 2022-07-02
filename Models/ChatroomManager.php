<?php

class ChatroomsManager{

    private $bddPDO;

    public function __construct(PDO $bddPDO){
        $this->bddPDO = $bddPDO;
    }

    public function insertChatroom(Chatroom $Chat){
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

    public function selectCategorieJoin($Id){
        $query = $this->bddPDO->prepare("SELECT Categories.Id, Chatrooms.Chatroom_name, Chatrooms.Id FROM Categories INNER JOIN Chatrooms ON Categories.Id = Chatrooms.Categorie_id WHERE Categories.Id = :id" );

        $query -> bindValue(":id", $Id);
        $query-> execute();

        $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Chatroom" );
        $chatroomCategorie = $query->fetchAll();

        $query -> closeCursor();
        return $chatroomCategorie;
    }

    public function selectFiveChatrooms(){
        $query = $this->bddPDO->query("SELECT * FROM Chatrooms ORDER BY Id DESC LIMIT 5");
    
        $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Chatroom" );
        $List = $query -> fetchAll();

        $query -> closeCursor();
        return $List;
    }
}
?>