<?php
    class ArticleManager{
        private $bddPDO;

        public function __construct(PDO $bddPDO) {
            $this->bddPDO = $bddPDO;
        }

        public function selectAllArticles(){
            $query = $this->bddPDO->query("SELECT * FROM News ORDER BY Id DESC");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Article" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }

        public function selectSixArticles(){
            $query = $this->bddPDO->query("SELECT * FROM News ORDER BY Id DESC LIMIT 6");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Article" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }
        
        public function selectEightArticles(){
            $query = $this->bddPDO->query("SELECT * FROM News ORDER BY Id DESC LIMIT 8");
        
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Article" );
            $List = $query -> fetchAll();

            $query -> closeCursor();
            return $List;
        }
        
        public function selectOneArticle($Id){
            $query = $this->bddPDO->prepare("SELECT * FROM News WHERE Id = :Id");
            $query -> bindValue(":Id", (int) $Id);
            $query-> execute();
            $query->setFetchMode(PDO::FETCH_CLASS  | PDO::FETCH_PROPS_LATE, "Article" );
            $select = $query->fetch();
            $query -> closeCursor();
            return $select;
        }
    }
?>