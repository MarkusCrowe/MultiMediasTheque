<?php

class ChatsManager{

    private $bddPDO;

    public function __construct(PDO $bddPDO){
        $this->bddPDO = $bddPDO;
    }

    public function insertChats(Chats $Post){
        $query = $this->bddPDO->prepare("INSERT INTO Chats(Chatroom_id, Content, Date, Pseudo) VALUES (:Chatroom_id, :Content, :Date, :Pseudo)");

        $query->bindValue(":Chatroom_id", $Post->getChatroom_id());
        $query->bindValue(":Content", $Post->getContent());
        $query->bindValue(":Date", $Post->getDate());
        $query->bindValue(":Pseudo", $Post->getPseudo());

        $query->execute();
    }

    public function selectChats(){
        $query = $this->bddPDO->query("SELECT * FROM Chats");

        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Chats");
        $ListPosts = $query->fetchAll();

        $query->closeCursor();
        return $ListPosts;
    }

    public function selectChatroomsId($Chatroom_id){
        $query = $this->bddPDO->prepare("SELECT * FROM Chats WHERE Chatroom_id=:Chatroom_id ");

        $query -> bindValue(":Chatroom_id", $Chatroom_id);
        $query-> execute();

        $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Chats" );
        $postChatroom = $query->fetchAll();

        $query -> closeCursor();
        return $postChatroom;
    }
}
?>