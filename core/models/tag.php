<?php 
    class Tag extends User{
        function __construct($pdo) {
            $this->pdo = $pdo;
        }
        public function getAllTags() {
            $statement = $this->pdo->prepare(
            'SELECT *
            FROM tag
            order by count_question DESC
            ');
            $statement->execute();
    
            $tags = $statement->fetchAll(PDO::FETCH_OBJ);
    
            return $tags;
        }

        public function getAllTagsDateDesc() {
            $statement = $this->pdo->prepare(
            'SELECT *
            FROM tag
            order by update_date DESC
            ');
            $statement->execute();
    
            $tags = $statement->fetchAll(PDO::FETCH_OBJ);
    
            return $tags;
        }
    }

     

?>