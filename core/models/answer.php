<?php 

class Answer extends Question{
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function listAllAnswersByQuestionId($quesitonId){
        $statement = $this->pdo->prepare('SELECT * FROM `answer` WHERE question_id = :question_id 
                                            ORDER BY voteCount DESC ');
        $statement->bindParam(':question_id',$quesitonId);
        $statement->execute();
        
        $answers = $statement->fetchAll(PDO::FETCH_OBJ);

        // Generate List Answers
        forEach ($answers as $answer) {
            ?>
                <div class="news-feed-text">
                    <div class="nf-4" id="question-post-content">
                        <?php  echo $answer->content ?>
                    </div>
                </div>                       
            <?php
        }
    }

}
?>