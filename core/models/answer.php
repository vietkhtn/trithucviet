<?php 

class Answer extends Question{
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function listAllAnswersByQuestionId($quesitonId){
        $statement = $this->pdo->prepare('SELECT * FROM `answer` LEFT JOIN `profile` ON answer.user_id = profile.user_id
                                            WHERE question_id = :question_id ORDER BY voteCount DESC ');
        $statement->bindParam(':question_id',$quesitonId);
        $statement->execute();
        
        $answers = $statement->fetchAll(PDO::FETCH_OBJ);

        return $answers;
        
    }

}
?>